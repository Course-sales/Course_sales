@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<p><a href="{{route('admin.students.create')}}" class="btn btn-success cus_success_btn">Add new</a></p>
<div class="row mb-4">
    <div class="col">
        <input type="search" class="form-control" name="search" id="keyword" placeholder="Enter keyword ...">
    </div>
</div>
<hr>
<table class="table table-bordered text-center" id="table_students">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @if(count($students) > 0)
        @php $count = 1; @endphp
            @foreach ($students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>

                @if($student->status == 0) 
                    <td><span class="badge bg-warning">Not activated</span></td>
                @else
                    <td><span class="badge bg-success">Activated</span></td>
                @endif
                <td>{{$student->created_at->format('d/m/Y')}}</td>
                <td><p><a href="{{route('admin.students.edit', $student->id)}}"><i class="fa fa-edit"></i></a></p></td>
                <td><p><a href="" id="student-remove" data-value="{{$student->id}}"><i class="fa fa-trash"></i></a></p></td>
            </tr>
            @endforeach
        @else
        
        @endif
    </tbody>
</table>
<script>
document.addEventListener('DOMContentLoaded', function(event) {
    const searchElement = document.querySelector('#keyword');
    const table = document.querySelector('#table_students');
    searchElement.addEventListener('blur', (e) => {
        e.preventDefault();
        searchForStudents(searchElement.value);
        
    })
    const searchForStudents = async (keyword) => {
        var response = await fetch(`/admin/students/search`, {
            method: "POST",
                headers: {
                    "X-CSRF-TOKEN" : token,
                    "Content-Type" : "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({keyword:keyword}),
        });
            var result = await response.json();
            var tbodyElement = "";
            result.data.forEach((item) => {
                const rawDate = new Date(item.created_at);
                const created_at = rawDate.toLocaleDateString('vi-VN');
                tbodyElement += "<tr>";
                tbodyElement += "<td>"+item.name+"</td>";
                tbodyElement += "<td>"+item.email+"</td>";
                tbodyElement += "<td>"+item.phone+"</td>";

                tbodyElement += "<td>"+item.address+"</td>";
                tbodyElement += item.status === 0 ? "<td><span class='badge bg-warning'>Not activated</span></td>" : "<td><span class='badge bg-success'>Activated</span></td>"
                tbodyElement += "<td>"+created_at+"</td>";
                tbodyElement += "<td><p><a href='/admin/students/edit/"+item.id+"'><i class='fa fa-edit'></i></a></p></td>";
                tbodyElement += "<td><p><a href='' id='student-remove' data-value='"+item.id+"'><i class='fa fa-trash'></i></a></p></td>";
                tbodyElement += "</tr>";
            });
            table.querySelector('tbody').innerHTML = tbodyElement
            
               
    }
    document.querySelectorAll('#student-remove').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            var studentId = element.dataset.value;
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
                    removeUser(studentId).then((response) => {
                        if(response.status === 1) {
                            this.closest('tr').remove();
                        }else{
                            Swal.fire("Lỗi", "Fail", "error");
                        }
                    });
                }
            });
        });
    })
    async function removeUser(studentId) {
        let filters = { 'id': studentId };
        try {
            let response = await $.ajax({
                url: "{{ route('admin.students.removeRow') }}",
                type: "DELETE",
                data: filters,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
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