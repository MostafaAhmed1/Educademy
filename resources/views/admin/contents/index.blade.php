@extends('admin.layouts.mainlayout')

@section('content')
    <div class="row g-2 align-items-center mt-3">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                لوحة التحكم
            </div>
            <h2 class="page-title">
                المحتوى
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
                        <div class="mb-3 col-12">
                            <label class="form-label">اختر الباب الذي تنتمي إليه هذه المحاضرة</label>
                            <select type="text" class="form-select" id="select-course" value="" name="category_id">
                                @foreach ($course as $grd)
                                    <option value="{{ $grd->chapter_id }}">
                                        {{ $grd->categoryname . ' - ' . $grd->coursename . ' - ' . $grd->chaptername }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-12">
                            <label class="form-label">عنوان المحاضرة</label>
                            <input type="text" class="form-control" name="name" placeholder="عنوان المحاضرة">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">اخــتر الملف</label>
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

@endsection