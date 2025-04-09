<?php
namespace Modules\Course\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Course\src\Models\Course;
use Modules\Course\src\Repositories\CourseRepositoryInterface;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface{
    public function getModel(){
        return Course::class;
    }
    public function getCourseSaleCount(){
        return $this->model
                    ->withCount('students')
                    ->having('students_count', '>', 0)
                    ->orderByDesc('students_count') 
                ->get();
    }
    public function getCourses($limit = 0) {
        if($limit > 0) {
            return $this->model->where('status', 1)->latest('created_at')->limit($limit)->paginate($limit);
        }
        return $this->model->select('id', 'name', 'price', 'sale_price', 'status', 'created_at')->latest('created_at')->get();
    }
    public function getCoursesCount($status = null) {
        return ($status === null) ? $this->model->get() : $this->model->where('status', $status)->get()->count();
    }
    public function getMyCourses($student) {
        return $student->courses;
    }
    public function getCoursesClient($exceptIds = [] ,$limit = 0) {
        $query = $this->model->where('status', 1);
        if(!empty($exceptIds)) {
            $query->whereNotIn('id', $exceptIds);
        }
        return $query->latest('created_at')->get();
    }
    public function getCourseClientsActive($slug){
        return $this->model->whereSlug($slug)->where('status', 1)->first();
    }
    
    public function createCoursesCategories($course, $data = []) {
        return $course->categories()->attach($data);
    }
    public function updateCoursesCategories($course, $data = []) {
        return $course->categories()->sync($data);
    }
    public function deleteCoursesCategories($course) {
        return $course->categories()->detach();
    }
    public function getRelatedCategoriesCourses($course) {
        return $course->categories()->allRelatedIds()->toArray();
    }

}
