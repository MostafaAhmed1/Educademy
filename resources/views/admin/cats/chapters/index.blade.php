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
                    data-bs-target="#modal-chapters">
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
                    <h3 class="card-title">الأبواب / الفصول</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1">#</th>
                                <th>الباب / الفصل</th>
                                <th>اســم المادة</th>
                                <th>المرحلة التعليمية</th>
                                <th>العام الدراسى</th>
                                <th class="w-1">الاجراء</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($chaps as $chp)
                                <tr>
                                    <td class="text-muted">{{ $chp->chapterid }}</td>
                                    <td>{{ $chp->chaptername }}</td>
                                    <td>{{ $chp->coursename }}</td>
                                    <td>{{ $chp->categoryname }}</td>
                                    <td>{{ $chp->courseyear }}</td>
                                    <td class="d-flex">
                                        <button class="btn btn-link mx-1 p-0" data-bs-toggle="modal"
                                            data-bs-target="#modal-chapters-{{ $chp->chapterid }}">
                                            <i class="ti ti-pencil fs-1"></i>
                                        </button>
                                        <button class="btn btn-link mx-1 p-0" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{ $chp->chapterid }}">
                                            <i class="ti ti-trash fs-1 text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">عدد البيانات <span>{{ count($chaps) }}</span> بيان</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-chapters" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تسجيل مرحلة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('chapters_add') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">اسم الكورس</label>
                            <select type="text" class="form-select select2" id="select-course" value=""
                                name="courseid">
                                @foreach ($courses as $crs)
                                    <option value="{{ $crs->courseid }}">{{ $crs->coursename }} -
                                        {{ $crs->categoryname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">اسم الباب / الفصل</label>
                            <input type="text" class="form-control" name="name" placeholder="اسم الباب / الفصل">
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

    @foreach ($chaps as $chp)

        <div class="modal modal-blur fade" id="modal-chapters-{{ $chp->chapterid }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تسجيل مرحلة جديدة</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('chapters_edit', $chp->chapterid) }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">اسم الكورس</label>
                                <select type="text" class="form-select select2" id="select-course" value=""
                                    name="courseid">
                                    @foreach ($courses as $crs)
                                        @if ($crs->courseid == $chp->course_id)
                                            selected
                                        @endif
                                        <option value="{{ $crs->courseid }}">{{ $crs->coursename }} -
                                            {{ $crs->categoryname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">اسم الباب / الفصل</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="اسم الباب / الفصل" value="{{ $chp->chaptername }}">
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

        <div class="modal modal-blur fade" id="modal-delete-{{ $chp->chapterid }}" tabindex="-1" role="dialog"
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
                                    <form action="{{ route('chapters_delete', $chp->chapterid) }}" method="POST">
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
