<?php
namespace Modules\Order\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Order\src\Models\Order;
use Modules\Order\src\Models\OrderDetail;
use Modules\Order\src\Repositories\OrderRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface{
    public function getModel(){
        return OrderDetail::class;
    }
}