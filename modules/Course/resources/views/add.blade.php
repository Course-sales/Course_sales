@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col">
        <p><a href="{{route('admin.courses.index')}}" class="btn btn-success btn-sm cus_success_btn">List of courses</a></p>
    </div>
</div>
<form action="" method="post" id="form-courses">
    @csrf
    <div class="row">

        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Course name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter course name ...">
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="">
        </div>
        <div class="col-4 mb-3 group-control">
            <label for="" style="font-weight: 700">Teacher</label>
            <select class="form-control" name="teacher_id" required>
                <option value="">Choose</option>
                @if(count($teachers) > 0)
                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-4 mb-3 group-control">
            <label for="" style="font-weight: 700">Level</label>
            <select class="form-control" name="levels" required>
                <option value="">Choose</option>
                <option value="0">Basic</option>
                <option value="1">Advance</option>
            </select>
        </div>
        <div class="col-4 mb-3 group-control">
            <label for="" style="font-weight: 700">Code</label>
            <input type="text" class="form-control" name="code" placeholder="Enter code ...">
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter price ..." >
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Sale price</label>
            <input type="text" class="form-control" name="sale_price" placeholder="Enter sale price ...">
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Document</label>
            <select class="form-control" name="is_document">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="col-6 mb-3 group-control">
            <label for="" style="font-weight: 700">Status</label>
            <select class="form-control" name="status">
                <option value="0">Not released</option>
                <option value="1">Released</option>
            </select>
        </div>
        <div class="col-12 mb-3 group-control">
            <label for="" style="font-weight: 700">Categories:</label>
            {{splitCategoryCheckbox($categories)}}
        </div>
        <div class="col-12 mb-3 group-control">
            <label for="" style="font-weight: 700">Support</label>
            <textarea class="form-control" name="supports" id=""></textarea>
        </div>
        <div class="col-12 mb-3 group-control">
            <label for="" style="font-weight: 700">Content</label>
            <textarea class="form-control ckeditor" name="detail"></textarea>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="row align-items-end">
                    <div class="col-7">
                        <label for="" style="font-weight: 700">Avatar</label>
                        <input type="text" name="thumbnail" class="form-control" placeholder="Avatar..." id="thumbnail" value="">
                    </div>
                    <div class="col-2 d-grid">
                        <button type="button" class="btn btn-primary" id="lfm-image" data-input="thumbnail" data-preview="holder">Choose</button>
                    </div>
                    <div class="col-3">
                        <div id="holder">
                            <img src="" />
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
                Swal.fire("Lỗi", "Please select a category for the course!", "error");
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