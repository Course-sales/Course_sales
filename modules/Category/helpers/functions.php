<?php 
    function splitCategory($categories, $selected = '' ,$parentId = 0, $level = '') {
        $currentId = request()->route()->categoryId;
        if($categories) {
            foreach($categories as $key => $category) {
                if($category->parent_id == $parentId && $currentId != $category->id) {
                    echo '<option value="'.$category->id.'" ';
                    echo ($category->id == $selected) ? 'selected' : '';
                    echo '>'.$level.$category->name.'</option>';
                    unset($categories[$key]);
                    splitCategory($categories,  $selected,$category->id, $level.'|- ');
                }
            }
        }
    }

    function categoriesList($treeCategories, $parentId = 0, $level = '') {
        if($treeCategories) {
            foreach($treeCategories as $key => $leafCategory) {
                echo '<tr>';
                if($leafCategory->parent_id == $parentId) {
                    echo '<td class="text-left"> '.$level.$leafCategory->name.'</td>';
                    echo '<td><a href="" class="btn btn-primary btn-sm">View</a></td>';
                    echo '<td>'.$leafCategory->created_at->format('d/m/Y').'</td>';
                    echo '<td><a href="'.route('admin.categories.edit', $leafCategory->id).'"><i class="fa fa-edit"></i></a></td>';
                    echo '<td><a href="" id="category-remove" data-value="'.$leafCategory->id.'"><i class="fa fa-trash"></i></a></td>';
                    unset($treeCategories[$key]);
                    categoriesList($treeCategories, $leafCategory->id, $level.'<i class="fa-solid fa-angle-right sparkle"></i> ');
                }
                echo '</tr>';
            }
        }
    }
