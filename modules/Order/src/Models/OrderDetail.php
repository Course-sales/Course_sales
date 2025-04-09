<?php

namespace Modules\Order\src\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Course\src\Models\Course;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';
    protected $fillable = [
        'order_id',
        'course_id',
        'price'
    ];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
 
}
