@extends('layouts.main')

@section('css')
    <style>
        .zform-container {
            max-width: 400px;
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

        <div class="col-12">
            <h2>تسجيل االدخول</h2>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">البريد الإلكتروني</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">كلمة المرور</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-success ms-auto" data-bs-dismiss="modal">
                تسجيل دخــول
            </button>

        </form>

    </div>
@endsection
