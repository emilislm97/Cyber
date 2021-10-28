<!DOCTYPE  html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Admin Panel | Giriş et</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/loading.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/validate.css')}}">
    <!-- END Stylesheets -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>

<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('{{asset('assets/media/photos/photo22@2x.jpg')}}');">
            <div class="row no-gutters bg-primary-op">
                <!-- Main Section -->
                <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                    <div class="p-3 w-100">
                        <!-- Header -->
                        <div class="mb-3 text-center">
                            <h1 class="text-uppercase font-w700  text-muted">CYBER</h1>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <div class="row no-gutters justify-content-center">
                            <div class="col-sm-8 col-xl-6">
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="alert-heading font-size-h4 my-2">Xəta</h3>
                                        <p class="mb-0">- {{session('error')}}</p>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="alert-heading font-size-h4 my-2">Xəta</h3>
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">* {{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <form method="POST" action="{{route('login_post')}}" id="form">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg form-control-alt"
                                                   id="email" name="email" value="{{ old('email') }}"
                                                   placeholder="Elektron poçt ünvanı"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt"
                                                   id="password" name="password" placeholder="Şifrə">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary submit">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Giriş et
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Main Section -->

                <!-- Meta Info Section -->
                <div
                    class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                    <div class="p-3">
                        <p class="display-4 font-w700 text-white mb-3">
                            Xoş gəldiniz
                        </p>
                        <p class="font-size-lg font-w600 text-white-75 mb-0">
                            AzTU - Cyber &copy; 2021 {{date('Y') == '2017' ? '' : '- '.date('Y')}}
                        </p>
                    </div>
                </div>
                <!-- END Meta Info Section -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<script src="{{asset('assets/js/main.core.min.js')}}"></script>
<script src="{{asset('assets/js/main.app.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/pages/login.js')}}"></script>
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
</body>
</html>
