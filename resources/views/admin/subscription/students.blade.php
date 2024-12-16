@extends('admin.layouts.mainlayout')

@section('content')
    <div class="row g-2 align-items-center mt-3">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                لوحة التحكم
            </div>
            <h2 class="page-title">
                الاشتراكات
            </h2>
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
                    <h3 class="card-title">الطلبة المشتركين</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>تاريخ الاشتراك</th>
                                <th>اســم الطالب</th>
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
    
@endsection