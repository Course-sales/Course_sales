<?php 
namespace Modules\Teacher\src\Repositories;

use App\Repositories\RepositoryInterface;
interface TeacherRepositoryInterface extends RepositoryInterface{
    public function getTeachers();
    public function search($keyword = '');
}
