@extends('layouts.main')

@section('css')
<style>
    video::-internal-media-controls-download-button {
     display:none;
    }
 
    video::-webkit-media-controls-enclosure {
         overflow:hidden;
    }
 
    video::-webkit-media-controls-panel {
         width: calc(100% + 30px); 
    }
 </style>
@endsection

@section('content')
    <div class="page-wrapper mt-5 text-right" dir="rtl">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Account Settings
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-3 d-none d-md-block border-end">
                            <div class="card-body">
                                <h4 class="subheader">Business settings</h4>
                                <div class="list-group list-group-transparent">
                                    <a href="./settings.html"
                                        class="list-group-item list-group-item-action d-flex align-items-center active">My
                                        Account</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex align-items-center">My
                                        Notifications</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex align-items-center">Connected
                                        Apps</a>
                                    <a href="./settings-plan.html"
                                        class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex align-items-center">Billing &
                                        Invoices</a>
                                </div>
                                <h4 class="subheader mt-4">Experience</h4>
                                <div class="list-group list-group-transparent">
                                    <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-9 d-flex flex-column">

                            <div class="card-body">
                                <h2 class="mb-4">My Account</h2>
                                <h3 class="card-title">Profile Details</h3>
                                <div>
                                    <video preload="metadata" contenteditable="false" controlsList="nodownload" controls 
                                    oncontextmenu="return false;"
                                    width="100%" poster="{{ url('/uploaded/courses/1717365469.jpg') }}">
                                        <source src="{{ url('/uploaded/v1.mp4') }}" type="video/mp4">
                                            المتصفح الخاص بك لا يدعم تشغيل هذا النوع من ملفات الفيديو
                                    </video>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
