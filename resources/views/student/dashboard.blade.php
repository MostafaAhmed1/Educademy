@extends('layouts.main')

@section('content')
    <!-- Facilities Start -->
    <div class="container-fluid pt-5" dir="rtl">
        <div class="container">
            <h3 class="text-lg text-right leading-6 font-medium text-gray-900 mb-2">
                المواد والكورسات المسجلة
            </h3>
            <hr>

            <div class="container-fluid pt-5">
                <div class="container pb-3">
                    <div class="row">

                        @foreach ($courses as $course)
                            <div class="col-md-4 mb-4">
                                <div class="card p-1">
                                    <a href="{{ route('playlist', $course->id) }}">
                                        <img class="card-img-top" src="{{ url("$course->pic") }}" alt=""
                                            style="width:100%; height:250px">
                                        <div class="card-body">
                                            <h6 class="card-title text-center">
                                                {{ $course->categoryname }}
                                            </h6>
                                            <h5 class="card-title text-center">
                                                {{ $course->coursename }}
                                            </h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <hr>
            <h3 class="text-lg text-right leading-6 font-medium text-gray-900 mb-2">
                مواد وكورسات اخرى
            </h3>

            <!-- Available Courses Section -->
            <div class="container-fluid pt-5">
                <div class="container pb-3">
                    <div class="row">

                        @foreach ($other as $course)
                            <div class="col-md-4 mb-4">
                                <div class="card p-1">
                                    <img class="card-img-top" src="{{ url("$course->pic") }}" alt=""
                                        style="width:100%; height:250px">
                                    <div class="card-body text-center">
                                        <h6 class="card-title">
                                            {{ $course->categoryname }}
                                        </h6>
                                        <h4 class="card-title">
                                            {{ $course->coursename }}
                                        </h4>
                                        <h4><b>السعر: {{ $course->courseprice }} جنيه </b>
                                        </h4>
                                        <a href="{{route("course_join",$course->id)}}" class="btn btn-primary mt-3">حجز الآن</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
