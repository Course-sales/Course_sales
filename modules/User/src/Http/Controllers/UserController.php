<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepo = $userRepositoryInterface;
    }
    public function index() {
        $pageTitle = 'List of users';
        $users = $this->userRepo->getUsers();
        return view('User::lists', compact('pageTitle', 'users'));
    }

    public function create() {
        $pageTitle = 'Create new user';
        
        return view('User::add', compact('pageTitle'));
    }

    public function store(Request $request) {
        $inputData = $request->except('_token');

        $rows = [];
        foreach($inputData as $key => $value) {
            if(strpos($key, 'cell_') !== false) {
                $parts = explode('_', $key);
                $rowIndex = $parts[1];
                $colIndex = $parts[3];
                $rows[$rowIndex][$colIndex] = !empty($value) ? $value : null;
            }
        }

        if(!empty($rows)) {
            $count = 0;
            foreach($rows as $row) {
                $this->userRepo->create([
                    'name' => $row[1] ?? 'null',
                    'group_id' => $row[2] ?? 0,
                    'email' => $row[3] ?? 'null',
                    'password' => Hash::make($row[4]) ?? 'null',
                ]);
                $count++;
            }
            
            return redirect()->route('admin.users.index')->with('msg', 'Create successfully!');
        }

        abort(404);
    }

    public function edit($userId) {
        $userDetail = $this->userRepo->find($userId);
        if(!empty($userDetail)) {
            $pageTitle = 'Update user';

            return view('User::edit', compact('pageTitle', 'userDetail'));
        }
        
    }

    public function update(Request $request, $userId) {
        $inputdata = $request->except('password', '_token');
        if(!empty($request->password)) {
            $inputdata['password'] = Hash::make($request->password);
        }
        $this->userRepo->update($userId, $inputdata);

        return back()->with('msg', 'Update successfully!');

    }

    public function removeRow(Request $request) {
        $userDetail = $this->userRepo->find($request->id);
        if(!empty($userDetail)) {
            $this->userRepo->delete($request->id);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }
}
