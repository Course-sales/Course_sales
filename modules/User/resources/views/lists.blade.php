@extends('layouts.backend')
@section('content')
@if(session('msg'))
    <div class="alert alert-success text-center">
        {{ session('msg') }}
    </div>
@endif
<p><a href="{{route('admin.users.create')}}" class="btn btn-success cus_success_btn">Add new</a></p>
<table class="table table-bordered text-center" id="table_users">
    <thead>
        <tr>
            <th>Group</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Created time</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @if(count($users) > 0)
            @foreach ($users as $user)
                <tr>    
                    <td>{{$user->group_id == 1 ? 'Administranstor' : 'CTV'}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                    @if(Auth::user()->id != $user->id && $user->group_id != 1)
                        <td><p><a href="{{route('admin.users.edit', $user->id)}}"><i class="fa fa-edit"></i></a></p></td>
                        <td><p><a href="" id="user-remove" data-value="{{$user->id}}"><i class="fa fa-trash"></i></a></p></td>
                    @else
                        <td><span class='badge bg-warning'>Active</span></td>
                        <td><span class='badge bg-warning'>Active</span></td>
                    @endif
                </tr>
            @endforeach
        @else
        
        @endif
    </tbody>
</table>
<script>
document.addEventListener('DOMContentLoaded', function(event) {
    document.querySelectorAll('#user-remove').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            var userId = element.dataset.value;
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
                    removeUser(userId).then((response) => {
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

    async function removeUser(userId) {
        let filters = { 'id': userId };
        try {
            let response = await $.ajax({
                url: "{{ route('admin.users.removeRow') }}",
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