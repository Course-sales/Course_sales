@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.courses.index')}}" class="btn btn-success btn-sm cus_success_btn">List of courses</a></p>
    </div>
</div>
<form action="" method="post" id="form-courses">
    @csrf
    <div class="row">

        <div class="col-6 mb-3 group-control">
            <label for="">Course name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$courseDetail['name']}}" placeholder="Enter course name ..." required>
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{$courseDetail['slug']}}" placeholder="" required>
        </div>
        <div class="col-4 mb-3 group-control">
            <label for="">Teacher</label>
            <select class="form-control" name="teacher_id" required>
                @if(count($teachers) > 0)
                @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}" {{($teacher->id == $courseDetail['teacher_id']) ? 'selected' : ''}}>{{$teacher->name}}</option>
                @endforeach
            @endif                
            </select>
        </div>
        <div class="col-4 mb-3 group-control">
            <label for="" style="font-weight: 700">Level</label>
            <select class="form-control" name="levels" required>
                <option value="0" {{ ($courseDetail['levels'] == 0) ? 'selected' : '' }}>Basic</option>
                <option value="1" {{ ($courseDetail['levels'] == 1) ? 'selected' : '' }}>Advance</option>
            </select>
        </div>
        <div class="col-4 mb-3 group-control">
            <label for="" style="font-weight: 700">Code</label>
            <input type="text" class="form-control" name="code" value="{{$courseDetail['code']}}" placeholder="Enter code ...">
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="">Price</label>
            <input type="text" class="form-control" name="price" value="{{$courseDetail['price']}}" placeholder="Enter price ...">
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="">Sale price</label>
            <input type="text" class="form-control" name="sale_price" value="{{$courseDetail['sale_price']}}" placeholder="Enter sale price ...">
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="">Document</label>
            <select class="form-control" name="is_document">
                <option value="0">No</option>
                <option value="1" {{($courseDetail['is_document'] == 1) ? 'selected' : ''}}>Yes</option>
            </select>
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="">Status</label>
            <select class="form-control" name="status">
                <option value="0" {{($courseDetail['status'] == 0) ? 'selected' : ''}}>Not released</option>
                <option value="1" {{($courseDetail['status'] == 1) ? 'selected' : ''}}>Released</option>
            </select>
        </div>
        <div class="col-12 mb-3 group-control">
            <label for="" style="font-weight: 700" id="label-categories">Categories:</label>
            {{splitCategoryCheckbox($categories, $categoryIds)}}
        </div>
        <div class="col-12 mb-3 group-control">
            <label for="">Support</label>
            <textarea class="form-control" name="supports" id="">{{$courseDetail['supports']}}</textarea>
        </div>
        <div class="col-12 mb-3 group-control">
            <label for="">Content</label>
            <textarea class="form-control ckeditor" name="detail">{{$courseDetail['detail']}}</textarea>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="row align-items-end">
                    <div class="col-7">
                        <label for="">Avatar</label>
                        <input type="text" name="thumbnail" class="form-control" placeholder="Avatar..." id="thumbnail" value="{{$courseDetail['thumbnail']}}">
                    </div>
                    <div class="col-2 d-grid">
                        <button type="button" class="btn btn-primary" id="lfm-image" data-input="thumbnail" data-preview="holder">Choose</button>
                    </div>
                    <div class="col-3">
                        <div id="holder">
                            <img src="{{$courseDetail['thumbnail']}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        document.getElementById('form-courses').addEventListener('submit', function(e) {
            
            var checkboxs = document.querySelectorAll('input[type="checkbox"][name="categories[]"]');
            var isChecked = false;
            checkboxs.forEach(function(checkbox) {
                if(checkbox.checked) {
                    isChecked = true;
                }
            });
            if(!isChecked) {
                e.preventDefault();
                // document.getElementById('label-categories').focus();
                document.getElementById('label-categories').scrollIntoView({ behavior: 'smooth', block: 'center' });
                Swal.fire("Lỗi", "Vui lòng chọn danh mục cho khóa học!", "error");
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