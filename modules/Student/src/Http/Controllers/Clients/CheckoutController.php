<?php
namespace Modules\Student\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Order\src\Repositories\OrderRepositoryInterface;
use Modules\Student\src\Repositories\StudentRepositoryInterface;

class CheckoutController extends Controller
{
    protected $orderRepo;
    protected $studentRepo;
    public function __construct(OrderRepositoryInterface $orderRepositoryInterface,
    StudentRepositoryInterface $studentRepositoryInterface) {
        $this->orderRepo = $orderRepositoryInterface;
        $this->studentRepo = $studentRepositoryInterface;
    }
    public function index($orderId) {
        $order = $this->orderRepo->getOrder($orderId);
        if($order && !$order->ordersStatus->is_success) {
            $pageTitle = 'My orders';
            $subTitle = 'My orders';
            $paymentDate = strtotime($order->payment_date);
            $now = strtotime(date('Y-m-d H:i:s'));
            $diff = $now - $paymentDate;
            if($diff > 60000) { // set time
                abort(403, 'Payment expired');
            }
            return view('Student::clients.checkout', compact('pageTitle', 'subTitle', 'order'));
        }
        abort(404);
    }

    public function confirmCheckout(Request $request) {
        $order = $this->orderRepo->find($request->orderId);
        $student = Auth::guard('students')->user();
        if($order) {
            $courses = [];
            foreach($request->courses as $course) {
                $courses[$course['course_id']] = [
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }
            $this->studentRepo->createStudentsCourses($student, $courses);
            $this->orderRepo->update($order->id, [
                'order_status_id' => 2,
                'payment_complete_date' => now()
            ]);
            return ['status' => 1, 'message' => 'Success!'];
        }
        return ['status' => 0, 'message' => 'Fail'];
    }
}