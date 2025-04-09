<?php 
namespace Modules\Student\src\Repositories;

use App\Repositories\RepositoryInterface;
interface StudentRepositoryInterface extends RepositoryInterface{
    public function getStudents($status = null);
    public function getCourses($studentId, $filters = [], $limit = 10);
    public function createStudentsCourses($student, $data = []);
    public function searchForStudents($keyword);
}
