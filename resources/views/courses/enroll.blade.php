@extends('layouts.main')

@section('content')
    <!-- Facilities Start -->
    <div class="container-fluid pt-5" dir="rtl">
        <div class="container">
            <h3 class="text-lg text-right leading-6 font-medium text-gray-900 mb-2">
                قم بإرفاق صورة إثبات الدفع
            </h3>
            <hr>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-md mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-right">قم بإختيار الصورة</h3>
                                    
                                    <form action="{{ route('course_join_post', Request()->id) }}" method="POST"
                                        enctype="multipart/form-data" class="row">
                                        @csrf <!-- Ensure CSRF token is included if you're using Laravel -->

                                        <div class="mb-4 row col-12 text-right">
                                            <label for="paymentReceipt" class="block text-sm font-medium text-gray-700 col-12">قم برفع صورة واضحة لتجنب عدم التفعيل</label>
                                            <input type="file" id="paymentReceipt" name="img" accept="image/*"
                                                class="mt-1 col-12 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                                required>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <button type="submit"
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-success hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                إرســـال
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection