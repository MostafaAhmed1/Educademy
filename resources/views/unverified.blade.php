<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>logeen acadimy | اكاديمية لوجين</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{ url('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <!-- moving img-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .moving-image {
            position: relative;
            width: 100%;
            height: 100%;
            animation: move 5s ease-in-out infinite;
        }

        .moving-image img {
            width: 100%;
            height: auto;
        }

        @keyframes move {
            0% {
                transform: translateX(10%);
            }

            50% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(10%);
            }
        }
    </style>

</head>

<body>

    @include('layouts.navbar')
    
    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ url('assets/img/about-1.jpg') }}" alt="">
                </div>
                <div class="col-lg-7 align-self-center text-right">
                    <p class="section-title pr-5"><span class="pr-2">جارى مراجعة حسابك</span></p>
                    <h1 class="mb-4">يرجى الانتظار...</h1>
                    <p>
                        لم يتم تفعيل حسابك حتى الان <br>
                        يرجى الانتظار حتى تفعيل الحساب <br>
                        فى اغلب الاحيان لا تستغرق هذه العملية اكثر من 24 ساعة <br>
                        إذا واجهت هذه المشكلة لفتره طويلة يرجى التواصل مع الدعم الفنى.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="{{ url('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ url('assets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ url('assets/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>

</html>
