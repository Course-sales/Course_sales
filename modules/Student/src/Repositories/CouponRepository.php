<?php
namespace Modules\Student\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Student\src\Models\Coupon;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface{
    public function getModel(){
        return Coupon::class;
    }
    public function verifyCoupon($code) {

        return $this->model->where('code', $code)->first();
    }

}