@extends('admin.layouts.mainlayout')

@section('content')
    <div class="row g-2 align-items-center mt-3">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                لوحة التحكم
            </div>
            <h2 class="page-title">
                الادارة
            </h2>
        </div>
        <!-- table title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                    data-bs-target="#modal-admins">
                    إضــافة
                    <i class="ti ti-plus ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-5">

        <div class="col-12 mt-3">

            @if (session('status'))
                <h4 class="alert alert-success">{{ session('status') }}</h4>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">حسابات الادارة</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>تاريخ الانشاء</th>
                                <th>الاســـــم</th>
                                <th>الايميل</th>
                                <th>رقــم الهاتف</th>
                                <th>حالة الحساب</th>
                                <th class="w-1">الاجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $crs)
                                <tr>
                                    <td class="text-muted">{{ $crs->id }}</td>
                                    <td>{{ $crs->created_at }}</td>
                                    <td>{{ $crs->name }}</td>
                                    <td>{{ $crs->email }}</td>
                                    <td>{{ $crs->phonenumber }}</td>
                                    <td>
                                        @if ($crs->verified)
                                            <p class="text-success mt-3">
                                                نشط
                                            </p>
                                        @else
                                            <p class="text-secondary mt-3">
                                                غير نشط
                                            </p>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if ($crs->verified)
                                            <form action="{{ route("student.enable", ['v' => 0, 'id' => $crs->id]) }}" method="post">
                                                @csrf

                                                <button type="submit" class="btn btn-primary mt-3">
                                                    إلغاء التفعيل
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route("student.enable", ['v' => 1, 'id' => $crs->id]) }}" method="post">
                                                @csrf
                                                
                                                <button type="submit" class="btn btn-primary mt-3">
                                                    تفعيل
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">عدد البيانات <span>{{ count($data) }}</span> بيان</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal modal-blur fade" id="modal-admins" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تسجيل مرحلة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" method="POST" action="{{ route('create_new_user') }}">
                        @csrf

                        <div class="mb-3 col-12">
                            <label class="form-label" for="name">اسم المستخدم</label>
                            <input class="form-control" type="text" id="name" name="name" required>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="email">البريد الإلكتروني</label>
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="phone">الهاتف</label>
                            <input class="form-control" type="phone" id="phone" name="phone">
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="password">كلمة المرور</label>
                            <input class="form-control" type="password" id="password" name="password" required>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="new-password_confirmation">تأكيد كلمة المرور</label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        
                        <input type="text" name="type" value="admin" hidden>

                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary link-white" data-bs-dismiss="modal">
                                إلغـــاء
                            </a>
                            <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                                حفظ
                                <i class="ti ti-device-floppy ms-2 fs-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection