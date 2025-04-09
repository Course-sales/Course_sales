<?php
namespace Modules\Category\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Category\src\Models\Category;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface{
    public function getModel(){
        return Category::class;
    }
    public function getCategories() {
        return $this->model->get();
    }
    public function getTreeCategories() {
        return $this->model->with('subCategories')->where('parent_id', 0)->get();
    }
    public function deleteChild($categoryId){
        $category = $this->model->find($categoryId);
        $childrenCategory = $this->model->where('parent_id', $category->id)->get();
        foreach($childrenCategory as $child) {
            $this->deleteChild($child->id);
        }
        $this->model->delete($category->id);
    }

}
