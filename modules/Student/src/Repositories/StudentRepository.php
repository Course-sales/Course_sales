<?php
namespace Modules\Student\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Student\src\Models\Student;
use Modules\Student\src\Repositories\StudentRepositoryInterface;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface{
    public function getModel(){
        return Student::class;
    }
    public function getStudents($status = null) {
        return ($status === null) ? $this->model->get() : $this->model->where('status', $status)->get();
    }
    public function getCourses($studentId, $filters = [], $limit = 10) {
        extract($filters);
        $query = $this->model->find($studentId)->courses();

        if($keyword) {
            $query->where('name', 'like', '%'.$keyword.'%');
        }
        if($teacher_id) {
            $query->where('teacher_id', $teacher_id);
        }

        return $query->paginate($limit)->withQueryString();
    }


    public function createStudentsCourses($student, $data = []) {
        foreach ($data as $courseId => $value) {
            $student->courses()->attach($courseId, $value);
        }
    }
    public function searchForStudents($keyword) {
        return $this->model
        ->where('name', 'like', '%'.$keyword.'%')
        ->orWhere('email', 'like', '%'.$keyword.'%')
        ->orWhere('phone', 'like', '%'.$keyword.'%')
        ->get();
    }
}
