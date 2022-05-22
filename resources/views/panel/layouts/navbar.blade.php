<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top:-10px">
    <div class="container-fluid">
        <!-- offcanvas trigger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        <!-- offcanvas trigger -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets') }}/img/logo/logo-act.png" alt="Limonist" title="Limonist" class="img-fluid">
        </a>

        <div class="ms-5">
            <a style="text-decoration: none;color:black" href="{{route('dashboard.index')}}"><span class="report {{ Request::segment(2)=='dashboard'  ? 'active' :'' }}"><i class="fa-solid fa-chart-line"></i> {{ __('general.reports') }}</span></a>
            <a style="text-decoration: none;color:black"  href="{{route('user.list')}}"><span class="admin {{ (Request::segment(2)=='users' && Request::segment(3)=='list') ? 'active' :'' }}"><i class="fa-solid fa-gear border-circle"></i> {{ __('general.management') }}</span></a>
        </div>

        <div class="mb-2 mb-lg-0  ms-auto">
            <div class="btn-group">
                <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/img/lang/tr.png') }}" alt="" class="img-fluid">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url()->to('') }}/tr"><img src="{{ asset('assets/img/lang/tr.png') }}"  alt="" class="img-fluid"></a></li>
                    <li><a class="dropdown-item" href="{{ url()->to('') }}/en"><img src="{{ asset('assets/img/lang/en.png') }}" selected alt="" class="img-fluid"></a></li>

                </ul>
            </div>
        </div>
    </div>
</nav>
