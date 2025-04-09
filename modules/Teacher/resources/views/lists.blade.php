@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<p><a href="{{route('admin.teachers.create')}}" class="btn btn-success cus_success_btn">Add new teacher</a></p>
<div class="row mb-4">
    <div class="col">
        <input type="search" class="form-control" name="search" id="keyword" placeholder="Enter keyword ...">
    </div>
</div>
<table class="table table-bordered text-center" id="table_teachers">
    <thead>
        <tr>
            <th></th>
            <th>Image</th>
            <th>Lecturer Name</th>
            <th>Experience</th>
            <th>Created At</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @if (count($teachers) > 0)
            @php $count = 1 @endphp
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{$count++}}</td>
                    <td><img src="{{$teacher->image}}" alt="" style="width: 150px; height: 150px"></td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->exp}}</td>
                    <td>{{$teacher->created_at->format('d/m/Y')}}</td>
                    <td><a href="{{route('admin.teachers.edit', $teacher->id)}}"><i class="fa fa-edit"></i></a></td>
                    <td><a href="" id="teacher-remove" data-value="{{$teacher->id}}"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const keyword = document.querySelector('#keyword');
        const table = document.querySelector('#table_teachers');
        keyword.addEventListener('blur', (e) => {
            e.preventDefault();
            searchForTeachers(keyword.value);
        });
        const searchForTeachers = async (keyword) => {
            var response = await fetch(`/admin/teachers/search`, {
                method: "POST",
                    headers: {
                        "X-CSRF-TOKEN" : token,
                        "Content-Type" : "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({keyword:keyword}),
            });
            var result = await response.json();
            var tbodyElement = '';
            var index = 1;
            result.data.forEach((item) => {
                const rawDate = new Date(item.created_at);
                const created_at = rawDate.toLocaleDateString('vi-VN');
                tbodyElement += "<tr>";
                    tbodyElement += "<td>" + index++ + "</td>";
                    tbodyElement += "<td><img src='" + item.image + "' alt='' style='width: 150px; height: 150px'></td>";
                    tbodyElement += "<td>" + item.name + "</td>";
                    tbodyElement += "<td>" + item.exp + "</td>";
                    tbodyElement += "<td>" + created_at + "</td>";
                    tbodyElement += "<td><a href='/admin/teachers/edit/" + item.id + "'><i class='fa fa-edit'></i></a></td>";
                    tbodyElement += "<td><a href='' id='teacher-remove' data-value='" + item.id + "''><i class='fa fa-trash'></i></a></td>";
                    tbodyElement += "</tr>";
            });
            table.querySelector('tbody').innerHTML = tbodyElement
            
        }
        
        document.querySelectorAll('#teacher-remove').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                var teacherId = element.dataset.value;
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
                        removeTeacher(teacherId).then((response) => {
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
    
        async function removeTeacher(teacherId) {
            let filters = { 'id': teacherId };
            try {
                let response = await $.ajax({
                    url: "{{ route('admin.teachers.removeRow') }}",
                    type: "DELETE",
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
@endsection