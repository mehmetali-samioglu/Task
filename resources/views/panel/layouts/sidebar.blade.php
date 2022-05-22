<div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body ">
        <nav class="navbar-light">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link sidebar-link " data-bs-toggle="collapse" href="#layouts"
                        aria-expanded="false">
                        <div class="d-flex me-2">
                            <i class="fa-regular fa-user fa-2x"></i>
                            <span class="ps-2 menu-text">
                                {{ __('general.user_operations') }}
                            </span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                        </div>
                    </a>
                    <div class="collapse @if(Request::segment(2)=="users") show @endif" id="layouts">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="{{ route('user.list' ) }}" class="nav-link px-3">
                                    <span class="me-2"><i class="fa-solid fa-pen"></i>
                                    </span>
                                    <span class="submenu-text"> {{ __('general.users') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <div class="bottom-menu">
                    <li>
                        <a class="nav-link sidebar-link" href="">
                            <div class="d-flex me-2">
                                <i class="fa-regular fa-bell border-circle"></i>
                                <span class="ps-2 menu-text">
                                    {{ __('general.notifications') }}
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link sidebar-link" href="">
                            <div class="d-flex me-2">
                                <i class="fa-regular fa-envelope  border-circle"></i>

                                <span class="ps-2 menu-text">
                                    {{ __('general.messages') }}
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit',Auth::user()->id) }}" class="nav-link sidebar-link" href="">
                            <div class="d-flex me-2">
                                <i class="fa-solid fa-gear border-circle"></i>
                                <span class="ps-2 menu-text">
                                    {{ __('general.profile_and_settings') }}
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="nav-link btn btn-primary mt-2 btn-sm " href="">
                            Limonist
                        </a>
                    </li>
                    <li class="mb-2">
                        <a class="nav-link btn btn-primary mt-2  btn-sm" href="">
                            {{ __('general.mission') }}
                        </a>
                    </li>
                    <li class="mb-2">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-4">
                                <img src="{{ asset('assets') }}/img/logo/logo-act.png" alt="Limonist" title="Limonist"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                                <div class="text-center">
                                    <i class="fa-regular fa-message"></i>
                                </div>
                                <div id="help">
                                    {{ __('general.live_help') }}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                                <a href="{{ route('login.logout') }}" class="text-reset text-decoration-none">
                                    <div class="text-center">
                                        <i class="fa-solid fa-power-off"></i>
                                    </div>
                                    <div id="close">
                                        {{ __('general.singout') }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <hr>
                    <div class="text-center">
                        2022 &copy; <span> Limonist</span>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('assets') }}/img/logo/logo-act.png" alt="Limonist" title="Limonist" class="img-fluid">
                    </div>
                </div>
            </ul>
        </nav>
    </div>
</div>

<div class="breadcrumb">
    <span class="fw-bold">{{__('general.users')}}</span>
    <a class="text-reset" href="{{route('dashboard.index')}}"><i class="fa-solid fa-house ms-2"></i></a>
    <ul >
        <li class="float-start me-4">
           <a href="{{route('dashboard.index')}}" style="text-decoration: none;color:black">Panel</a>
        </li>
        <li class="float-start me-4">
           {{__('general.users')}}
        </li>
    </ul>
</div>
