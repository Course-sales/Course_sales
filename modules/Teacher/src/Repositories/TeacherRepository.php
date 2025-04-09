<?php
namespace Modules\Teacher\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Teacher\src\Models\Teacher;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface{
    public function getModel(){
        return Teacher::class;
    }
    public function getTeachers(){
        return $this->model->get();
    }
    public function search($keyword = '') {
        return $this->model->where('name', 'like', '%'.$keyword.'%')->get();
    }
}
