<div class="nav-header">
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>

    <a href="{{ route('dashboard')}}" class="brand-logo">
        @php
            $logo = getLogo('primary');
            $logoImg ='assets/frontend/img-icon/pksf.jpeg';
            if (count($logo)>0){
                $logoImg = 'storage/'. $logo[0]->image;
            }
        @endphp
        <img src="{{asset($logoImg)}}" alt="logo" style="max-height: 55px;">
    </a>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="input-group search-area right d-lg-inline-flex d-none">

                    </div>
                </div>
                <ul class="navbar-nav header-right main-notification">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="{{route('clientMessages.index')}}"  >
                            <i class="fa-solid fa-message" style="font-size:2rem;color:#eb8153;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">

                            {{--                            <img src="{{ asset('assets/backend/images/profile/pic1.jpg')}}" width="20" alt="user"/>--}}
                            <div class="header-info">
                                <span>{{ Auth::user()->name }}</span>
                                <small>Super Admin</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item ai-icon" href="{{route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                     height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ml-2">{{ __('Logout') }} </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>

