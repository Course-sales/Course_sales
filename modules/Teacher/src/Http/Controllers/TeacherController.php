<?php
namespace Modules\Teacher\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $teacherRepo;
    public function __construct(TeacherRepositoryInterface $teacherRepositoryInterface) {
        $this->teacherRepo = $teacherRepositoryInterface;
    }

    public function index() {
        $pageTitle = 'List of teachers';
        $teachers = $this->teacherRepo->getTeachers();
        return view('Teacher::lists', compact('pageTitle', 'teachers'));
    }
    public function create() {
        $pageTitle = 'Create new teacher';

        return view('Teacher::add', compact('pageTitle'));
    }
    public function store(Request $request) {
        $inputData = $request->except('_token');
        if(!empty($inputData)) {
            $this->teacherRepo->create($inputData);

            return redirect()->route('admin.teachers.index')->with('msg', 'Create successful');
        }
        abort(404);
    }

    public function edit($teacherId) {
        $teacherDetail = $this->teacherRepo->find($teacherId);
        if(!empty($teacherDetail)) {
            $pageTitle = 'Update teacher';
            return view('Teacher::edit', compact('pageTitle', 'teacherDetail'));
        }        
        abort(404);
    }
    public function update($teacherId, Request $request) {
        $inputData = $request->except('_token');
        $this->teacherRepo->update($teacherId, $inputData);
        
        return back()->with('msg', 'Update successfully!');
    }

    public function removeRow(Request $request) {
        $teacherDetail = $this->teacherRepo->find($request->id);
        if(!empty($teacherDetail)) {
            $this->teacherRepo->delete($request->id);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }
    public function search(Request $request) {
        $result = $this->teacherRepo->search($request->keyword);

        return ['data' => $result, 'status' => 1];
    }
}
