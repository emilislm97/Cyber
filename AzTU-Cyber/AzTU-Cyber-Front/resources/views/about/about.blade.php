@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('src/css/about-us.css')}}"/>
@endsection
@section('content')
    <main class="main-section">
        <div class="main__container">
            <section class="about-us ">
                <h1 class="au-header">Haqqımızda</h1>
                <div class="au-container">
                    <div class="au_left-section">
                        <img
                            class="au__image"
                            src="/assets/media/about/{{$about->image}}"
                            alt="About Us"
                        />
                    </div>

                    <div class="au_right-section">
                        <p class="au-body">{{$about->content}} </p>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection

