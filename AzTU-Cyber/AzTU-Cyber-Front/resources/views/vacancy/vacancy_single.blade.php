@extends('layouts.master')
@section('content')
    <main class="main-section">
        <div class="main__container">
            <section class="first-section">
                <div class="fs-news">
                    <h1 class="fs-news__header">
                        {{$vacancy_single->title}}
                    </h1>
                    <p class="fs-news__body">{!!$vacancy_single->content!!}</p>
                </div>
            </section>

            <section class="second-section">
                <div class="news__container">
                    <h3 class="news__title">Vakansiyalar</h3>
                    @foreach($vacancys as $vacancy)
                    <div class="news">
                        <div class="news__header">
                            <a href="{{route('vacancy_single_view', $vacancy->id)}}">{{$vacancy->title}}</a>
                        </div>
                        <div class="news__body">
                            {!!mb_substr($vacancy->content,0,150)!!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

@endsection

