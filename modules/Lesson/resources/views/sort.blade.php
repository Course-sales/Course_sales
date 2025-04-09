@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.lessons.index', $course)}}" class="btn btn-success btn-sm cus_success_btn">List of modules - lessons</a></p>
    </div>
</div>
<style>
    .module-item {
    color: red; /* Màu đỏ cho icon */
    font-weight: bold;
    animation: sparkleEffect 1s infinite; /* Áp dụng hiệu ứng lấp lánh vô hạn */
    }

    @keyframes sparkleEffect {
        0%, 100% {
            opacity: 1; /* Bắt đầu và kết thúc với độ mờ 100% */
            transform: scale(1); /* Kích thước bình thường */
        }
    }

    .lesson-item {
        padding-left: 50px;
    }

</style>
<form action="" method="post" id="lesson-sort">
    @csrf
    <div id="sort-list" class="list-group col">
        @foreach ($modules as $module)
            <div id="item-{{$module->id}}" data-id="{{$module->id}}" class="list-group-item module-item">{{$module->name}}
                <input type="hidden" name="lesson[]" value="{{$module->id}}">
            </div>
            @if(!empty($module->children)) 
                @php $lessons =  $module->children()->orderBy('position', 'asc')->get(); @endphp
                @foreach($lessons as $lesson)
                    <div id="item-{{$lesson->id}}" data-id="{{$lesson->id}}" class="list-group-item lesson-item">{{$lesson->name}}
                        <input type="hidden" name="lesson[]" value="{{$lesson->id}}">
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-sm cus_primary_btn">Save</button>
        </div>
    </div>
</form>
@endsection

@section('stylesheets')
    <style>
    .ghost {
        opacity: 0.4;
    }
    .list-group {
        margin: 20px;
    }
    </style>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
<script>
    $('#sort-list').sortable({
    group: 'list',
    animation: 200,
    ghostClass: 'ghost',
    onSort: () => {
        console.log('success');
    },
});
</script>
@endsection