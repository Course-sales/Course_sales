@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.teachers.index')}}" class="btn btn-success btn-sm cus_success_btn">List of teachers</a></p>
    </div>
</div>
<form action="" method="post" id="form-courses">
    @csrf
    <div class="row">

        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$teacherDetail['name']}}" placeholder="Enter name...">
        </div>

        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{$teacherDetail['slug']}}" placeholder="">
        </div>

        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Exp</label>
            <input type="text" class="form-control" name="exp" value="{{$teacherDetail['exp']}}" placeholder="Enter exp ...">
        </div>

        <div class="col-12 mb-3 group-control">
            <label for="" style="font-weight: 700">Description</label>
            <textarea class="form-control ckeditor" name="description">{{$teacherDetail['description']}}</textarea>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <div class="row align-items-end">
                    <div class="col-7">
                        <label for="" style="font-weight: 700">Avarta</label>
                        <input type="text" name="image" value="{{$teacherDetail['image']}}" class="form-control" placeholder="Avarta..." id="image" value="">
                    </div>
                    <div class="col-2 d-grid">
                        <button type="button" class="btn btn-primary" id="lfm-image" data-input="image" data-preview="holder">Choose</button>
                    </div>
                    <div class="col-3">
                        <div id="holder">
                            <img src="{{$teacherDetail['image']}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-sm cus_warning_btn">Update</button>
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