<?php 
namespace Modules\Lesson\src\Repositories;

use App\Repositories\RepositoryInterface;
interface LessonRepositoryInterface extends RepositoryInterface{
    public function getPosition($courseId);
    public function getLessons($courseId);
    public function getModules($courseId);
    public function getLessonCount($course);
    public function getLessonClientsActive($slug);
    public function getLessonByPossition($course);
}
