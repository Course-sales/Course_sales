<?php
namespace Modules\Course\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class CourseController extends Controller
{
    protected $courseRepo;
    protected $categoryRepo;
    protected $teacherRepo;
    public function __construct(CourseRepositoryInterface $courseRepositoryInterface, 
    CategoryRepositoryInterface $categoryRepositoryInterface, TeacherRepositoryInterface $teacherRepositoryInterface) {
        $this->courseRepo = $courseRepositoryInterface;
        $this->categoryRepo = $categoryRepositoryInterface;
        $this->teacherRepo = $teacherRepositoryInterface;
    }

    public function index() {
        $pageTitle = 'List of courses';
        $courses = $this->courseRepo->getCourses();
        return view('Course::lists', compact('pageTitle', 'courses'));
    }

    public function create() {
        $pageTitle = 'Create course';
        $categories = $this->categoryRepo->getCategories();
        $teachers = $this->teacherRepo->getTeachers();
        return view('Course::add', compact('pageTitle', 'categories', 'teachers'));
    }
    public function store(Request $request) {
        $inputData = $request->except('_token');
        if(empty($inputData['sale_price'])) {
            $inputData['sale_price'] = 0;
        }
        if(empty($inputData['price'])) {
            $inputData['price'] = 0;
        }

        $course = $this->courseRepo->create($inputData);
        $categories = [];
        foreach($inputData['categories'] as $category) {
            $categories[$category] = ['created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];
        }
        $this->courseRepo->createCoursesCategories($course, $categories);

        return redirect()->route('admin.courses.index')->with('msg', 'Create successful '.$inputData['name'].'!');
    }

    public function edit($courseId) {
        $courseDetail = $this->courseRepo->find($courseId);
        if(!empty($courseDetail)) {
            $categories = $this->categoryRepo->getCategories();
            $categoryIds = $this->courseRepo->getRelatedCategoriesCourses($courseDetail);
            $teachers = $this->teacherRepo->getTeachers();
            $pageTitle = 'Update course';
            return view('Course::edit', compact('pageTitle', 'courseDetail', 'categories', 'categoryIds', 'teachers'));
        }
        abort(404);

    }
    public function update($courseId, Request $request) {
        $inputData = $request->except('_token');

        if(empty($inputData['sale_price'])) {
            $inputData['sale_price'] = 0;
        }
        $this->courseRepo->update($courseId, $inputData);
        $courseDetail = $this->courseRepo->find($courseId);
        $categories = [];
        foreach($inputData['categories'] as $category) {
            $categories[$category] = [
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];
        }
        $this->courseRepo->updateCoursesCategories($courseDetail, $categories);
        return back()->with('msg', 'Update successfully!');
    }
    
    public function delete(Request $request) {
        $courseDetail = $this->courseRepo->find($request->id);
        if(!empty($courseDetail)) {
            $this->courseRepo->delete($request->id);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
        
    }

}
