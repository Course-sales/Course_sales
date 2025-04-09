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

<form action="" method="post" id="form-courses">
    @csrf
    <div class="row" id="lesson-form">
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$lesson->name}}" placeholder="Enter lesson name ..." required>
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{$lesson->slug}}" placeholder="">
        </div>
        <div class="col-5 mb-3 group-control">
            <label for="" style="font-weight: 700">Module</label>
            <select class="form-control select2" name="parent_id">
                <option value="">No</option>
                {{splitLesson($lessons, $lesson->parent_id)}}
            </select>
        </div>
        <div class="col-3 mb-3 group-control">
            <label for="" style="font-weight: 700">Trial</label>
            <select class="form-control" name="is_trial">
                <option value="0" {{($lesson->is_trial) == 0 ? 'selected' : ''}}>No</option>
                <option value="1" {{($lesson->is_trial) == 1 ? 'selected' : ''}}>Yes</option>
            </select>
        </div>
        <div class="col-3 mb-3 group-control">
            <label for="" style="font-weight: 700">Status</label>
            <select class="form-control" name="status">
                <option value="0" {{($lesson->status) == 0 ? 'selected' : ''}}>Not activated</option>
                <option value="1" {{($lesson->status) == 1 ? 'selected' : ''}}>Activated</option>
            </select>
        </div>
        <div class="col-1 mb-3 group-control">
            <label for="" style="font-weight: 700">Sort</label>
            <input type="text" class="form-control text-center" name="position" value="{{$lesson->position}}" placeholder="Position ...">
        </div>  
        <div class="col-6 mb-3">
            <label for="" style="font-weight: 700">Video</label>
            <div class="input-group">
                <input type="text" class="form-control" name="video" id="video-url" value="{{$lesson->video}}" placeholder="Video ..."> 
                <button type="button" class="btn btn-success" id="lfm-video" data-input="video-url" data-preview="holder">Choose</button>
            </div>
        </div>
        <div class="col-6 mb-3">
            <label for="" style="font-weight: 700">Document</label>
            <div class="input-group">
                <input type="text" class="form-control" name="document" id="document-url" value="{{$lesson->document}}" placeholder="Document ..."> 
                <button type="button" class="btn btn-success" id="lfm-document" data-input="document-url" data-preview="holder">Choose</button>
            </div>
        </div>

        <div class="col-12 mb-3 group-control">
            <label for="" style="font-weight: 700">Content</label>
            <textarea class="form-control ckeditor" name="description">{{$lesson->description}}</textarea>
        </div>
        <hr>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-sm cus_primary_btn">Save</button>
            </div>
        </div>
    </div>

</form>
@endsection

@section('stylesheets')
    <style>
        img {
            max-width: 100%;
            height: auto !important;
        }

        #holder img {
            width: 100% !important;
        }

        .list-categories {
            max-height: 250px;
            overflow: auto;

        }
    </style>
@endsection
@section('scripts')
<script>
    

    document.addEventListener('DOMContentLoaded', function() {
        
        document.querySelector('#name').addEventListener('keyup', function() {
            document.querySelector('#slug').value = getSlug(this.value);
        });
        document.querySelector('#slug').addEventListener('change', function(e) {
            if(this.value === '') {
                this.value = getSlug(document.querySelector('#name').value);
            }
        });
        
        function getSlug(title) {
            let slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
            slug = slug.replace(/đ/gi, "d");
            //Xóa các ký tự đặt biệt
            slug = slug.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
                ""
            );
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-/gi, "-");
            slug = slug.replace(/\-\-/gi, "-");
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = "@" + slug + "@";
            slug = slug.replace(/\@\-|\-\@|\@/gi, "");
            return slug;
        }
    });
</script>
@endsection