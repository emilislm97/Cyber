<!doctype html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>AzTU-Cyber | Admin Panel</title>

    <meta name="description" content="Penalti.az">
    <meta name="author" content="Elvin Tacirzade">

    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/main.min.css')}}">
</head>
<body>
<!-- Page Container -->

<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('{{asset('assets/media/photos/photo19@2x.jpg')}}');">
            <div class="hero bg-white-95">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="px-3 py-5 text-center">
                            <div class="row invisible" data-toggle="appear">
                                <div class="col-sm-6 text-center text-sm-right">
                                    <div class="display-1 text-danger font-w700">404</div>
                                </div>
                                <div class="col-sm-6 text-center d-sm-flex align-items-sm-center">
                                    <div class="display-1 text-muted font-w300">Xəta</div>
                                </div>
                            </div>
                            <div class="invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                                <h2 class="h3 font-w400 text-muted mb-5 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="450">
                                    Xəta baş verdi. Zəhmət olmasa giriş səhifəsinə daxil olun..</h2>
                                <a class="btn btn-hero-secondary" href="{{route('login')}}">
                                    <i class="fa fa-arrow-left mr-1"></i> Daxil olun
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<script src="{{asset('assets/js/main.core.min.js')}}"></script>
<script src="{{asset('assets/js/main.app.min.js')}}"></script>
</body>
</html>


