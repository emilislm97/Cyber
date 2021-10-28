@extends('layouts.master')
@section('content')
    <main class="main-section">
            <section class="forum-ask_question">
                <div class="aq__container">
                    <h2 class="aq__header">Sualınızı redakte edin</h2>

                    <form method="POST" id="myform" action="{{route('question_edit_post',$question->id)}})}}" class="reg__form">
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
                        <div class="aq__content-group">
                            <textarea  class="aq__content" name="qcontent" >{{$question->question}}</textarea> 
                        </div>
                      <button class="aq__button" id="SubmitBtn" type="submit">Redaktə edin</button>
                    </form>
                </div>
            </section>
    </main>
@endsection
@section('js')
    <script>
        function Send() {
            $('#myform').submit(function(e){
                document.getElementById('SubmitBtn').disabled = true;
            });
        }
    </script>
@endsection
