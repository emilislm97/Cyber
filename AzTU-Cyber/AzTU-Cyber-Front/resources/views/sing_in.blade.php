<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('src/css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('src/css/sign-in-sign-up.css')}}" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Daxil ol</title>
</head>

<body>
    <div class="container-sing-in">
        <div class="background"></div>
    <div class="sign-in-sign-up__container">
        <div class="sign-in-sign-up__top-section">
            <a class="rm-arrow" href="{{route('index')}}">
                <i class="far fa-arrow-alt-circle-left"></i> Ana səhifəyə geri dön.
            </a>
            <a class="dark-light-mode"><i class="far fa-sun"></i></a>
        </div>

        <!-- Login -->
        <div class="sign-in">
            <div class="log-title-container">
                <h1 class="log-title">Daxil ol</h1>
            </div>

            <div class="log-body">
                <form action="{{route('login_post')}}"  method="POST"  class="log__form">
                  @csrf
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
                                <p class="mb-0">{{$error}}</p>
                            @endforeach
                        </div>
                    @endif


                    <label class="input-label" for="fullname">E-poçta</label>
                    <input class="input email" name="email" type="email" placeholder="E-poçta adresiniz" />

                    <label class="input-label" for="fullname">Şifrə</label>
                    <input class="input password" name="password" type="password" placeholder="Şifrəniz" />

                    <div class="rememberme-checkbox">
                        <input class="rememberme" type="checkbox" name="remember" id="rememberme" value="1" />
                        <label for="rememberme">Hesabı yadda saxla.</label>
                    </div>

                    <button  type="submit" class="btn-submit">Daxil ol</button>
                </form>
                <div class="log__footer">
                    <p class="">Daxil olmaq üçün hesabınız yoxdursa, <a href="{{route('register_view')}}">Qeydiyyatdan keç.</a> </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('src/js/sign-in-sign-up.js')}}"></script>
</body>
</html>


