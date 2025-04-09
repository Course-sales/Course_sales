<?php
namespace Modules\Lesson\src\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Iman\Streamer\VideoStreamer;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Document\src\Repositories\DocumentRepositoryInterface;
use Modules\Lesson\src\Repositories\LessonRepositoryInterface;
use Modules\Video\src\Repositories\VideoRepositoryInterface;

class LessonController extends Controller
{
    protected $courseRepo;
    protected $lessonRepo;

    public function __construct(CourseRepositoryInterface $courseRepositoryInterface, LessonRepositoryInterface $lessonRepositoryInterface) {
        $this->courseRepo = $courseRepositoryInterface;
        $this->lessonRepo = $lessonRepositoryInterface;
    }
    
    public function index($slug) {
        $lesson = $this->lessonRepo->getLessonClientsActive($slug);
        if(!empty($lesson)) {
            $course = $lesson->course;
            $lessons = $this->lessonRepo->getLessons($course->id);
            $pageTitle = $lesson->name;
            $subTitle = $lesson->name;
            $lessons = $this->lessonRepo->getLessonByPossition($course);
            $lessonIndex = null;
            foreach($lessons as $key => $item) {
                if($item->id == $lesson->id) {
                    $lessonIndex = $key;
                    break;
                }
            }
            $nextLesson = null;
            $prevLesson = null;
            if(isset($lessons[$lessonIndex + 1])) {
                $nextLesson = $lessons[$lessonIndex + 1];
            }
            if(isset($lessons[$lessonIndex - 1])) {
                $prevLesson = $lessons[$lessonIndex - 1];
            }
            return view('Lesson::clients.index', compact('pageTitle', 'subTitle', 'lesson', 'course', 'nextLesson', 'prevLesson'));
        }
      abort(404);
    }

}
