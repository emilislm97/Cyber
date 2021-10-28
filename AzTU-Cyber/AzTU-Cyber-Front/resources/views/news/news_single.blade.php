@extends('layouts.master')
@section('content')
<main class="main-section">
    <div class="main__container">
        <section class="first-section">
            <div class="fs-news">
                <img style="width: 100%" src="{{asset('assets/media/news/'.$news_single->image)}}">
                <h1 class="fs-news__header">{{$news_single->name}}</h1>
                <p class="fs-news__body"> {{$news_single->content}}</p>
            </div>
        </section>

        <section class="second-section">
            <div class="news__container">
                <h3 class="news__title">Xəbərlər</h3>
                @foreach($news as $new)
                <div class="news">
                    <div class="news__header">
                        <a href="{{route('news_single_view', $new->id)}}">{{$new->name}}
                    </div>
                    <div class="news__body">
                        {!!mb_substr($new->content,0,150)!!}
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</main>

@endsection
