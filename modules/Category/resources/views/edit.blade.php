@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.categories.index')}}" class="btn btn-success btn-sm cus_success_btn">List of categories</a></p>
    </div>
</div>
<form method="POST">
    <div class="row">
        @csrf
        <div class="col-6 form-group">
            <label for="">Parent</label>
            <select name="parent_id" id="parent_id" class="form-control" required>
                <option value="0">No</option>
                {{splitCategory($categories, $categoryDetail->parent_id)}}
            </select>
        </div>
        <div class="col-6 form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$categoryDetail->name}}" placeholder="Enter category ..." required>
        </div>
        
        <div class="col-6 form-group">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{$categoryDetail->slug}}" placeholder="Enter slug ..." required>
        </div>
    
    </div>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary cus_primary_btn">Update</button>
        </div>
    </div>
</form>
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