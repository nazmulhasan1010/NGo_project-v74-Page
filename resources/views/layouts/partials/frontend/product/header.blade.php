<header class="header-area header-style-1 header-style-5 header-height-2">
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            @php
                $logo = getLogo('primary');
                $logo_2 = getLogo('secondary');
            @endphp
            <div class="header-wrap header-space-between position-relative ">
                <div class="header-nav d-none d-lg-flex">
                    <div class=" d-none d-lg-flex " style="  align-items: center; height: 60px; padding: 0 20px;">
                        @if (count($logo)>0)
                            @if($logo[0]->status===1)
                                <a href="{{url('/')}}"><img style="width: 200px; "
                                                            src="{{asset('storage/'. $logo[0]->image)}}"
                                                            alt="logo"/></a>
                            @endif
                        @endif
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a class="active" href="{{url('/')}}">{{__('front.home')}}</a>
                                </li>
                                <li>
                                    <a href="{{url('product-about')}}">{{__('front.about')}}</a>
                                </li>
                                @php
                                    $enterprises = getEnterprise('', 'all');
                                @endphp
                                <li>
                                    <a href="#">{{__('front.vendors')}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($enterprises as $enterprise)
                                            <li><a href="{{route('products',['catName'=>$enterprise->owner_company,'catId'=>encrypt($enterprise->id)])}}">{{$enterprise->owner_company}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('product-contact')}}">{{__('front.contact')}}</a>
                                </li>
                                <li>
                                    <a style="background-color: #fdc040; padding: 5px 10px; "
                                       href="{{url('home')}}">DSK-SEP</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-info header-info-right" style="position:absolute; right: 10px; font-size:18px">
                        <div class="contact_modal" style="background-color: #3bb77e;">
                            <form action="" class="right d-flex justify-content-end" method="post" role="form">
                                @csrf
                                <input type="hidden" name="lanStatus" id="lanStatus" value="0" hidden>
                                <a href="{{url('language')}}" class="lan_cng_btn " id="lanBtn">
                                    @php
                                        if (session()->has('language')){
                                            $lan = session()->get('language');
                                        }else{
                                            $lan = App::currentLocale();
                                        }
                                    @endphp
                                    <label class="lanEnOn {{$lan=='en'?'on':'off'}}">EN</label>
                                    <label class="lanBnOn {{$lan=='bn'?'on':'off'}}">BN</label>
                                </a>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="logo logo-width-1 d-block d-lg-none">
                    @if (count($logo)>0)
                        @if($logo[0]->status===1)
                            <a href="{{url('/')}}">
                                <img style="width: 200px" src="{{asset('storage/'. $logo[0]->image)}}" alt="logo"/>
                            </a>
                        @endif
                    @endif
                </div>

                <div class="header-action-right d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                @if (count($logo)>0)
                    @if($logo[0]->status===1)
                        <a href="index.html"><img src="{{asset('storage/'. $logo[0]->image)}}" alt="logo"/></a>
                    @endif
                @endif
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{url('/')}}">{{__('front.home')}}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('product-about')}}">{{__('front.about')}}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{url('product-contact')}}">{{__('front.contact')}}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">{{__('front.vendors')}}</a>
                            <ul class="dropdown">
                                <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                <li><a href="vendors-list.html">Vendors List</a></li>
                                <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                <li><a href="vendor-guide.html">Vendor Guide</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('home')}}">DSK-SEP</a>
                        </li>
                        <li class="menu-item-has-children">
                            <div class="contact_modal" style="background-color: #ffffff;">
                                <form action="" class="right d-flex justify-content-end" method="post" role="form">
                                    @csrf
                                    <input type="hidden" name="lanStatus" id="lanStatus" value="0" hidden>
                                    <a href="{{url('language')}}" class="lan_cng_btn " id="lanBtn">
                                        @php
                                            if (session()->has('language')){
                                                $lan = session()->get('language');
                                            }else{
                                                $lan = App::currentLocale();
                                            }
                                        @endphp
                                        <label class="lanEnOn {{$lan=='en'?'on':'off'}}">EN</label>
                                        <label class="lanBnOn {{$lan=='bn'?'on':'off'}}">BN</label>
                                    </a>
                                </form>

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <br><br>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                @php
                    $link = getCommunication()['links'];
                @endphp
                @foreach($link as $links)

                    <a href="{{$links->facebookLinks}}"><img
                            src="{{asset('assets/frontend/product/imgs/theme/icons/icon-facebook-white.svg')}}"
                            alt=""/></a>
                    <a href="{{$links->twitterLinks}}"><img
                            src="{{asset('assets/frontend/product/imgs/theme/icons/icon-twitter-white.svg')}}"
                            alt=""/></a>
                    <a href="{{$links->linkedInLinks}}"><img
                            src="{{asset('assets/frontend/product/imgs/theme/icons/icon-instagram-white.svg')}}"
                            alt=""/></a>

                    <a href="{{$links->youtubeLinks}}"><img
                            src="{{asset('assets/frontend/product/imgs/theme/icons/icon-youtube-white.svg')}}"
                            alt=""/></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
