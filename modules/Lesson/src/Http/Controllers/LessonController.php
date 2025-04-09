<?php
namespace Modules\Lesson\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Document\src\Repositories\DocumentRepositoryInterface;
use Modules\Lesson\src\Repositories\LessonRepositoryInterface;
use Modules\Video\src\Repositories\VideoRepositoryInterface;

class LessonController extends Controller
{
    protected $courseRepo;
    protected $videoRepo;
    protected $documentRepo;
    protected $lessonRepo;

    public function __construct(CourseRepositoryInterface $courseRepositoryInterface, VideoRepositoryInterface $videoRepositoryInterface, 
        DocumentRepositoryInterface $documentRepositoryInterface, LessonRepositoryInterface $lessonRepositoryInterface) {
        $this->courseRepo = $courseRepositoryInterface;
        $this->videoRepo = $videoRepositoryInterface;
        $this->documentRepo = $documentRepositoryInterface;
        $this->lessonRepo = $lessonRepositoryInterface;
    }
    
    public function index($courseId) {
        $course = $this->courseRepo->find($courseId);
        if(!empty($course)) {
            $pageTitle = 'List of lessons: '.$course['name'];
            $lessons = $this->lessonRepo->getLessons($courseId);
            return view('Lesson::lists', compact('pageTitle', 'course', 'lessons'));
        }
      abort(404);
    }
    public function create($courseId) {
        $course = $this->courseRepo->find($courseId);
        if(!empty($course)) {
            $pageTitle = 'Create new lesson';
            $position = $this->lessonRepo->getPosition($courseId);
            $lessons = $this->lessonRepo->getAll();
            $position = $this->lessonRepo->getPosition($courseId);
            
            return view('Lesson::add', compact('pageTitle', 'course', 'position', 'lessons', 'position'));
        }   
        abort(404);
    }

    public function store($courseId, Request $request) {
        // create video
        $video = $request->video;
        $videoId = null;
        if(!empty($video)) {
            $videoInfo = getVideoInfo($video);
            $videoSize = $videoInfo['playtime_seconds'];
            $newVideo = $this->videoRepo->createVideo(['name' => basename($video) ,'url' => $video, 'size' => $videoSize]);
            $videoId = $newVideo ? $newVideo->id : null;
        }

        // create document
        $document = $request->document;
        $documentId = null;
        if(!empty($document)) {
            $documentInfo = getFileInfo($document);
            $newDocument = $this->documentRepo->createDocument(['name' => $documentInfo['name'] ,'url' => $documentInfo['url'], 'size' => $documentInfo['size']]);
            $documentId = $newDocument ? $newDocument->id : null;
        }

        // create lesson
        $this->lessonRepo->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'course_id' => $courseId,
            'video_id' => $videoId,
            'document_id' => $documentId,
            'parent_id' => $request->parent_id ?? null,
            'is_trial' => $request->is_trial,
            'views' => $request->views ?? 0,
            'position' => $request->position,
            'durations' => $videoSize ?? 0,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        $this->updateDurations($courseId);
        return redirect()->route('admin.lessons.index', $courseId)->with('msg', 'Create successfully!');
    }

    public function createChapter(Request $request) {
        $course = $this->courseRepo->find($request->courseId);
        if(!empty($course)) {
            $this->lessonRepo->create([
                'name' => $request->name,
                'slug' => $request->slug,
                'video_id' => null,
                'course_id' => $request->courseId,
                'document_id' => null,
                'parent_id' => null,
                'is_trial' => 0,
                'views' =>  0,
                'position' => $this->lessonRepo->getPosition($request->courseId),
                'durations' => 0,
                'description' => '',
                
            ]);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }

    public function edit($lessonId) {
        $lesson = $this->lessonRepo->find($lessonId);
        if(!empty($lesson)) {
            $pageTitle = "Update lesson";
            $lessons = $this->lessonRepo->getAll();
            $course = $lesson->course_id;
            $lesson->video = $lesson->video?->url;
            $lesson->document = $lesson->document?->url;
            return view('Lesson::edit', compact('pageTitle', 'lesson', 'lessons', 'course'));
        }
        abort(404);

    }

    public function update($lessonId, Request $request) {
        // create video
        $video = $request->video;
        $videoId = null;
        if(!empty($video)) {
            $videoInfo = getVideoInfo($video);
            $videoSize = $videoInfo['playtime_seconds'];
            $newVideo = $this->videoRepo->createVideo(['name' => basename($video) ,'url' => $video, 'size' => $videoSize]);
            $videoId = $newVideo ? $newVideo->id : null;
        }

        // create document
        $document = $request->document;
        $documentId = null;
        if(!empty($document)) {
            $documentInfo = getFileInfo($document);
            $newDocument = $this->documentRepo->createDocument(['name' => $documentInfo['name'] ,'url' => $documentInfo['url'], 'size' => $documentInfo['size']]);
            $documentId = $newDocument ? $newDocument->id : null;
        }

        // create lesson
        $this->lessonRepo->update($lessonId,[
            'name' => $request->name,
            'slug' => $request->slug,
            'video_id' => $videoId,
            'document_id' => $documentId,
            'parent_id' => $request->parent_id ?? null,
            'is_trial' => $request->is_trial,
            'views' => $request->views ?? 0,
            'position' => $request->position,
            'durations' => $videoSize ?? 0,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        $lesson = $this->lessonRepo->find($lessonId);
        $this->updateDurations($lesson->course_id);
        return redirect()->route('admin.lessons.edit', $lessonId)->with('msg', 'Update successfully!');
    } 

    public function delete(Request $request) {
        $lesson = $this->lessonRepo->find($request->id);
        if(!empty($lesson)) {
            $this->lessonRepo->delete($request->id);
            $this->updateDurations($lesson->course_id);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }

    public function sort($courseId) {
        $course = $this->courseRepo->find($courseId);
        if(!empty($course)) {
            $pageTitle = "Sort: ".$course->name;
            $modules = $this->lessonRepo->getModules($courseId);
            return view('Lesson::sort', compact('pageTitle', 'course', 'modules'));   

        }
        abort(404);
    }

    public function handleSort($courseId, Request $request) {
        $inputData = $request->lesson;
        if(!empty($inputData)) {
            foreach($inputData as $index => $lessonId) {
                $this->lessonRepo->update($lessonId, [
                    'position' => $index
                ]);
            }
            return back()->with('msg', 'Update successfully!');
        }
        
        abort(404);
    }

    private function updateDurations($courseId) {
        $lessons = $this->lessonRepo->getLessons($courseId);
        $durations = $lessons->reduce(function($prev, $item) {
            return $prev + $item->durations;
        }, 0);
        $this->courseRepo->update($courseId, ['durations' => $durations]);
    }

}
