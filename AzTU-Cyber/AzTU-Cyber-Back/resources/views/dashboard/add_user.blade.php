@extends('layouts.master')
@section('title','Admin Panel | Yeni İstifadəçi')
@section('content')
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image" style="background-image: url('{{asset('assets/media/photos/photo14@2x.jpg')}}');">
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" href="{{route('dashboard')}}">
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                 src="assets/media/users/{{auth()->user()->image}}" alt="{{auth()->user()->name}}">
                        </a>
                        <h1 class="font-w700 my-2 text-white">{{auth()->user()->name}}</h1>
                        <h2 class="h4 font-w700 text-white">
                            {{auth()->user()->roles}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">

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

        <!-- New User -->
            <h2 class="content-heading">
                <i class="si si-plus mr-1"></i> Yeni İstifadəçi Əlavə Et
            </h2>
            <!-- END New User -->

            <div class="block block-rounded">
                <div class="block-content">
                    <form method="POST" action="{{route('add_user_post')}}" id="form">
                    @csrf
                    <!-- Add User -->
                        <div class="row push">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name_surname">Ad və Soyad</label>
                                    <input type="text" class="form-control" id="name_surname"
                                           name="name_surname" value="{{old('name_surname')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Elektron poçt ünvanı</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                                </div>
                            </div>
                        </div>
                        <!-- END Add User -->
                        <hr/>
                        <!-- Submit -->
                        <div class="row push">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary submit">
                                        <i class="fa fa-check-circle mr-1"></i> İstifadəçi Əlavə Et
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/loading.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/validate.css')}}">
@endsection
@section('js')
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/loading.js')}}"></script>
    <script src="{{asset('assets/js/pages/add_user.js')}}"></script>
@endsection
