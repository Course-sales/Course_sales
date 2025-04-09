<?php
namespace Modules\Order\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\src\Repositories\OrderRepositoryInterface;

class OrderController extends Controller
{
    protected $orderRepo;
    public function __construct(OrderRepositoryInterface $orderRepositoryInterface) {
        $this->orderRepo = $orderRepositoryInterface;
    }
    
    public function index() {
        $pageTitle = 'List of orders';
        $orders = $this->orderRepo->getAllOrders();
        $allPaymentDates = $this->orderRepo->getAllPaymentDates();
        return view('Order::lists', compact('pageTitle', 'orders', 'allPaymentDates'));
    }

    public function detail($orderId) {
        $pageTitle = 'Order detail';
        $order = $this->orderRepo->getOrder($orderId);
        return view('Order::detail', compact('pageTitle', 'order'));
    }
    public function search(Request $request) {
        $filters = $request->except('_token');
        $data = $this->orderRepo->search($filters);
        return ['data' => $data, 'keyword' => $request->keyword, 'payment_date' => $request->payment_date, 'status' => $request->status];
    }
}
