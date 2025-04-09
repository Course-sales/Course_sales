@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<p><a href="{{route('admin.categories.create')}}" class="btn btn-success cus_success_btn">Add new</a></p>
<table class="table table-bordered text-center" id="table_categories">
    <thead>
        <tr>
            <th>Name</th>
            <th>Link</th>
            <th>Create time</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        {{categoriesList($categories)}}
    </tbody>
</table>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    
        document.querySelectorAll('#category-remove').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                var categoryId = element.dataset.value;
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
                        removeCategory(categoryId).then((response) => {
                            if(response.status === 1) {
                                window.location.reload();
                                Swal.fire("", "Success", "success");
                            }else{
                                Swal.fire("Lỗi", "Fail", "error");
                            }
                        });
                    }
                });
            });
        })
    
        async function removeCategory(categoryId) {
            let filters = { 'id': categoryId };
            try {
                let response = await $.ajax({
                    url: "{{ route('admin.categories.delete') }}",
                    type: "GET",
                    data: filters
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

</style>
@endsection