<?php
namespace Modules\Student\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Order\src\Repositories\OrderRepositoryInterface;
use Modules\Student\src\Repositories\CouponRepositoryInterface;

class CouponController extends Controller
{
    protected $couponRepo;
    protected $orderRepo;
    public function __construct(CouponRepositoryInterface $couponRepositoryInterface,
                                OrderRepositoryInterface $orderRepositoryInterface) {
        $this->couponRepo = $couponRepositoryInterface;
        $this->orderRepo = $orderRepositoryInterface;
    }
    public function verify(Request $request) {
        $code = $request->code;
        try {
            if(!$code) {
                throw new \Exception("Mã giảm giá bắt buộc phải nhập", 400);
            }
            $coupon = $this->couponRepo->verifyCoupon($code);
            if(!$coupon) {
                throw new \Exception("Mã giảm giá không tồn tại", 404);
            }
            $today = Carbon::now()->format('Y-m-d H:i:s');
            $startDate = $coupon->start_date;
            $endDate = $coupon->end_date;
            if((!$startDate && !$endDate) || ($today > $startDate && $today < $endDate)) {
                $order = $this->orderRepo->find($request->orderId);
                $discount = 0;
                if($coupon->discount_type == 'percent' && $order) {
                    $discount = ($order->total * $coupon->discount_value) / 100;
                }
                if($coupon->discount_type == 'value' && $order) {
                    $discount = $coupon->discount_value;
                }
                $this->orderRepo->updateDiscount($request->orderId, $discount, $code );
                return response()->json([
                    'success' => true,
                    'message' => 'Verify success',
                    'coupon' =>  $order
                ],200);
            }
          
            throw new \Exception("Mã giảm giá đã hết hạn sử dụng", 404);
        } catch (\Exception $exception) {
            $status = $exception->getCode();
            return response()->json([
                'success' => false,
                'message' => 'Verify failed',
                'errors' => $exception->getMessage()
            ], $status ?? 500);
        }

    }
    public function delete(Request $request) {
        $code = $request->code;
        $order = $this->orderRepo->find($request->orderId);
        return response()->json(['coupon' => $code]);
    }
}