@extends('layouts.master')
@section('content')
    <main class="main-section">
        <div class="main__container">
            <section class="first-section">
                <div class="fs-news">
                    <img style="width: 500px; height: auto" src="{{asset('assets/media/news/'.$blog_single->image)}}">
                    <h1 class="fs-news__header">{{$blog_single->name}}</h1>
                    <p class="fs-news__body"> {{$blog_single->content}}</p>
                </div>
            </section>

            <section class="second-section">
                <div class="news__container">
                    <h3 class="news__title">Bloglar</h3>
                    @foreach($blogs as $blog)
                        <div class="news">
                            <div class="news__header">
                                <a href="{{route('blog_single_view', $blog->id)}}">{{$blog->name}}
                            </div>
                            <div class="news__body">
                                {!!mb_substr($blog->content,0,150)!!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

@endsection
