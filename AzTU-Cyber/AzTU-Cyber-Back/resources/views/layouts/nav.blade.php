<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="font-w600 text-white tracking-wide" href="{{route('index')}}">
                            <span class="smini-visible">
                                Cyber<span class="opacity-75"></span>
                            </span>
                <span class="smini-hidden">
                                AzTU-<span class="opacity-75">Cyber</span>
                            </span>
            </a>
            <!-- END Logo -->

            <!-- Responsive menu close -->
            <div>
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                   href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link @if(Request::segment(1)=='') active @endif" href="{{route('index')}}">
                        <i class="nav-main-link-icon si si-pie-chart"></i>
                        <span class="nav-main-link-name">Admin-Panel</span>
                    </a>
                </li>
                {{--Postlar--}}
                <li class="nav-main-item ">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-book-open"></i>
                        <span class="nav-main-link-name">Postlar</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link "
                               href="{{route('news_add')}}">
                                <span class="nav-main-link-name">??lav?? et</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link"
                               href="{{route('news_list')}}">
                                <span class="nav-main-link-name">Siyah??</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--vakansiyalar--}}
                <li class="nav-main-item ">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-edit"></i>
                        <span class="nav-main-link-name">Vakansiyalar</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link "
                               href="{{route('vacancy_add')}}">
                                <span class="nav-main-link-name">??lav?? et</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link"
                               href="{{route('vacancy_list')}}">
                                <span class="nav-main-link-name">Siyah??</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--Istifad????il??rr--}}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="{{route('users_list')}}">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Istifad????il??r</span>
                    </a>
                </li>
                {{--Suallar--}}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="{{route('questions_list')}}">
                        <i class="nav-main-link-icon fa fa-question-circle"></i>
                        <span class="nav-main-link-name">Suallar</span>
                    </a>
                </li>
                {{--????rhl??r--}}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="{{route('commets_list')}}">
                        <i class="nav-main-link-icon fa fa-comment-dots"></i>
                        <span class="nav-main-link-name">????rhl??r</span>
                    </a>
                </li>
                {{--D??st??k mesaj??--}}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="{{route('support_list')}}">
                        <i class="nav-main-link-icon fa fa-ticket-alt"></i>
                        <span class="nav-main-link-name">D??st??k Mesajlar??</span>
                    </a>
                </li>
                {{--Haqq??nda--}}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="{{route('about_edit')}}">
                        <i class="nav-main-link-icon fa fa-not-equal"></i>
                        <span class="nav-main-link-name">Haqq??nda</span>
                    </a>
                </li>

                {{--Setting--}}
                <li class="nav-main-item">
                    <a class="nav-main-link " href="{{route('setting_edit')}}">
                        <i class="nav-main-link-icon si si-settings"></i>
                        <span class="nav-main-link-name">Nizamlamalar</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('logout')}}">
                        <i class="nav-main-link-icon si si-logout"></i>
                        <span class="nav-main-link-name">????x???? et</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->
