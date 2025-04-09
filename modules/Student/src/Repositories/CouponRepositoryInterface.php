<?php 
namespace Modules\Student\src\Repositories;

use App\Repositories\RepositoryInterface;
interface CouponRepositoryInterface extends RepositoryInterface{
    public function verifyCoupon($code);
}
