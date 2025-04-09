<?php

namespace Modules\Course\src\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\src\Models\Category;
use Modules\Lesson\src\Models\Lesson;
use Modules\Order\src\Models\Order;
use Modules\Student\src\Models\Student;
use Modules\Teacher\src\Models\Teacher;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'slug',
        'detail',
        'teacher_id',
        'thumbnail',
        'price',
        'sale_price',
        'code',
        'durations',
        'is_document',
        'supports',
        'status',
        'view',
        'levels'
    ];
    protected $with = ['teacher'];
    public function categories() {
        return $this->belongsToMany(Category::class, 'categories_courses');
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function lessons() {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }
    public function students() {
        return $this->belongsToMany(Student::class, 'students_courses');
    }
}
