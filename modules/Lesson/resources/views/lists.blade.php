@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<div class="row mb-4">
    <div class="col">
        <a href="{{route('admin.courses.index')}}" class="btn btn-success btn-sm cus_success_btn">Go back</a>
        <a class="btn btn-info cus_info_btn" id="create_chapter" data-id="{{$course->id}}">Add new module</a>
        <a class="btn btn-warning cus_warning_btn" href="{{route('admin.lessons.sort', $course->id)}}">Sort</a>
    </div>
</div>
<hr>
<table class="table table-bordered text-center" id="table_lessons">
    <thead>
        <tr>
            <th>Name</th>
            <th>Trial</th>
            <th>View</th>
            <th>Duration</th>
            <th>Create time</th>
            <th>Add</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        {{lessonsList($lessons)}}
    </tbody>
</table>
<script>
document.addEventListener('DOMContentLoaded', function() {

    document.querySelector('#create_chapter').addEventListener('click', function(e) {
        e.preventDefault();
        var courseId = $(this).data('id');
        Swal.fire({
                title: "Create new module",
                html: `
                    <div class="row">
                        <input class="swal2-input form-control" placeholder="Module name..." id="name">
                        <input class="swal2-input form-control" placeholder="Slug..." id="slug">
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancel",
                confirmButtonText: "Save",
            }).then((result) => {
                if(result.isConfirmed) {
                    createChapter(courseId, document.querySelector('#name').value, document.querySelector('#slug').value).then((response) => {
                        if(response.status === 1) {
                            Swal.fire("", "Success", "success");
                            location.reload();
                        }else{
                            Swal.fire("Lỗi", "Fail", "error");
                        }
                    });
                    
                }
            });
            
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

    async function createChapter(courseId, name, slug) {
        let data = { 
            'courseId': courseId, 
            'name': name, 
            'slug': slug 
        };
        let url = `{{ route('admin.lessons.createChapter', ':courseId') }}`.replace(':courseId', courseId);
        try {
            let response = await $.ajax({
                url: url,
                type: "GET",
                data: data
            });
            return response;
        } catch (error) {
            console.error('Error:', error);
            return { status: 0 };
        }
    }


    document.querySelectorAll('#lesson-remove').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            var lessonId = element.dataset.id;
            Swal.fire({
                title: "Are you sure you want to delete?",
                text: '',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    removeLesson(lessonId).then((response) => {
                        if(response.status === 1) {
                            //this.closest('tr').remove();
                            Swal.fire("", "Success", "success");
                            location.reload();
                        }else{
                            Swal.fire("Lỗi", "Fail", "error");
                        }
                    });
                    
                }
            });
        });
    });

    async function removeLesson(lessonId) {
        let filters = { 'id': lessonId };
        try {
            let response = await $.ajax({
                url: "{{ route('admin.lessons.delete') }}",
                method: "DELETE",
                data: filters,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            return response;
        } catch (error) {
            console.error('Error:', error);
            return { status: 0 };
        }
    }
});
</script>
<style>
    .sparkle {
    color: red; /* Màu đỏ cho icon */
    padding-left: 30px;
    animation: sparkleEffect 1s infinite; /* Áp dụng hiệu ứng lấp lánh vô hạn */
    }
    

    @keyframes sparkleEffect {
        0%, 100% {
            opacity: 1; /* Bắt đầu và kết thúc với độ mờ 100% */
            transform: scale(1); /* Kích thước bình thường */
        }
        50% {
            opacity: 0.3; /* Giữa quá trình giảm độ mờ */
            transform: scale(1.2); /* Phóng to nhẹ */
        }
    }

    .module-item {
        color: red; /* Màu đỏ cho icon */
        font-weight: bold;
    }

</style>
@endsection
