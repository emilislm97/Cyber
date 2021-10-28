<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="./src/css/reset.css" />
    <link rel="stylesheet" href="./src/css/style.css" />
    <link rel="stylesheet" href="./src/css/sign-in-sign-up.css" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Qeydiyyat Səhifəsi</title>
</head>

<body>
    <div class="container-sing-in">
        <div class="sign-in-sign-up__container">
            <div class="sign-in-sign-up__top-section">
                <a class="rm-arrow" href="{{route('index')}}">
                    <i class="far fa-arrow-alt-circle-left"></i> Ana səhifəyə geri dön.
                </a>
                <a class="dark-light-mode"><i class="far fa-sun"></i></a>
            </div>
            <!-- Registration -->
            <div class="sign-up">
                <div class="reg-title-container">
                    <h1 class="reg-title">Qeydiyyat</h1>
                </div>
                <div class="reg-body">
                    <form method="POST" action="{{route('register_post')}}" class="reg__form">
                        @csrf

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label class="input-label" for="fullname">Ad və soyad</label>
                        <input class="input fullname" type="text" name="Ad_Soyad" placeholder="Tam adınız" />
                        <label class="input-label"  for="email">E-poçta</label>
                        <input class="input email" type="email" name="Email" placeholder="E-poçta adresiniz" />
                        <label class="input-label" for="password">Şifrə</label>
                        <span id="span1" style="color: red; display: none">* Şifrədə böyük hərf, kiçik hərf və rəqəm olmalıdır!</span>
                        <input class="input password"  id="input1" onkeyup="Span1()" type="password" name="Sifre" placeholder="Şifrə" />
                        <label class="input-label" for="password">Təkrar Şifrə</label>
                        <span id="span2" style="color: red; display: none">* Təkrar şifrə daxil olunun ilk şifrə ilə eyni olmalıdır!</span>
                        <input class="input password" id="input2" onkeyup="Span2()" type="password" name="Tekrar_sifre" placeholder="Təkrar şifrə" />


                        <div class="gender-selection">
                            <label class="gs-radio-label">
                                <input class="radio"  value="male" type="radio" name="Cinsiyyet" />
                                <span class="gs-text">Kişi</span>
                            </label>

                            <label class="gs-radio-label">
                                <input class="radio"value="female"  type="radio" name="Cinsiyyet" />
                                <span class="gs-text">Qadın</span>
                            </label>
                        </div>
{{--                        <div class="agree-checkbox">--}}
{{--                            <input class="checkbox" type="checkbox" name="agree" id="agree" required />--}}
{{--                            <label for="agree">Lorem, ipsum dolor sit amet consectetur adipisicing--}}
{{--                                elit.</label>--}}
{{--                        </div>--}}

                        <button type="submit" class="btn-submit" >Qeydiyyatdan keç</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('src/js/sign-in-sign-up.js')}}"></script>
<script>
    function Span1(){
        let input1 = document.getElementById('input1');
        document.getElementById('span1').style.display= 'block';
        if(input1.value.match(/[a-z]/g)){
            if (input1.value.match(/[A-Z]/g)){
                if (input1.value.match(/[0-9]/g)){
                    if (input1.value.length >= 8){
                        document.getElementById('span1').style.display= 'none';
                    }
                }
            }
        }
    }

    function Span2(){
        document.getElementById('span2').style.display= 'block';
        if (document.getElementById('input1').value === document.getElementById('input2').value){
            document.getElementById('span2').style.display= 'none';
        }
    }
</script>
</body>
</html>



