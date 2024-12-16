@extends('layouts.main')

@section('content')

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-right">
                <div class="p-6 bg-white border-b border-gray-200 my-4 mx-2">
                    <!-- Course Display Card -->
                    <div class="card rounded-lg shadow-lg">
                        <div class="row m-2">
                            <img class="col-12 col-lg-6 border-b rounded-lg" src="{{ url($course->pic) }} "alt="" >
                            <div class="col-12 col-lg-6">
                                <h1 class="card-title text-primary my-2">{{$course->coursename}}</h1>
                                <h4 class="card-text">{{$course->cat_name}} - {{$course->courseyear}} </h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>{{$course->courseprice}}</td>
                                            <th scope="row">السعر</th>
                                        </tr>
                                        <tr>
                                            <td>{{$course->courseyear}}</td>
                                            <th scope="row">السنة</th>
                                        </tr>
                                        <tr>
                                            <td>{{$course->cat_name}}</td>
                                            <th scope="row">المرحلة</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{route("course_join",$course->id)}}" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection