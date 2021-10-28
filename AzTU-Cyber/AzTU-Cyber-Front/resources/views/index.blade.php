@extends('layouts.master')
@section('content')
<main class="main-section">
    <div class="main__container">
        <section class="first-section">
            <div class="common-info">
                <div class="swiper common-info__swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            @foreach($news as $new)
                            <div class="common-info__card">
                                <div class="cf__bg-image" style=" background-image: url('./assets/media/news/{{$new->image}}')"></div>
                                <div class="cf__img"><i class="fas fa-question"></i></div>
                                <div class="cf__body">
                                    <h1 class="cf__body__title">{{$new->name}} </h1>
                                    <p class="cf__body__text">{{mb_substr($new->content,0,240).'...'}}</p>
                                    <div class="cf__btn__container">
                                        <button class="btn cf__btn"><a  href="{{route('news_single_view', $new->id)}}">Daha ətraflı</a></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="posts" id="posts_news">
                <h3 class="posts__title">Məqalələr</h3>
                @foreach($blogs as $blog)
                <div class="post">
                    <div class="post__header">
                        <h3>{{$blog->name}}</h3>
                        <a class="post__link" href="{{route('blog_single_view', $blog->id)}}"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                    <div class="post__body">{{mb_substr($blog->content,0,270).'...'}}</div>
                    <div class="post__footer"><p>{{mb_substr($blog->created_at,0,10)}}</p></div>
                </div>
                @endforeach
                <div id="pagination_new">{{$blogs->render()}}</div>
            </div>
        </section>


        <section class="second-section">
            <div class="last-questions">
                <h3 class="last-questions__title">Son verilən suallar</h3>
                @foreach($questions as $question)
                <div class="last-questions__card">
                    <div class="last-questions__card__header">
                        <a href="{{route('forum_single_view', $question->id)}}">{{mb_substr($question->question,0,75).'...'}}</a>
                    </div>
                    <div class="last-questions__card__body">
                        @foreach($users as $user)
                            @if($question->user_id == $user->id)
                                {{$user->name}}
                            @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
                <button class="forum-link-btn"><a href="{{route('forum_view')}}">Forum</a> </button>
            </div>


            <div class="vacancies">
                <h3 class="vacancies__title">Aktiv Vakansiyalar</h3>
                @foreach($vacancys as $vacancy)
                <div class="vacancy">
                    <div class="vacancy__header">
                        <a href="{{route('vacancy_single_view', $vacancy->id)}}"> {{$vacancy->title}}</a>
                    </div>
                    <div class="vacancy__body">{!!mb_substr($vacancy->content,0,150)!!}</div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</main>
@endsection
