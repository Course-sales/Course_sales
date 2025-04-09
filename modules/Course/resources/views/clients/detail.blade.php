@extends('layouts.client')
@section('content')
@include('parts.clients.sub_header')
<section class="course-detal">
    <div class="container">
        <div class="row relative">
            <div class="col-12 col-lg-9">
                <div class="submenu">
                    <ul>
                        <li>
                            <a href="#information">
                                <i class="fa-solid fa-file"></i> General information
                            </a>
                        </li>
                        <li>
                            <a href="#curriculum">
                                <i class="fa-solid fa-book"></i>
                                Curriculum
                            </a>
                        </li>
                        <li>
                            <a href="#author">
                                <i class="fa-solid fa-user"></i>
                                Teacher
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="course-descreption" id="information">
                    <div class="course-content">
                      {!! $course->detail !!}
                    </div>
                </div>
                <div class="accordion" id="curriculum">
                    <div class="accordion-top px-3">
                        <p>
                            <i class="fa-solid fa-book me-1"></i>
                            Includes: {{getLessonCount($course)->modules}} parts / {{getLessonCount($course)->lessons}} lessons
                        </p>
                        <p>
                            <i class="fa-solid fa-clock me-1"></i>
                            Durations {{getHourDuration($course->durations)}}
                        </p>
                    </div>
                    @include('Course::clients.modules_lessons')
                </div>
                <div class="course-video mb-4" id="author">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{$course->teacher->image}}" alt="" class="rounded-circle" style="width: 80px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p>Teacher</p>
                            <h4 class="mt-2"><a href="/giang-vien/{{$course->teacher->slug}}">{{$course->teacher->name}}</a></h4>
                        </div>
                    </div>

                    <p class="course-content-infor mt-3">
                        {!! $course->teacher->description !!}
                    </p>

                </div>
            </div>
            <div class="col-12 col-lg-3 mb-4">
                <div class="course-profile">
                    <div class="img">
                        <img src="{{$course->thumbnail}}" alt="" />
                    </div>
                    <div class="group-text">
                        <p class="price">
                            <i class="fa-solid fa-tag"></i>
                            @if($course->sale_price > 0)
                                <span class="sale">{{money($course->price)}}</span>
                                <span>{{money($course->sale_price)}}</span>
                            @else
                                <span>{{money($course->price)}}</span>
                            @endif
                        </p>
                        <p class="code">
                            <i class="fa-solid fa-bookmark"></i>
                            Code: {{$course->code}}
                        </p>
                        <p class="level">
                            <i class="fa-solid fa-chart-simple"></i>
                            Level: practical level
                        </p>
                        <p class="techer">
                            <i class="fa-solid fa-user"></i>
                            Teacher: {{$course->teacher->name}} 
                        </p>
                        <p class="exp">
                            <i class="fa-solid fa-arrow-up-right-dots"></i>
                            {{$course->teacher->exp}} years experience
                        </p>
                        <p class="clock">
                            <i class="fa-solid fa-clock"></i>
                            Durations: {{getHourDuration($course->durations)}}
                        </p>
                        <p class="support">
                            <i class="fa-solid fa-headset"></i>
                            Supports: {{$course->supports}} 
                        </p>
                        <p class="document">
                            <i class="fa-solid fa-headset"></i>
                            Document: {{$course->is_document == 1 ? 'Yes' : 'No'}} 
                        </p>
                        @if($myCourse)
                            <button class="payment" style="background: red">Start course</button>
                        @elseif($course->price > 0)
                            <button class="payment">Buy course </button>
                        @else
                            <button class="payment">Coming soon</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        var isTrialHTML = document.querySelectorAll('.is_trial');
        var modalHTML = document.querySelector('#modal');
        var EnterCourse = @json($myCourse->lessons[1]->slug ?? null);
        var addItemBtn = document.querySelector('.course-detal .payment');
        if(addItemBtn) {
            if(EnterCourse) {
                addItemBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    window.location.href = `/bai-hoc/` + EnterCourse;
                });
            }else{
                addItemBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    var coursePrice = "{{$course->price}}";
                    if(studentId) {
                        if(coursePrice > 1) {
                            var courseId = "{{$course->id}}";
                            addToCart(courseId);
                        }else{
                            alert('Khóa học chưa ra mắt!');
                        }
                    }else{
                        alert('Vui lòng đăng nhập!');
                    }
                }); 
            }
 
        }

        
        isTrialHTML.forEach((element) => {
            element.addEventListener('click', (e) => {
                var trialText = e.target.innerText;
                var lessonId = e.target.dataset.id;

                var url = "{{ route('client.course.trialLesson', ['lessonId' => ':lessonId']) }}".replace(':lessonId', lessonId);
                
                var modal = new bootstrap.Modal(document.querySelector('#modal'));
                e.target.innerText = 'Loading ...';
                fetch(url).then((response) => response.json()).then((data) => {
                    if(data.status == 1) {
                        modalHTML.querySelector('.modal-title').innerText = data.lesson.name;
                        modalHTML.querySelector('.modal-body').innerHTML = `<video src="${data.lesson.video.url}" width="100%" height="350" type="video/mp4" controls></video>`;
                        modal.show();
                    }else{
                        console.error("Lỗi: Bài học không tồn tại hoặc không thể tải dữ liệu.");
                    }
                }).finally(() => {
                    e.target.innerText = trialText;
                });
                
            });

            
        });
        modalHTML.addEventListener('hidden.bs.modal', (e) => {
            modalHTML.querySelector('.modal-title').innerText = '';
            modalHTML.querySelector('.modal-body').innerHTML = '';
        });
        

        const addToCart = async (courseId) => {
            var response = await fetch(`/them-vao-gio-hang`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN" : token,
                    "Content-Type" : "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({'courseId' : courseId}),
            });
            var data = await response.json();
            if(data.status === 1) {
                cartQuantityElement.innerText = data.cartQty;
                Swal.fire({
                    title: data.message,
                    text: "",
                    icon: data.type,
                    confirmButtonColor: "#ffd600",
                    cancelButtonColor: "#ce6747",
                    confirmButtonText: "View cart",
                    cancelButtonText: "OK", // Thêm nút Hủy
                    showCancelButton: true, // Hiển thị nút Hủy
                }).then((result) => {
                    if(result.isConfirmed) {
                        window.location.href = '{{ route('client.cart') }}';
                    }
                });
            }else{
                alert(data.message);
            }
        }

    });
</script>
@endsection