@extends('layouts.backend')
@section('content')

<div class="row">
    <div class="col">
        <p><a href="{{route('admin.users.index')}}" class="btn btn-success btn-sm cus_success_btn">List of users</a></p>
    </div>
    <div class="col d-flex justify-content-end">
        <p><a href="" class="btn btn-danger btn-sm cus_danger_btn"><i class="fa fa-trash"></i>(0)</a></p>
    </div>
</div>
<form action="" method="post">
    @csrf
    <table class="table table-bordered text-center" id="table_user">
        <thead> 
            <tr>
                <th style="width: 5%"></th>
                <th>Name</th>
                <th>Group</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="row">
        <div class="col">
            <input type="button" class="btn btn-warning btn-sm cus_warning_btn" id="add-user" value="Add more row">
        </div>
        <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm cus_primary_btn">Save</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        event.preventDefault();
        document.querySelector('#add-user').addEventListener('click', function() {
            var boxcheckArr = [];
            var table = document.querySelector('#table_user');
            var rowCount = table.rows.length;
            var currentRow = table.insertRow(rowCount)

            for(var index = 0; index < 5; index++) {
                var cell = currentRow.insertCell();
                if(index == 0) {
                    var input = document.createElement('input');
                    input.name = 'cell_' + rowCount + '_col_' + index;
                    input.id = 'cell_' + rowCount + '_col_' + index;
                    input.type = 'checkbox';

                    input.addEventListener('change', function() {
                        if(this.checked) {
                            
                        }
                    });
                    cell.appendChild(input);
                }else if(index == 2) {
                    var select = document.createElement('select');
                    select.name = 'cell_' + rowCount + '_col_' + index;
                    select.id = 'cell_' + rowCount + '_col_' + index;
                    select.required = true;
                    optionArr = ['CTV', 'Administranstor'];
                    for(var i = 0; i < 2; i++) {
                        var option = document.createElement('option');
                        option.text = optionArr[i];
                        option.value = i === 1 ? 1 : 0;
                        select.appendChild(option);
                    }
                    cell.appendChild(select);
                }else{
                    var input = document.createElement('input');
                    input.name = 'cell_' + rowCount + '_col_' + index;
                    input.id = 'cell_' + rowCount + '_col_' + index;
                    input.required = true;
                    cell.appendChild(input);
                }

                
            }


        });
        
    });
</script>

@endsection