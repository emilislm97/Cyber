@extends('layouts.master')
@section('content')
    <main class="main-section">
        <div class="main__container">
            <section class="vacancies">
                <h2 class="vacancy-header">Vakansiyalar</h2>
                <div class="vacancies-container">
                    @foreach($vacancys as $vacancy)
                        <div class="vacancy">
                            <h3 class="vacancy-title">
                                <a href="{{route('vacancy_single_view', $vacancy->id)}}">{{$vacancy->title}}</a>
                            </h3>
                        </div>
                    @endforeach
                        <div id="pagination_new">
                            {{$vacancys->render()}}
                        </div>
                </div>

            </section>
        </div>
    </main>
@endsection
