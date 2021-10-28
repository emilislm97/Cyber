@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('src/css/forum.css')}}"/>
@endsection
@section('content')
    <section class="forum-section ">
        <div class="forum-container">
            <div class="forum-header">
                <div class="fh-background"></div>
{{--                <div class="find-question">--}}
{{--                    <input type="text" placeholder="Axtar..."/>--}}
{{--                    <div>--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="ask-question">
                    <a href="{{route('forum_new')}}">
                        <button class="btn-ask-ques">Sual ver</button>
                    </a>
                </div>
            </div>
            <div class="forum-main">
                <div class="forum__first-section">
                    <div class="forum__top-section">
                        <button onclick="btn1()" class="btn-ques all-questions">Bütün suallar</button>
                        <button onclick="btn2()" class="btn-ques unaswered-questions">Cavabsız suallar</button>
                        @if(Auth()->User())
                            <button onclick="btn3()" class="btn-ques unaswered-questions">Mənim suallarım</button>
                        @endif

                    </div>

                    <div id="btn1" class="user-questions">
                        <h2 style="text-align: center;font-size: 30px">Bütün suallar</h2>
                        @foreach($questions_all as $question)
                            <div class="user-question">
                                <h4 class="user-question__header">
                                    <a href="{{route('forum_single_view',$question->id)}}">{{$question->question}}</a>
                                </h4>

                                <div class="user-question__body">
                                    <div class="user-question__profile">

                                        @foreach($users as $user)
                                            @if($question->user_id == $user->id)
                                                <img class="user-question__profile__img"
                                                     src="./assets/media/users/{{$user->image}}" alt="profil"/>
                                            @endif
                                        @endforeach
                                        <span class="user-qeustion__profile__name">
                                        @foreach($users as $user)
                                                @if($question->user_id == $user->id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                    </span>
                                    </div>

                                    <div class="user-question__others">
                                        <div class="user-question__meta">
                                            <i class="fas fa-comment-alt"></i>
                                            <p>Cavab sayı:
                                                <span>{{\App\Models\Comment::where('question_id',$question->id)->get()->count()}}</span>
                                            </p>
                                        </div>
                                        <div class="user-question__date">
                                            <i class="far fa-clock"></i>
                                            <p>{{mb_substr($question->created_at,0,16)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="btn2" class="user-questions hidden">
                        <h2 style="text-align: center;font-size: 30px">Cavabsız suallar</h2>
                        @foreach($questions as $question)
                            <div class="user-question">
                                <h4 class="user-question__header">
                                    <a href="{{route('forum_single_view',$question->id)}}">{{$question->question}}</a>
                                </h4>

                                <div class="user-question__body">
                                    <div class="user-question__profile">

                                        @foreach($users as $user)
                                            @if($question->user_id == $user->id)
                                                <img class="user-question__profile__img"
                                                     src="./assets/media/users/{{$user->image}}" alt="profil"/>
                                            @endif
                                        @endforeach
                                        <span class="user-qeustion__profile__name">
                                        @foreach($users as $user)
                                                @if($question->user_id == $user->id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                    </span>
                                    </div>

                                    <div class="user-question__others">
                                        <div class="user-question__meta">
                                            <i class="fas fa-comment-alt"></i>
                                            <p>Cavab sayı:
                                                <span>{{\App\Models\Comment::where('question_id',$question->id)->get()->count()}}</span>
                                            </p>
                                        </div>
                                        <div class="user-question__date">
                                            <i class="far fa-clock"></i>
                                            <p>{{mb_substr($question->created_at,0,16)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="btn3" class="user-questions hidden">
                        <h2 style="text-align: center;font-size: 30px">Mənim suallarım</h2>
                        @foreach($questions_me as $question)
                            <div class="user-question">
                                <h4 class="user-question__header">
                                    <a href="{{route('forum_single_view',$question->id)}}">{{$question->question}}</a>
                                </h4>

                                <div class="user-question__body">
                                    <div class="user-question__profile">

                                        @foreach($users as $user)
                                            @if($question->user_id == $user->id)
                                                <img class="user-question__profile__img"
                                                     src="./assets/media/users/{{$user->image}}" alt="profil"/>
                                            @endif
                                        @endforeach
                                        <span class="user-qeustion__profile__name">
                                        @foreach($users as $user)
                                                @if($question->user_id == $user->id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                    </span>
                                    </div>

                                    <div class="user-question__others">
                                        <div class="user-question__meta">
                                            <i class="fas fa-comment-alt"></i>
                                            <p>Cavab sayı:
                                                <span>{{\App\Models\Comment::where('question_id',$question->id)->get()->count()}}</span>
                                            </p>
                                        </div>
                                        <div class="user-question__date">
                                            <i class="far fa-clock"></i>
                                            <p>{{mb_substr($question->created_at,0,16)}}</p>
                                        </div>
                                        <div class="user-question__meta">
                                            @if($question->status == '0')
                                                <span style="background-color: red; padding: 5px;border-radius: 10px"> Aktiv Deyil</span>
                                            @elseif($question->status == '1')
                                                <span style="background-color: green; padding: 5px;border-radius: 10px"> Aktivdir</span>
                                            @elseif($question->status == '2')
                                                <span style="background-color: yellow; padding: 5px;border-radius: 10px"> Gözləmədə</span>
                                            @endif
                                        </div>
                                        <div class="user-question__meta">
                                            <a href="{{route('question_edit',$question->id)}}"><i class="fas fa-setting">Redakte et</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function btn1(){
            document.getElementById("btn1").classList.remove("hidden");
            document.getElementById("btn2").classList.add("hidden");
            document.getElementById("btn3").classList.add("hidden");
        }
        function btn2(){
            document.getElementById("btn2").classList.remove("hidden");
            document.getElementById("btn1").classList.add("hidden");
            document.getElementById("btn3").classList.add("hidden");
        }
        function btn3(){
            document.getElementById("btn3").classList.remove("hidden");
            document.getElementById("btn1").classList.add("hidden");
            document.getElementById("btn2").classList.add("hidden");
        }
    </script>
@endsection

