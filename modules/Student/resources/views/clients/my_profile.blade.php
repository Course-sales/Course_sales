@extends('layouts.client')
@section('content')
@include('parts.clients.sub_header')
<section class="all-course py-2">
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('Student::clients.menu')
            </div>
            <div class="col-9 account-page">
                <h2 class="py-2">Information</h2>
                <button class="btn btn-warning my-3 profile-btn">Update</button>
                <div class="profile-table profile-item active">
                    <table class="table table-bordered ">
                        <tr>
                            <td width="25%">Name</td>
                            <td>
                                {{$student->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                {{$student->email}}
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                {{$student->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                {{$student->address ?? "Chưa cập nhật"}}
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                Active
                            </td>
                        </tr>
                        <tr>
                            <td>Created time</td>
                            <td>
                                {{Carbon\Carbon::parse($student->created_at)->format('d/m/Y H:i:s')}}
                            </td>
                        </tr>
                        <tr>
                            <td>Activation time</td>
                            <td>
                                {{Carbon\Carbon::parse($student->email_verified_at)->format('d/m/Y H:i:s')}}
                            </td>
                        </tr>
                    </table>
                </div>
                <form action="" class="profile-table profile-item" method="POST">
                    <table class="table table-bordered">
                        <tr>
                            <td width="25%">Name</td>
                            <td>
                                <input type="text" name="name" class="form-control" placeholder="Enter name..." value="{{$student->name}}">
                                <span class="error error-name text-danger"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email..." value="{{$student->email}}">
                                <span class="error error-email text-danger"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone..." value="{{$student->phone}}">
                                <span class="error error-phone text-danger"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address..." value="{{$student->address}}">
                                <span class="error error-address text-danger"></span>
                            </td>
                        </tr>
                    </table>
                    <button class="btn-update btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        var profileBtn = document.querySelector('.profile-btn');
        if(profileBtn) {
            var status = "table";
            var renderBtn = () => {
                profileBtn.innerText = status === "table" ? "Update" : "Hủy";
                status === "form" ? profileBtn.classList.replace("btn-warning", "btn-danger") : profileBtn.classList.replace("btn-danger", "btn-warning");
            }
            var renderTableForm = () => {
                var profileList = document.querySelectorAll('.profile-table');
                var indexActive = null;
                profileList.forEach((profile, index) => {
                    if(profile.classList.contains("active")) {
                        indexActive = index;
                    }
                });
                profileList[indexActive].classList.remove("active");
                indexActive === 0 ? profileList[1].classList.add("active") : profileList[0].classList.add("active");
            }
            profileBtn.addEventListener('click', (e) => {
                e.preventDefault();
                status = status === "table" ? "form" : "table";
                renderBtn();
                renderTableForm();
            });
        }

        var profileForm = document.querySelector("form.profile-table")
        if(profileForm) {
            var saveButton = document.querySelector('.btn-update');
            var initialTextBtn = saveButton.innerText;
            profileForm.addEventListener("submit", (e) => {
                e.preventDefault();
                var formData = Object.fromEntries(new FormData(e.target));
                var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                updateProfile(formData, csrfToken);
            });
            const showFormErrors = (errors = null) => {
                var errorList = profileForm.querySelectorAll(".error");
                errorList.forEach((error) => {
                    error.innerText = "";
                });
                Object.keys(errors).forEach((key) => {
                    var errorElement = profileForm.querySelector(`.error-${key}`);
                    errorElement.innerText = errors[key][0];
                })
            }
            const updateProfile = async (formData, token) => {
                saveButton.innerText = "Đang xử lý..";
                saveButton.disable = true;
                var response = await fetch(`/tai-khoan/thong-tin-ca-nhan`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN" : token,
                        "Content-Type" : "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify(formData),
                });
                var {errors, success} = await response.json();
                saveButton.innerText = initialTextBtn;
                saveButton.disable = false;

                if(errors) {
                    showFormErrors(errors);
                }else{
                    Swal.fire({
                        title: "Update successfully!",
                        text: '',
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });                    
                }
            }
        }
    });
</script>
<style>
    .account-page {
        .profile-item {
            display: none;
            &.active {
                display: block;
            }
        }
    }
</style>
@endsection