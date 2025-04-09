@extends('layouts.backend')
@section('content')

<div class="row">
    <div class="col">
        <p><a href="{{route('admin.students.index')}}" class="btn btn-success btn-sm cus_success_btn">List of students</a></p>
    </div>
    <div class="col d-flex justify-content-end">
        <p><a href="" class="btn btn-danger btn-sm cus_danger_btn"><i class="fa fa-trash"></i>(0)</a></p>
    </div>
</div>
<form action="" method="post">
    @csrf
    <table class="table table-bordered text-center" id="table_student">
        <thead> 
            <tr>
                <th style="width: 3%"></th>
                <th>Status</th>
                <th>Information</th>
                <th>Account</th>
                <th style="width: 25%">Address</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-sm cus_primary_btn">Save</button>
        </div>
        <div class="col d-flex justify-content-end">
            <input type="button" class="btn btn-warning btn-sm cus_warning_btn" id="add-student" value="Add more">
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#add-student').addEventListener('click', function() {
        var table = document.querySelector('#table_student');
        var rowCount = table.rows.length;
        var currentRow = table.insertRow(rowCount);
        var colIndex = 0;

        for (var index = 0; index < 5; index++) {
            var cell = currentRow.insertCell();

            if (index == 0) {
                var input = document.createElement('input');
                input.name = 'cell_' + rowCount + '_col_' + colIndex;
                input.id = 'cell_' + rowCount + '_col_' + colIndex;
                input.type = 'checkbox';
                cell.appendChild(input);
                colIndex++;
            } else if (index == 1) {
                var select = document.createElement('select');
                select.name = 'cell_' + rowCount + '_col_' + colIndex;
                select.required = true;
                var optionArray = ['Not activated', 'Activated'];
                for (var i = 0; i < optionArray.length; i++) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.text = optionArray[i];
                    select.appendChild(option);
                }
                cell.appendChild(select);
                colIndex++;
            } else if (index == 2 || index == 3) {
                var lableText = (index == 2) ? ['Fullname', 'Phone'] : ['Email', 'password'];
                for (var i = 0; i < 2; i++) {
                    var input = document.createElement('input');
                    var label = document.createElement('label');

                    label.textContent = lableText[i];
                    label.htmlFor = 'cell_' + rowCount + '_col_' + colIndex;
                    label.classList.add('form-label'); // Thêm lớp CSS cho label
                    input.name = 'cell_' + rowCount + '_col_' + colIndex;
                    input.id = 'cell_' + rowCount + '_col_' + colIndex;
                    input.type = 'text';
                    input.classList.add('form-input'); // Thêm lớp CSS cho input
                    input.required = true;

                    cell.appendChild(label);
                    cell.appendChild(input);
                    colIndex++;
                }
            } else {
                var textarea = document.createElement('textarea');
                textarea.name = 'cell_' + rowCount + '_col_' + colIndex;
                textarea.id = 'cell_' + rowCount + '_col_' + colIndex;
                textarea.classList.add('form-textarea');
                cell.appendChild(textarea);
                colIndex++;
            }
        }
    });
});
</script>
<style>
.form-label {
    display: block; /* Đảm bảo label hiển thị dưới dạng khối */
    margin-bottom: 5px; /* Khoảng cách giữa label và input */
}

.form-input {
    display: block; /* Đảm bảo input nằm trên dòng riêng biệt */
    width: 100%; /* Tùy chỉnh chiều rộng theo ý muốn */
    padding: 2px; /* Tùy chỉnh khoảng cách bên trong */
    margin-bottom: 15px; /* Khoảng cách dưới để tạo không gian */
}
.form-textarea {
    display: block;
    width: 100%; /* Điều chỉnh chiều rộng theo yêu cầu */
    padding: 20px; /* Tùy chỉnh khoảng cách bên trong */
    margin-bottom: 15px; /* Khoảng cách dưới để tạo không gian */
    height: 130px; /* Điều chỉnh chiều cao theo yêu cầu */
    resize: vertical; /* Cho phép thay đổi kích thước theo chiều dọc */
}
</style>
@endsection