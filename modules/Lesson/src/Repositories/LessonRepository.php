<?php
namespace Modules\Lesson\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Lesson\src\Models\Lesson;
use Modules\Lesson\src\Repositories\LessonRepositoryInterface;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface{
    public function getModel(){
        return Lesson::class;
    }

    public function getPosition($courseId) {
        $result = $this->model->where('course_id', $courseId)->count();
        return $result + 1;
    }
    public function getLessonByPossition($course) {
        return $course->lessons()->whereNotNull('parent_id')->orderBy('position', 'asc')->get();
    }

    public function getLessons($courseId) {
        return $this->model->whereCourseId($courseId)->orderBy('position', 'asc')->get();
    }
    public function getModules($courseId){
        return $this->model->with('subLessons')->whereCourseId($courseId)->whereNull('parent_id')->orderBy('position', 'asc')->get();
    }
    public function getLessonCount($course) {
        return (object) [
            'modules' => $course->lessons()->whereNull('parent_id')->count(),
            'lessons' => $course->lessons()->whereNotNull('parent_id')->count()
        ];
    }
    public function getLessonClientsActive($slug){
        return $this->model->whereSlug($slug)->first();
    }

}
