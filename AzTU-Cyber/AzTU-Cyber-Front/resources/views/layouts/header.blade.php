<header>
    <div class="header-container-first">
        <div class="header-logo-row">
            @php
                $setting1 = \App\Models\Setting::first();
            @endphp
            <a class="header-logo-row__logo" href="{{route('index')}}">
                <img class="header-logo-row__logo__img" src="{{asset('/assets/logo/web/'.$setting1->logo)}}" alt="" />
            </a>

            <div class="header-logo-row__btns">
                <!-- <a class="header-logo-row__btn"> <i class="fas fa-globe"></i> </a> -->
                @if(Auth()->User())
                        <a style="font-size: 20px" class="header-logo-row__btn header-profile-btn"> {{Auth::user()->name}}</i></a>
                        <a style="font-size: 20px" href="{{route('logout')}}" ><i class="fas fa-sign-out-alt">Çıxış et</i></a>

                @else
                    <a href="{{route('sing_in_view')}}" class="header-logo-row__btn"><i class="far fa-user-circle"></i></a>
                @endif

{{--                <a class="header-logo-row__btn dark-light-mode"><i class="far fa-moon"></i></a>--}}
            </div>
        </div>
    </div>
    <div class="header-container-second">
        <nav>
            <ul class="nav-links">
                <li><a class="nav-link" href="{{route('index')}}">Ana səhifə</a></li>
                <li><a class="nav-link" href="{{route('vacancy_view')}}">Vakansiyalar</a></li>
                <li><a class="nav-link" href="{{route('forum_view')}}">Forum</a></li>
                <li><a class="nav-link" href="{{route('about')}}">Haqqımızda</a></li>
                <li><a class="nav-link" href="{{route('contact_view')}}">Əlaqə</a></li>
            </ul>
        </nav>
    </div>
</header>
