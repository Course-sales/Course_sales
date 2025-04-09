<?php 
namespace Modules\Course\src\Repositories;

use App\Repositories\RepositoryInterface;
interface CourseRepositoryInterface extends RepositoryInterface{
    public function getCourses($limit = 0);
    public function getCoursesCount($status = null);
    public function createCoursesCategories($course, $data = []);
    public function updateCoursesCategories($course, $data = []);
    public function deleteCoursesCategories($course);
    public function getRelatedCategoriesCourses($course);
    public function getCourseClientsActive($slug);
    public function getCoursesClient($exceptIds = [], $limit = 0);
    public function getMyCourses($student);
    public function getCourseSaleCount();
}
