@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('src/css/forum-single.css')}}"/>
@endsection
@section('content')
    <main class="main-section">
        <div class="main__container">
            <div class="fs_vacancy-container">
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

                    <h2 class="fs_vacancy-header">
                        @foreach($users as $user)
                            @if($question_single->user_id == $user->id)
                                <img class="user-question__profile__img"
                                     src="{{asset('assets/media/users/'.$user->image)}}" alt="profil"/>
                            @endif
                        @endforeach
                        <span class="user-qeustion_profile_name">@foreach($users as $user)
                                @if($question_single->user_id == $user->id)
                                    {{$user->name}}
                                @endif
                            @endforeach</span>
                    </h2>
                    <p>{{mb_substr($question_single->created_at,0,16)}}</p>
                    <p class="fs_vacancy-body">{!!$question_single->question!!}</p>
                    @if(Auth::user())
                        @if(Auth::user()->id != $question_single->user_id)
                        <div style="text-align: center; margin:20px;">
                             <button  onclick="Comment_div1()" id="commentDivOpen">Sualı cavabla</button>
                        </div>
                            @endif
                    @else
                        <div style="text-align: center"><p id="info-register"> Suala və şərhə cavab yazmaq üçün qeydiyyatdan keçin və ya hesabınıza daxil olun.</p></div>
                    @endif
                    <div id="commentdiv1" style="display: none">
                        <form action="{{route('comment_post')}}" class="reg__form" method="POST" id="answer-form">
                            @csrf
                            <input type="hidden" name="input1" value="{{$question_single->id}}">
                               <textarea name="comment" id="answer-form-textarea"></textarea>
                               <button style="margin: auto ; margin-bottom:20px;" type="submit" id="SubmitBtn">Göndər</button>
                        </form>
                    </div>
                @foreach($comments as $comment)
                    <div class="user-question">
                        <h4 class="user-question__header">{{$comment->comment}}</h4>

                        <div class="user-question__body">
                            <div class="user-question__profile">

                                @foreach($users as $user)
                                    @if($comment->user_id == $user->id)
                                        <img class="user-question__profile__img"
                                             src="{{asset('assets/media/users/'.$user->image)}}" alt="profil"/>
                                    @endif
                                @endforeach
                                <span class="user-qeustion__profile__name">
                                    @foreach($users as $user)
                                        @if($comment->user_id == $user->id)
                                            {{$user->name}}
                                        @endif
                                    @endforeach
                                    </span>
                            </div>
                            <div class="user-question__others">
                                <div class="user-question__date">
                                    <i class="far fa-clock"></i>
                                    <p>{{mb_substr($comment->created_at,0,16)}}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form method="POST" id="myform" action="{{route('answer_post')}}" class="reg__form">
                                @csrf
                                <input type="hidden" name="input1" value="{{$question_single->id}}">
                                <input type="hidden" name="input2" value="{{$comment->id}}">
                                <input type="hidden" name="input3" value="{{$comment->user_id}}">
                                @if(Auth::user() && Auth::user()->id != $comment->user_id )
                                <div id="comment-setion">
                                <input name="comment" style="width: 100%" placeholder="Şərhə cavab yaz...">
                                <button id="SubmitBtn" type="submit">Göndər</button>
                                </div>
                                    @endif
                            </form>
                            @if(Auth::user())
                                 @if($comment->user_id == Auth::user()->id)
                                    <a href="{{route('comment_delete',$comment->id)}}"><i class="fas fa-trash-alt">Sil</i></a>
                                @endif
                            @endif

                        </div>
                    </div>
                    @if( 0 !=\App\Models\Comment::where('answer_comment_id',$comment->id)->where('status', '1')->get()->count())
                        @php
                            $answers = \App\Models\Comment::where('answer_comment_id',$comment->id)->where('status', '1')->get()
                        @endphp
                        @foreach($answers as $answer)
                            <div class="user-question" style="width: 90%;margin-left: 10%">
                                <h4 class="user-question__header">{{$answer->comment}}</h4>

                                <div class="user-question__body">
                                    <div class="user-question__profile">
                                        @foreach($users as $user)
                                            @if($answer->user_id == $user->id)
                                                <img class="user-question__profile__img"
                                                     src="{{asset('assets/media/users/'.$user->image)}}" alt="profil"/>
                                            @endif
                                        @endforeach
                                        <span class="user-qeustion__profile__name">
                                            @foreach($users as $user)
                                                @if($answer->user_id == $user->id)
                                                    <h4>{{$user->name}}</h4>
                                                @endif
                                            @endforeach
                                                <i class="fas fa-directions"></i>
                                            @foreach($users as $user)
                                                @if( $answer->answer_user_id == $user->id)
                                                    <span>{{$user->name}}</span>
                                                @endif
                                            @endforeach
                                    </span>
                                    </div>
                                    <div class="user-question__others">
                                        <div class="user-question__date">
                                            <i class="far fa-clock"></i>
                                            <p>{{mb_substr($answer->created_at,0,16)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <form method="POST" id="myform" action="{{route('answer_post')}}" class="reg__form">
                                        @csrf
                                        <input type="hidden" name="input1" value="{{$question_single->id}}">
                                        <input type="hidden" name="input2" value="{{$comment->id}}">
                                        <input type="hidden" name="input3" value="{{$answer->user_id}}">
                                        @if(Auth::user() && Auth::user()->id != $answer->user_id )
                                        <div id="comment-setion">
                                        <input name="comment" style="width: 100%" placeholder="Şərhə cavab yaz...">
                                        <button id="SubmitBtn" type="submit">Göndər</button>
                                        </div>
                                            @endif
                                    </form>
                                    @if(Auth::user())
                                        @if($answer->user_id == Auth::user()->id)
                                            <a href="{{route('answer_delete',$answer->id)}}"><i class="fas fa-trash-alt">Sil</i></a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        function Comment_div1() {
            document.getElementById('commentdiv1').style.display = 'block';
            document.getElementById('commentDivOpen').style.display = 'none';

        }
        function Send() {
            $('#myform').submit(function (e) {
                document.getElementById('SubmitBtn').disabled = true;
            });
        }
    </script>
@endsection
