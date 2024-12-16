@extends('layouts.main')

@section('css')
    <style>
        .zform-container {
            max-width: 600px;
            margin: 25px auto;
            padding: 10px;
            border: 1px solid #0056b3;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

    </style>
@endsection

@section('content')
    <div class="zform-container text-right">

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
        <form class="form row px-3" method="POST" action="{{ route('register') }}" dir="rtl">
            @csrf

            <div class="form-group col-12">
                <h2>إنشاء حساب جديد</h2>
            </div>

            <div class="form-group col-12">
                <label for="name">اسم المستخدم</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="phone">الهاتف</label>
                <input type="phone" id="phone" name="phone">
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="new-password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <input type="text" name="type" value="student" hidden>
            <button class="btn btn-primary col-12 my-3" type="submit">إنشاء الحساب</button>
        </form>
        <div dir="rtl">
            <h4>هل لديك حساب بالفعل ؟ <a class="btn-link" href="{{ route('login') }}">تسجيل الدخول</a></h4>
        </div>
    </div>
@endsection
