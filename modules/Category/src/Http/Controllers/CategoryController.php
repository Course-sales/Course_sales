<?php
namespace Modules\Category\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface) {
        $this->categoryRepo = $categoryRepositoryInterface;
    }

    public function index() {
        $pageTitle = 'List of categories';
        $categories = $this->categoryRepo->getCategories();
        return view('Category::lists', compact('pageTitle', 'categories'));
    }

    public function create() {
        $pageTitle = 'Create category';
        $categories = $this->categoryRepo->getCategories();
        return view('Category::add', compact('pageTitle', 'categories'));
    }
    public function store(Request $request) {
        $this->categoryRepo->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
        ]);
        
        return redirect()->route('admin.categories.index')->with('msg', 'Create successful '.$request->name.'!');
    }

    public function edit($categoryId) {
        $pageTitle = 'Update category';
        $categoryDetail = $this->categoryRepo->find($categoryId);
        if(!empty($categoryDetail)) {
            $categories = $this->categoryRepo->getCategories();
            return view('Category::edit', compact('pageTitle', 'categoryDetail', 'categories'));
        }

        abort(404);
    }

    public function update(Request $request, $categoryId) {
        $inputData = $request->except('_token');
        $this->categoryRepo->update($categoryId, $inputData);

        return back()->with('msg', 'Update successfully!');
    }

    public function delete(Request $request) {
        $categoryDetail = $this->categoryRepo->find($request->id);
        if(!empty($categoryDetail)) {
            $this->categoryRepo->deleteChild($categoryDetail->id);
            $this->categoryRepo->delete($categoryDetail->id);
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }



}
