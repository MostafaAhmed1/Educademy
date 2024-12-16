@extends('admin.layouts.mainlayout')

@section('content')
    <div class="row g-2 align-items-center mt-3">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                لوحة التحكم
            </div>
            <h2 class="page-title">
                المواد التعليمية
            </h2>
        </div>
        <!-- table title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                    data-bs-target="#modal-courses">
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
                    <h3 class="card-title">المواد والكورسات</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>اســم المادة</th>
                                <th>الســعـر</th>
                                <th>العام الدراسى</th>
                                <th>المرحلة</th>
                                <th>الصورة</th>
                                <th class="w-1">الاجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($courses as $crs)
                                <tr>
                                    <td class="text-muted">{{ $crs->courseid }}</td>
                                    <td>{{ $crs->coursename }}</td>
                                    <td>{{ $crs->courseprice }}</td>
                                    <td>{{ $crs->courseyear }}</td>
                                    <td>{{ $crs->categoryname }}</td>
                                    <td>
                                        @if ($crs->pic != null)
                                            <img src="{{ url($crs->pic) }}" alt="" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-link m-0 p-0" data-bs-toggle="modal"
                                            data-bs-target="#modal-courses-{{ $crs->courseid }}">
                                            <i class="ti ti-pencil fs-1"></i>
                                        </button>
                                        <button class="btn btn-link mx-1 p-0" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{ $crs->courseid }}">
                                            <i class="ti ti-trash fs-1 text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">عدد البيانات <span>{{ count($courses) }}</span> بيان</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-courses" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تسجيل كورس / مادة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <form class="row" action="{{ route('courses_add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-6">
                            <label class="form-label">المرحلة الدراسية</label>
                            <select type="text" class="form-select" id="select-course" value="" name="category_id">
                                @foreach ($grades as $grd)
                                    <option value="{{ $grd->id }}">{{ $grd->categoryname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">اسم الكورس</label>
                            <input type="text" class="form-control" name="name" placeholder="اسم الكورس">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">العام الدراسي</label>
                            <input type="text" class="form-control" name="year" placeholder="العام الدراسي">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">سعر الكورس</label>
                            <input type="number" class="form-control" name="price" placeholder="سعر الكورس">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">اخــتر صورة</label>
                            <input type="file" class="form-control" name="img">
                        </div>

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

    @foreach ($courses as $crs)

        <div class="modal modal-blur fade" id="modal-courses-{{ $crs->courseid }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تسجيل كورس / مادة جديدة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" action="{{ route('courses_edit', $crs->courseid) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 col-6">
                                <label class="form-label">المرحلة الدراسية</label>
                                <select type="text" class="form-select" id="select-course" value=""
                                    name="category_id">
                                    @foreach ($grades as $grd)
                                        <option value="{{ $grd->id }}"
                                            @if($crs->category_id == $grd->id)
                                                selected
                                            @endif
                                            >{{ $grd->categoryname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label">اسم الكورس</label>
                                <input type="text" class="form-control" name="name" placeholder="اسم الكورس"
                                    value="{{ $crs->coursename }}">
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label">العام الدراسي</label>
                                <input type="text" class="form-control" name="year" placeholder="العام الدراسي"
                                    value="{{ $crs->courseyear }}">
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label">سعر الكورس</label>
                                <input type="number" class="form-control" name="price" placeholder="سعر الكورس"
                                    value="{{ $crs->courseprice }}">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">اخــتر صورة</label>
                                <input type="file" class="form-control" name="img">
                            </div>
    
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

        <div class="modal modal-blur fade" id="modal-delete-{{ $crs->courseid }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">

                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                            <path d="M12 9v4" />
                            <path d="M12 17h.01" />
                        </svg>
                        <h3>هل انت متأكد?</h3>
                        <div class="text-muted">انت الان ستقوم بحذف البيانات المحددة والبيانات التابعه لها بشكل نهائى ولا
                            يمكن إسترجاعها لاحقاً.</div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        إلغـــاء
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('courses_delete', $crs->courseid) }}" method="POST">
                                        @csrf
                                        <input type="hidden"name="_method" value="delete">
                                        <input type="hidden" name="del" value="">
                                        <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                            حــــذف
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
