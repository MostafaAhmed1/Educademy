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
                    <h3 class="card-title">طلبات الاشتراك</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>التاريخ</th>
                                <th>اســم الطالب</th>
                                <th>اســم الكورس</th>
                                <th>الســعر</th>
                                <th>بيان الدفع</th>
                                <th class="w-1">الحالة</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $crs)
                                <tr>
                                    <td class="text-muted">{{ $crs->pay_id }}</td>
                                    <td>{{ $crs->created_at }}</td>
                                    <td>{{ $crs->name }}</td>
                                    <td>{{ $crs->coursename }}</td>
                                    <td>{{ $crs->courseprice }}</td>
                                    <td>
                                        @if ($crs->pic != null)
                                                                
                                        <div class="col-6">
                                            <a data-fslightbox="gallery" href="{{ url($crs->pic) }}">
                                            <!-- Photo -->
                                            <div class="img-responsive img-responsive-1x1 rounded-3 border"
                                            style="background-image: url({{ url($crs->pic) }})"></div>
                                            </a>
                                        </div>

                                        @endif
                                    </td>
                                    <td>
                                        @if ($crs->accept)
                                            <p class="text-success mt-3">
                                                تم التفعيل
                                            </p>
                                        @else
                                        <form action="{{ route("approve_payment", $crs->pay_id) }}" method="post">
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

@section('js')

    <!-- Libs JS -->
    <script src="{{ url('/assets/libs/fslightbox/index.js') }}" defer></script>
@endsection