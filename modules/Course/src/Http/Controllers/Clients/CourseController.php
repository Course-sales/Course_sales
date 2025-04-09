<?php
namespace Modules\Course\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iman\Streamer\VideoStreamer;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Lesson\src\Repositories\LessonRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;
use PhpParser\Node\Expr\Cast\Object_;

class CourseController extends Controller
{
    protected $courseRepo;
    protected $categoryRepo;
    protected $teacherRepo;
    protected $lessonRepo;
    public function __construct(CourseRepositoryInterface $courseRepositoryInterface, LessonRepositoryInterface $lessonRepositoryInterface, 
    CategoryRepositoryInterface $categoryRepositoryInterface, TeacherRepositoryInterface $teacherRepositoryInterface) {
        $this->courseRepo = $courseRepositoryInterface;
        $this->categoryRepo = $categoryRepositoryInterface;
        $this->teacherRepo = $teacherRepositoryInterface;
        $this->lessonRepo = $lessonRepositoryInterface;
    }

    public function index() {
        $pageTitle = "Courses";
        $student = Auth::guard('students')->user();
        $exceptIds = [];
        $mycourses = [];
        $advanceCourses = [];
        $basicCourses = [];
        if($student) {
            $exceptIds = $student->courses->pluck('id')->toArray();
            $mycourses = $this->courseRepo->getMyCourses($student);
        }
        $courses = $this->courseRepo->getCoursesClient($exceptIds);
        $basicCourses = $courses->filter(fn($course) => $course->levels == 0);
        $advanceCourses = $courses->filter(fn($course) => $course->levels == 1);
        return view('Course::clients.index', compact('pageTitle', 'basicCourses', 'advanceCourses', 'mycourses'));
    }

    public function roadmap() {
        $pageTitle = "Roadmap-ATX";
        return view('parts.clients.roadmap', compact('pageTitle'));
    }

    public function detail($slug) {
        $course = $this->courseRepo->getCourseClientsActive($slug);
        if(!empty($course)) {
            $pageTitle = $course->name;
            $subTitle = $course->name;
            $trialLesson = $course->lessons;
            $student = Auth::guard('students')->user();

            $myCourse = null;
            if($student) {
                $studentCourse = $this->courseRepo->getMyCourses($student);
                $myCourse = $studentCourse->firstWhere('id', $course->id);
            }
            return view('Course::clients.detail', compact('pageTitle', 'subTitle', 'course', 'myCourse'));
        }
        abort(404);
    }

    public function trialLesson($lessonId = 0) {
        $lesson = $this->lessonRepo->find($lessonId);
        if(!empty($lesson)) {
            return ['lesson' => $lesson,'status' => 1];
        }
        return ['status' => 0];
    }


}
