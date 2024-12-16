    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="{{ route('home') }}" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <span class="text-primary">Logeen</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">الرئيسية</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">من نحن </a>
                    <a href="{{ route('class') }}" class="nav-item nav-link">المواد الدراسية</a>
                    <a href="{{ route('team') }}" class="nav-item nav-link">المعلمين</a>
                    <a href="{{ route('gallery') }}" class="nav-item nav-link">المعرض</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">تواصل معنا </a>

                    <div class="navbar-nav">
                        @auth
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">حسابى</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">لوحة التحكم</a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" role="button" aria-expanded="false"
                                            onclick="event.preventDefault(); this.closest('form').submit();">

                                            تسجيل خروج
                                        </a>
                                    </form>

                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="login-container nav-item nav-link">تسجيل الدخول</a>
                            <a href="{{ route('register') }}" class="form-container nav-item nav-link">حساب جديد</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar End -->
