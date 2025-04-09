<?php


    function splitCategoryCheckbox($categories, $selectedIds = [],$parentId = 0, $level = '') {
        
        if($categories) {
            foreach($categories as $key => $category) {
                if($category->parent_id == $parentId) {
                    echo '<p><input type="checkbox" ';
                    echo in_array($category->id, $selectedIds) ? 'checked' : '';
                    echo ' name="categories[]" value="'.$category->id.'"> '.$level.$category->name.'</p>';
                    unset($categories[$key]);
                    splitCategoryCheckbox($categories, $selectedIds, $category->id, $level.'|- ');
                }
            }
        }
    }