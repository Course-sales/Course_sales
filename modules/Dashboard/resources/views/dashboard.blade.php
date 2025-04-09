@extends('layouts.backend')
@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{money($totalProfit)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Number of students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$studentCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of Teacher
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$teacherCount}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Number of Courses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$courseCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                @foreach ($courses as $course)
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-primary">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">{{$course->name}}</h6>
                
                                    <!-- Thêm d-flex để căn chỉnh "Sold" và "Views" sang góc phải -->
                                    <div class="d-flex align-items-center ml-auto">
                                        <div class="d-flex align-items-center mr-4">
                                            <i class="fas fa-shopping-cart text-success mr-2"></i>
                                            <span class="font-weight-bold">Sold: {{$course->students_count}}</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-eye text-info mr-2"></i>
                                            <span class="font-weight-bold">Views: {{$course->view}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <!-- End Card Body -->
            </div>
        </div>
<style>
    .card {
    overflow: hidden; /* Ngăn tràn nội dung */
    word-wrap: break-word; /* Chia dòng khi nội dung quá dài */
        }

        .chart-area {
            max-width: 100%; /* Đảm bảo nội dung không vượt quá chiều rộng */
            overflow: auto; /* Thêm thanh cuộn nếu cần */
        }
        

</style>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Notification</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2 text-center">
                        There are no notification yet.
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection