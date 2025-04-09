<?php
namespace Modules\Order\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Order\src\Models\Order;
use Modules\Order\src\Repositories\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface{
    public function getModel(){
        return Order::class;
    }
    public function getProfit() {
        return $this->model->whereNotNull('payment_complete_date')->sum('total');
    }
    public function getOrderDashboard() {
        return $this->model->where('order_status_id', 2)->get();
    }
    public function getOrdersByStudent($studentId, $limit = 10) {
        return $this->model->where('student_id', $studentId)->with('ordersStatus')->latest('created_at')->paginate($limit);
    }
    public function getAllOrders() {
        return $this->model->latest('created_at')->get();
    }
    public function getOrder($orderId){
        return $this->model->with('orderDetail')->find($orderId);
    }
    public function updatePaymentDate($orderId){
        $order = $this->getOrder($orderId);
        if ($order->payment_date) {
            return;
        }
        return $this->update($orderId, ['payment_date' => date('Y-m-d H:i:s')]);
    }
    public function getAllPaymentDates() {
        return $this->model->select('payment_date')->get();
    }
    public function search($filters) {
        extract($filters);
        return $this->model->with(['student', 'ordersStatus'])
                ->when(isset($keyword), function ($query) use ($keyword) {
                    return $query->whereHas('student', function ($subQuery) use ($keyword) {
                        return $subQuery->where('name', 'like', '%'.$keyword.'%');
                    });
                })
                ->when(isset($payment_date), function ($query) use ($payment_date) {
                    return $query->where('payment_date', 'like', '%'.$payment_date.'%');
                })
                ->when(isset($status), function ($query) use ($status) {
                    return $query->where('order_status_id', $status);
                })
                ->latest('created_at')->get();
    }
    public function updateDiscount($orderId, $discount, $couponCode) {
        return $this->update($orderId, [
            'discount' => $discount,
            'coupon_code' => $couponCode
        ]);
    }

}
