@extends('layouts.main')

@section('content')

<!-- Facilities Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">المواد الدراسية</span></p>
            <h1 class="mb-4">الكورسات المتاحة</h1>
        </div>
        <div class="container-fluid pt-5">
            <div class="container pb-3">
                <div class="row">
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                            <a href="geography.html">
                            <img src="img/geography.jpg" class="img-fluid" alt="جغرافيا" style="width: 50px; height: 50px;">
                            <div class="pl-4">
                                <h4>الجغرافيا</h4>
                                <p class="m-0">وصف المادة الجغرافيا...</p>
                                <p class="m-0">السعر: 200 جنيه</p>
                                <p class="m-0">السنوات الدراسية: المرحلة الثانوية</p>
                                <a href="booking.html" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                            <a href="physics.html">
                            <img src="img/physics.jpg" class="img-fluid" alt="فيزياء" style="width: 50px; height: 50px;">
                            <div class="pl-4">
                                <h4>الفيزياء</h4>
                                <p class="m-0">وصف المادة الفيزياء...</p>
                                <p class="m-0">السعر: 250 جنيه</p>
                                <p class="m-0">السنوات الدراسية: المرحلة الثانوية</p>
                                <a href="booking.html" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                            <a href="science.html">
                            <img src="img/science.jpg" class="img-fluid" alt="علوم" style="width: 50px; height: 50px;">
                            <div class="pl-4">
                                <h4>العلوم</h4>
                                <p class="m-0">وصف المادة العلوم...</p>
                                <p class="m-0">السعر: 150 جنيه</p>
                                <p class="m-0">السنوات الدراسية: المرحلة الإعدادية</p>
                                <a href="booking.html" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                            <a href="math.html">
                            <img src="img/math.jpg" class="img-fluid" alt="رياضيات" style="width: 50px; height: 50px;">
                            <div class="pl-4">
                                <h4>الرياضيات</h4>
                                <p class="m-0">وصف المادة الرياضيات...</p>
                                <p class="m-0">السعر: 180 جنيه</p>
                                <p class="m-0">السنوات الدراسية: المرحلة الثانوية</p>
                                <a href="booking.html" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                            <a href="chemistry.html">
                            <img src="img/chemistry.jpg" class="img-fluid" alt="كيمياء" style="width: 50px; height: 50px;">
                            <div class="pl-4">
                                <h4>الكيمياء</h4>
                                <p class="m-0">وصف المادة الكيمياء...</p>
                                <p class="m-0">السعر: 220 جنيه</p>
                                <p class="m-0">السنوات الدراسية: المرحلة الثانوية</p>
                                <a href="booking.html" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                            <a href="arabic.html">
                            <img src="img/arabic.jpg" class="img-fluid" alt="لغة عربية" style="width: 50px; height: 50px;">
                            <div class="pl-4">
                                <h4>اللغة العربية</h4>` 
                                <p class="m-0">وصف المادة اللغة العربية...</p>
                                <p class="m-0">السعر: 200 جنيه</p>
                                <p class="m-0">السنوات الدراسية: المرحلة الابتدائية</p>
                                <a href="booking.html" class="btn btn-primary mt-3">حجز الآن</a>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facilities End -->

@endsection