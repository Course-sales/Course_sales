<?php

namespace Modules\Category\src\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Course\src\Models\Course;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_id',
    ];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function subCategories() {
        return $this->children()->with('subCategories');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'categories_courses');
    }
}
