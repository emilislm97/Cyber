@extends('layouts.master')
@section('title','Admin Panel | '.auth()->user()->name)
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

                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">

            @if(session('success'))
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 my-2">Uğurlu</h3>
                    <p class="mb-0">- {{session('success')}}</p>
                </div>
            @endif
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
            <!-- Users -->
                <h2 class="content-heading">
                    <i class="si si-users mr-1"></i> İstifadəçilər
                </h2>
                <div class="row">
                    @if(count($users) == 0)
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <div class="flex-00-auto">
                                <i class="fa fa-fw fa-info-circle"></i>
                            </div>
                            <div class="flex-fill ml-3">
                                <p class="mb-0">İstifadəçi yoxdur | Yeni istifadəçi <a class="alert-link"
                                                                                       href="{{route('add_user')}}">əlavə
                                        et</a></p>
                            </div>
                        </div>
                    @else
                        @foreach($users as $user)
                            <div class="col-md-6 col-xl-3">
                                <div class="block block-rounded text-center">
                                    <div class="block-content block-content-full bg-image"
                                         style="background-image: url('{{asset('assets/media/photos/photo14.jpg')}}');">
                                        <img class="img-avatar img-avatar-thumb mb-4" src="assets/media/users/{{$user->image}}"
                                             alt="{{$user->name}}">
                                    </div>
                                    <div class="block-content block-content-full block-content-sm bg-body-light">
                                        <div class="font-w600">{{$user->name}}</div>
                                        <div class="font-size-sm text-muted">{{$user->email}}</div>
                                        <div class="font-size-sm text-muted">{{$user->roles}}</div>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <button type="button" onclick="Sil({{$user->id}})" class="btn btn-danger mr-1 mb-3">
                                            <i class="fa fa-fw fa-times mr-1"></i> Sil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="text-right">
                    <a href="{{route('add_user')}}" class="btn btn-success mr-1 mb-3">
                        <i class="fa fa-fw fa-plus mr-1"></i> Əlavə et
                    </a>
                </div>
                <!-- END Users -->

        <!-- Settings -->
            <h2 class="content-heading">
                <i class="si si-settings mr-1"></i> Redaktə et
            </h2>
            <!-- END Settings -->
                <!-- Simple Wizard -->
                <div class="js-wizard-simple block block-rounded">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-simple-step1" data-toggle="tab">1. Haqqında</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple-step2" data-toggle="tab">2. Şifrəni Dəyiş</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->
                    <!-- Form -->
                    <form method="POST" action="{{route('dashboard_post')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Steps Content -->
                        <div  class="d-flex justify-content-center block-content block-content-full tab-content" style="min-height: 290px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active col-lg-6" id="wizard-simple-step1" role="tabpanel">

                                <div class="form-group">
                                    <label for="name">Ad və Soyad</label>
                                    <input type="text" class="form-control" id="name_surname"
                                           name="name_surname" value="{{auth()->user()->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Elektron poçt ünvanı</label>
                                    <input readonly="readonly" type="email" class="form-control" value="{{auth()->user()->email}}" >
                                </div>
                            </div>
                            <!-- END Step 1 -->
                            <!-- Step 2 -->
                            <div class="tab-pane col-lg-6" id="wizard-simple-step2" role="tabpanel">

                                <div class="form-group">
                                    <label for="current_password">Cari Şifrə</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="new_password">Yeni Şifrə</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="new_password_confirm">Yeni Şifrə təkrarı</label>
                                        <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm">
                                    </div>
                                </div>
                                <div class="form-group" id="show"></div>
                            </div>
                            <!-- END Step 2 -->
                            <!-- Step 3 -->
                            @if(auth()->user()->roles == 'Author')
                            <div class="tab-pane col-lg-6" id="wizard-simple-step3" role="tabpanel">
                                <div class="form-group" id="social">
                                    Yazıçı səhifənizdə görsənməsini istədiyiniz sosial şəbəkələri əlavə edin!
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="author_facebook">Facebook</label>
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input type="text"  id="author_facebook"  class="form-control" name="author_facebook" value="{{auth()->user()->author_facebook}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="author_instagram">Instagram</label>
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-instagram"></i></span>
                                            </div>
                                            <input type="text"  id="author_instagram"  class="form-control" name="author_instagram" value="{{auth()->user()->author_instagram}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="author_linkedin">linkedin</label>
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-linkedin"></i></span>
                                            </div>
                                            <input type="text"  id="author_linkedin"  class="form-control" name="author_linkedin" value="{{auth()->user()->author_linkedin}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="author_twitter">Twitter</label>
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                                            </div>
                                            <input type="text"  id="author_twitter"  class="form-control" name="author_twitter" value="{{auth()->user()->author_twitter}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="author_github">Github</label>
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-github"></i></span>
                                            </div>
                                            <input type="text"  id="author_github"  class="form-control" name="author_github" value="{{auth()->user()->author_github}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="author_behance">Behance</label>
                                        <div class="input-group col-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-behance"></i></span>
                                            </div>
                                            <input type="text"  id="author_behance"  class="form-control" name="author_behance" value="{{auth()->user()->author_behance}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endif
                            <!-- END Step 3 -->
                        </div>
                        <!-- END Steps Content -->
                        <!-- Submit -->
                        <div class="row push container">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt-primary submit yenile">
                                        <i class="fa fa-check-circle mr-1"></i> Profili yenilə
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </form>
                    <!-- END Form -->
                </div>
                <!-- END Simple Wizard -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/loading.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/loading.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/pages/social.js')}}"></script>
    <script src="{{asset('assets/js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>jQuery(function () {
            Admin.helpers(['summernote']);
        });</script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200,
            });
        });
        $("#form-add").on("keypress", function (event) {
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                event.preventDefault();
                return false;
            }
        });
    </script>
@endsection
