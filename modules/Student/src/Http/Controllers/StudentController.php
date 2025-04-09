<?php
namespace Modules\Student\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Student\src\Repositories\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $studentRepo;
    public function __construct(StudentRepositoryInterface $studentRepositoryInterface) {
        $this->studentRepo = $studentRepositoryInterface;
    }
    
    public function index() {
        $pageTitle = 'List of students';
        $students = $this->studentRepo->getAll();
        return view('Student::lists', compact('pageTitle', 'students'));
    }

    public function create() {
        $pageTitle = 'Create new student';
        
        return view('Student::add', compact('pageTitle'));
    }

    public function store(Request $request) {
        $inputData = $request->except('_token');
        $rows = [];
        foreach($inputData as $key => $value) {
            if(strpos($key, 'cell_') !== false) {
                $parts = explode('_', $key);
                $rowIndex = $parts[1];
                $colIndex = $parts[3];
                $rows[$rowIndex][$colIndex] = $value;
            }
        }
        if(!empty($rows)) {
            $count = 0;
            foreach($rows as $row) {
                $this->studentRepo->create([
                    'status' => $row[1],
                    'name' => $row[2],
                    'phone' => $row[3] ?? '',
                    'email' => $row[4],
                    'password' => Hash::make($row[5]),
                    'address' => $row[6] ?? '',
                ]);
                $count++;
            }
            
            return redirect()->route('admin.students.index')->with('msg', 'Create successfull '.$count.' students!');
        }

        return back();
    }

    public function edit($studentId) {
        $student = $this->studentRepo->find($studentId);
        if(!empty($student)) {
            $pageTitle = 'Update student';
            return view('Student::edit', compact('pageTitle', 'student'));
        }
        
    }

    public function update(Request $request, $studentId) {
        $inputdata = $request->except('password', '_token');
        if(!empty($request->password)) {
            $inputdata['password'] = Hash::make($request->password);
        }
        $this->studentRepo->update($studentId, $inputdata);

        return back()->with('msg', 'Update successfully!');
    }

    public function removeRow(Request $request) {
        $student = $this->studentRepo->find($request->id);
        if(!empty($student)) {
            $this->studentRepo->delete($request->id);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }
    public function search(Request $request) {
        $result = $this->studentRepo->searchForStudents($request->keyword);
        return ['data' =>  $result];
    }
}
