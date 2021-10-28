@extends('layouts.master')
@section('content')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        Admin Panel
                    </h1>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0">{{session('success')}}</p>
                </div>
            @endif
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Overview -->
            <div class="row row-deck">
                <div class="col-sm-6 col-xl-4">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-user-tie text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{$admin_count}}</div>
                            <div class="text-muted mb-4">Admin sayı</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('dashboard')}}">
                                Ətraflı bax
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-users text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{$users_count}}</div>
                            <div class="text-muted mb-4">İstifadəçi sayı</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('users_list')}}">
                                Ətraflı bax
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-question-circle text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{$questions_count}}</div>
                            <div class="text-muted mb-4">Sual sayı</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('questions_list')}}">
                                Ətraflı bax
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-play text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{$news_active_count}}</div>
                            <div class="text-muted mb-4">Aktiv Blog sayı</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('news_list')}}">
                                Ətraflı bax
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-pause-circle text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{$news_waiting_count}}</div>
                            <div class="text-muted mb-4">Gözləyən Blog sayı</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('news_list')}}">
                                Ətraflı bax
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="block block-rounded text-center d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1">
                            <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                <i class="fa fa-exclamation-triangle text-muted"></i>
                            </div>
                            <div class="text-black font-size-h1 font-w700">{{$news_waiting_count}}</div>
                            <div class="text-muted mb-4">Deaktiv Blog sayı</div>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <a class="font-w500" href="{{route('news_list')}}">
                                Ətraflı bax
                                <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Overview -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
@section('js')
    <script src="{{asset('assets/js/pages/index.js')}}"></script>
@endsection


