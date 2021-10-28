@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('src/css/contact.css')}}"/>
@endsection
@section('content')
    <section class="contact-form-section">
        <h1 class="contact-us__header">Bizimlə Əlaqə</h1>
        <article class="contact-form-container">
            <div class="contact-form-map">
                <iframe
                    src="{{$setting->map}}"
                    width=""
                    height=""
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
                    id="ofisMap"
                ></iframe>
                <div class="moreInformation">
                    <p class="contactUsNum">
                        <span class="nums-span">no :</span>{{$setting->number}}
                    </p>
                    <p class="contactUsNum">
                        <span class="nums-span">faks :</span> {{$setting->fax}}
                    </p>
                    <p class="moreInformation-third-p">
                        {{$setting->content}}
                    </p>
                </div>
                <div class="socialMediaForContactForm">
                    <a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
                    <a href="{{$setting->facebook}}"><i class="fab fa-facebook-square"></i></a>
                    <a href="{{$setting->telegram}}"><i class="fab fa-telegram-plane"></i></a>
                    <a href="{{$setting->twitter}}"><i class="fab fa-twitter-square"></i></a>
                </div>
            </div>
            <div class="contact-form-right-section">
                <form method="POST" id="myform" action="{{route('contact_post')}}" class="reg__form">
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
                    <div class="ContactUsInputGroup">
                        <input
                            type="text"
                            name="name"
                            placeholder="Tam adınız..."
                            required
                            autocomplete="off"
                        />
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="ContactUsInputGroup">
                        <input
                            type="email"
                            name="email"
                            placeholder="E poçta adresiniz.."
                            required
                            autocomplete="off"
                        />
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="contacttextAreaContainer">
                <textarea
                    name="content"
                    id="contactUsMessage"
                    placeholder="Bizimlə nə üçün əlaqə qurmaq istəyirsiniz?"
                ></textarea>
                        <i class="fas fa-comment" id="fa-comment-contact"></i>
                    </div>
                    <div class="submitContactFormContainer">
                        <button type="submit" onclick="Send()" name="" id="sontactUsSubmitBtn">
                            Göndər
                        </button>
                    </div>
                </form>
            </div>
        </article>
    </section>
@endsection



