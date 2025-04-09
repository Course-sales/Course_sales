<?php
namespace Modules\Dashboard\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Order\src\Repositories\OrderRepositoryInterface;
use Modules\Student\src\Repositories\StudentRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class DashboardController extends Controller
{
    protected $orderRepo;
    protected $studentRepo;
    protected $teacherRepo;
    protected $courseRepo;
    public function __construct(
        OrderRepositoryInterface $orderRepositoryInterface,
        StudentRepositoryInterface $studentRepositoryInterface,
        TeacherRepositoryInterface $teacherRepositoryInterface,
        CourseRepositoryInterface $courseRepositoryInterface) {

        $this->orderRepo = $orderRepositoryInterface;
        $this->studentRepo = $studentRepositoryInterface;
        $this->teacherRepo = $teacherRepositoryInterface;
        $this->courseRepo = $courseRepositoryInterface;
    }
    public function index() {
        $pageTitle = 'Dashboard';
        $studentCount = $this->studentRepo->getStudents(1)->count();
        $teacherCount = $this->teacherRepo->getTeachers()->count();
        $courseCount = $this->courseRepo->getCoursesCount(1);
        $totalProfit = $this->orderRepo->getProfit();
        // $orders = $this->orderRepo->getOrderDashboard();
        $courses = $this->courseRepo->getCourseSaleCount();
        return view('Dashboard::dashboard', compact('pageTitle', 'studentCount', 'teacherCount', 'courseCount', 'totalProfit', 'courses'));
    }
}
