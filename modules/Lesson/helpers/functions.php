<?php

use Modules\Lesson\src\Repositories\LessonRepositoryInterface;
function isRoute($routeList) {
    if(!empty($routeList)) {
        foreach($routeList as $route) {
            if(request()->is(trim($route, '/'))) {
                return true;
            }
        }
    }
    return false;
}
function splitLesson($lessons, $selected = '' ,$parentId = 0, $level = '') {
    $currentId = request()->route()->lessonId;
    if($lessons) {
        foreach($lessons as $key => $lesson) {
            if($lesson->parent_id == $parentId && $currentId != $lesson->id) {
                echo '<option value="'.$lesson->id.'" ';
                echo ($lesson->id == $selected) ? 'selected' : '';
                echo '>'.$level.$lesson->name.'</option>';
                unset($lessons[$key]);
                splitLesson($lessons,  $selected,$lesson->id, $level.'|- ');
            }
        }
    }
}

function lessonsList($treeLessons, $parentId = 0, $level = '') {
    if($treeLessons) {
        $lessonIndex = 1; 
        $moduleIndex = 1;
        foreach($treeLessons as $key => $leafLessons) {
            echo '<tr>';
            if($leafLessons->parent_id == $parentId) {
                if($leafLessons->parent_id == null) {
                    echo '<td class="text-left module-item">Module '.$moduleIndex++.': '.$level.$leafLessons->name.'</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td>'.$leafLessons->created_at->format('d/m/Y').'</td>';
                    echo 
                    '<td>
                        <a href="'.route('admin.lessons.create', $leafLessons->course_id).'?module='.$leafLessons->id.'">
                            <p class="btn btn-primary btn-sm">Add more lesson</p>
                        </a>
                    </td>';
                    echo '<td><a href="'.route('admin.lessons.edit', $leafLessons->id).'"><i class="fa fa-edit"></i></a></td>';
                    echo '<td><a href="" id="lesson-remove" data-id="'.$leafLessons->id.'"><i class="fa fa-trash"></i></a></td>';
                }else{
                    echo '<td class="text-left lesson-item">'.$level.'Lesson '.$lessonIndex++.': '.$leafLessons->name.'</td>';
                    echo $leafLessons->is_trial == 0 ? '<td><span class="badge bg-warning">No</span></td>' : '<td><span class="badge bg-success">Yes</span></td>';
                    echo '<td>'.$leafLessons->views.'</td>';
                    echo '<td>'.getTimeDuration($leafLessons->durations).' min</td>';
                    echo '<td>'.$leafLessons->created_at->format('d/m/Y').'</td>';
                    echo '<td></td>';
                    echo '<td><a href="'.route('admin.lessons.edit', $leafLessons->id).'"><i class="fa fa-edit"></i></a></td>';
                    echo '<td><a href="" id="lesson-remove" data-id="'.$leafLessons->id.'"><i class="fa fa-trash"></i></a></td>';
                }
                

                unset($treeLessons[$key]);
                lessonsList($treeLessons, $leafLessons->id, $level.'<i class="fa-solid fa-angle-right sparkle"></i> ');
            }
            echo '</tr>';
        }
    }
}

function getTimeDuration($seconds) {
    $mins = floor($seconds / 60);
    $seconds = floor($seconds - $mins * 60);
    $mins = $mins < 10 ? '0'.$mins : $mins;
    $seconds = $seconds < 10 ? '0'.$seconds : $seconds;
    return "$mins:$seconds";
}

function getLessonCount($course) {
    $lessonRepositoryInterface = app(LessonRepositoryInterface::class);
    return $lessonRepositoryInterface->getLessonCount($course);
}



