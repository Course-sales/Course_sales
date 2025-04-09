<?php
namespace Modules\Student\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Order\src\Repositories\OrderDetailRepositoryInterface;
use Modules\Order\src\Repositories\OrderRepositoryInterface;
use Modules\Student\src\Repositories\StudentRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class StudentController extends Controller
{
    protected $studentRepo;
    protected $teacherRepo;
    protected $orderRepo;
    protected $courseRepo;
    protected $orderDetailRepo;
    public function __construct(StudentRepositoryInterface $studentRepositoryInterface, 
                                TeacherRepositoryInterface $teacherRepositoryInterface,
                                OrderRepositoryInterface $orderRepositoryInterface,
                                CourseRepositoryInterface $courseRepositoryInterface,
                                OrderDetailRepositoryInterface $orderDetailRepositoryInterface) {
        $this->studentRepo = $studentRepositoryInterface;
        $this->teacherRepo = $teacherRepositoryInterface;
        $this->orderRepo = $orderRepositoryInterface;
        $this->courseRepo = $courseRepositoryInterface;
        $this->orderDetailRepo = $orderDetailRepositoryInterface;
        
    }
    public function index() {
        $pageTitle = 'Account';
        $subTitle = 'My account';
        return view('Student::clients.account', compact('pageTitle', 'subTitle'));
    }
    public function myProfile() {
        $pageTitle = 'Information';
        $subTitle = 'My information';
        $student = Auth::guard('students')->user();
        return view('Student::clients.my_profile', compact('pageTitle', 'subTitle', 'student'));
    }
    public function updateMyProfile(Request $request) {
        $id = Auth::guard('students')->user()->id;
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required|regex:/(0)[0-9]{9}/',
        ]);
        $status = $this->studentRepo->update($id, [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return ['success' => $status];
    }
    public function myCourses(Request $request) {
        $pageTitle = 'Courses';
        $subTitle = 'My courses';
        $filters = [];
        $filters['teacher_id'] = $request->teacher_id ? $request->teacher_id : '';
        $filters['keyword'] = $request->keyword ? $request->keyword : '';
        $student = Auth::guard('students')->user();
        $courses = $this->studentRepo->getCourses($student->id, $filters, 5);
        $teachers = $this->teacherRepo->getTeachers();
        return view('Student::clients.my_courses', compact('pageTitle', 'subTitle', 'courses', 'teachers'));
    }
    public function myOrders() {
        $student = Auth::guard('students')->user();
        $pageTitle = 'Orders';
        $subTitle = 'My orders';
        $orders = $this->orderRepo->getOrdersByStudent($student->id, 5);
        return view('Student::clients.my_orders', compact('pageTitle', 'subTitle', 'orders'));
    }
    public function orderDetail($orderId) {
        $order = $this->orderRepo->getOrder($orderId);
        if($order) {
            $pageTitle = 'Order';
            $subTitle = 'My order detail';
            $paymentDate = strtotime($order->payment_date);
            if($paymentDate) {
                $now = strtotime(date('Y-m-d H:i:s'));
                $diff = $now - $paymentDate;
                if($diff > 600) {
                    $order->expired = true;
                }
            }
            return view('Student::clients.order_detail', compact('pageTitle', 'subTitle', 'order'));
        }
        abort(404);
    }
    public function updatePaymentDate(Request $request) {
        $order = $this->orderRepo->find($request->orderId);
        if($order) {
            $this->orderRepo->updatePaymentDate($order->id);
            return ['status' => 1];
        }
        return ['status' => 0];

    }
    public function changePassword() {
        $pageTitle = 'Change password';
        $subTitle = 'Change password';
        return view('Student::clients.change_password', compact('pageTitle', 'subTitle'));
    }
    public function updatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        $student = Auth::guard('students')->user();
        if(!Hash::check($request->old_password, $student->password)) {
            return back()->with('msg', 'Incorrect old password!');
        }
        $this->studentRepo->update($student->id, [
            'password' => Hash::make($request->password)
        ]);
        return back()->with('msg', 'Update successfully!');
    }
    public function cart() {
        $pageTitle = 'Cart';
        return view('Student::clients.cart', compact('pageTitle')); 
    }
    public function addToCart(Request $request) {
        $course = $this->courseRepo->find($request->courseId);
        if($course) {
            $cart = session()->get('cart', []);
            if(!isset($cart[$course->code])) {
                $cart[$course->code] = [
                    'id' => $course->id,
                    'name' => $course->name,
                    'price' => ($course->sale_price > 0) ? $course->sale_price : $course->price,
                    'code' => $course->code,
                    'teacher_name' => $course->teacher->name,
                    'thumbnail' => $course->thumbnail,
                ];
                session()->put('cart', $cart);
                return ['status' => 1, 'type' => 'success', 'message' => 'Add successfull '.$course->name.'!', 'cartQty' => count($cart)];
            }
            return ['status' => 1, 'type' => 'warning', 'message' => 'Course is already in cart!', 'cartQty' => count($cart)];
        }
        return ['status' => 0, 'type' => 'danger', 'message' => 'Error!'];
    }

    public function removeFromCart(Request $request) {
        $cart = session()->get('cart', []);
        if(isset($cart[$request->code])) {
            unset($cart[$request->code]);
            session()->put('cart', $cart);
            return ['status' => 1, 'cart' => $cart, 'message' => 'Delete successfully!', 'cartQty' => count($cart)];;
        }
        return ['status' => 0, 'message' => 'Error!'];
    }
    public function order(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = $this->orderRepo->create([
                'student_id' => $request->studentId,
                'total' => $request->total,
                'order_status_id' => 1
            ]);

            if ($order) {
                $cart = session()->get('cart', []);
                foreach ($cart as $item) {
                    $this->orderDetailRepo->create([
                        'order_id' => $order->id,
                        'course_id' => $item['id'],
                        'price' => $item['price'],
                    ]);
                }

                DB::commit();
                session()->forget('cart');
                $this->orderRepo->updatePaymentDate($order->id);
                return ['status' => 1, 'orderId' => $order->id];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => 0, 'message' => 'Error!'];
        }

        return ['status' => 0, 'message' => 'Error!'];
    }


}
