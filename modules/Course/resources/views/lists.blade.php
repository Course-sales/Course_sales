@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<p><a href="{{route('admin.courses.create')}}" class="btn btn-success cus_success_btn">Add more</a></p>
<table class="table table-bordered text-center" id="table_courses">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
            <th>Lessons</th>
            <th>Create time</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @if(count($courses) > 0)
            @foreach ($courses as $course)
                <tr>
                    <td>{{$course->name}}</td>
                    <td>
                        @if($course->price == 0 && $course->sale_price == 0)
                            <p class="btn btn-warning btn-sm">Free</p>
                        @elseif($course->sale_price > 0)
                            {{number_format($course->sale_price, 0)}} đ
                        @else
                            {{number_format($course->price, 0)}} đ
                        @endif
                    </td>
                    </td>
                    <td>
                        @if ($course->status == 0)
                            <span class="badge bg-warning">Not released</span>
                        @else
                            <span class="badge bg-success">Released</span>
                        @endif
                    </td>
                    <td><a href="{{route('admin.lessons.index', $course->id)}}"><i class="fa-solid fa-layer-group btn btn-primary"></i></a></td>
                    <td>{{$course->created_at->format('d/m/Y')}}</td>
                    <td><a href="{{route('admin.courses.edit', $course->id)}}"><i class="fa fa-edit"></i></a></td>
                    <td><a href="" id="course-remove" data-value="{{$course->id}}"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        @else
        
        @endif
    </tbody>
</table>
<script>
document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('#course-remove').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            var courseId = element.dataset.value;
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
                    removeCourse(courseId).then((response) => {
                        if(response.status === 1) {
                            this.closest('tr').remove();
                            Swal.fire("", "Success", "success");
                        }else{
                            Swal.fire("Lỗi", "Fail", "error");
                        }
                        
                    });
                    
                }
            });
        });
    })

    async function removeCourse(courseId) {
        let filters = { 'id': courseId };
        try {
            let response = await $.ajax({
                url: "{{ route('admin.courses.delete') }}",
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
@endsection