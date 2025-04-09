<?php

namespace Modules\Student\src\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Modules\Course\src\Models\Course;
use Modules\Order\src\Models\Order;

class Student extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasFactory;
    use Notifiable;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'address',
        'status',
    ];

    public function courses() {
        return $this->belongsToMany(Course::class, 'students_courses', 'student_id')->withPivot('status');
    }

}
