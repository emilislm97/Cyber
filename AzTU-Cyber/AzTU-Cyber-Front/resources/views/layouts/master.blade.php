<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/vacancy.css')}}"/>
    <link rel="stylesheet" href="{{asset('src/css/vacancies.css')}}"/>
    <link rel="stylesheet" href="{{asset('src/css/forum-ask_question.css')}}"/>

    <link rel="stylesheet" href="{{asset('src/css/news.css')}}"/>
    <link rel="stylesheet" href="{{asset('src/css/forum.css')}}"/>

@yield('css')
    <!-- Fontawesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <title>Cyber Security Space</title>
    <link
        rel="shortcut icon"
        href="{{asset('assets/logo/mob/Asset 7@4x.png')}}"
        type="image/png"
    />
</head>

<body>
<div class="container1">
    @include('layouts.header')

    @yield('content')

    @include(('layouts.footer'))
</div>
<!-- Swiper JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- Javascript -->
<script src="{{asset('src/js/script.js')}}"></script>
@yield('js')
</body>
</html>
