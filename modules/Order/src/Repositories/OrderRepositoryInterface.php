<?php 
namespace Modules\Order\src\Repositories;

use App\Repositories\RepositoryInterface;
interface OrderRepositoryInterface extends RepositoryInterface{
    public function getOrdersByStudent($studentId,  $limit = 10);
    public function getOrder($orderId);
    public function updatePaymentDate($orderId);
    public function getAllOrders();
    public function getAllPaymentDates();
    public function search($filters);
    public function getProfit();
    public function getOrderDashboard();
    public function updateDiscount($orderId, $discount, $couponCode);

}
