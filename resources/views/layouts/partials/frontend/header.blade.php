<!-- contact modal -->
@php
    $communication = getCommunication();
@endphp
<div class="contact_modal">
    <div class="left">

        @foreach($communication['contact'] as $contacts)
            <p><i class="fa-solid fa-envelope"></i>{{$contacts->contactMail}} </p>
            <p><i class="fa-solid fa-phone"></i> {{$contacts->contactNumber}}</p>
        @endforeach
    </div>
    <form action="" class="right d-flex justify-content-end" method="post" role="form">
        @csrf
        <input type="hidden" name="lanStatus" id="lanStatus" value="0" hidden>
        <button type="button" class="lan_cng_btn" id="lanBtn">
            @php
               if (session()->has('language')){
                   $lan = session()->get('language');
               }else{
                   $lan = App::currentLocale();
               }
            @endphp
            <label class="lanEnOn {{$lan=='en'?'on':'off'}}">EN</label>
            <label class="lanBnOn {{$lan=='bn'?'on':'off'}}">BN</label>
        </button>
    </form>
</div><!-- contact modal end -->

<!-- header  -->
<header class="header d-flex justify-content-between " id="header">
    <div class="header_content left">
        @php
            $logo = getLogo('primary');
            $logoImg ='assets/frontend/img-icon/pksf.jpeg';
            if (count($logo)>0){
                $logoImg = 'storage/'. $logo[0]->image;
            }
            $logo_2 = getLogo('secondary');
            $logoImg_2 ='assets/frontend/img-icon/ngf_logo.jpg';
            if (count($logo_2)>0){
                $logoImg_2 = 'storage/'. $logo_2[0]->image;
            }
        @endphp
        <a href="{{url('/')}}"><img src="{{asset($logoImg)}}" alt="" class="logo"></a>
        <a href="#"><img src="{{asset($logoImg_2)}}" alt="" class="logo logo-2"></a>
    </div>
    <div class="header_content menu_bar" id="menuBar">
        <i class="fa-solid fa-bars menu-ico-more" id="menuShow"></i>
        <!-- <i class="fa-solid fa-ellipsis-vertical menu-ico"></i> -->
        <div class="menus">
            <div class="menu-head">
                <img src="{{asset('assets/frontend/img-icon/pksf.jpeg')}}" alt="">
                <i class="fa-solid fa-xmark " id="menuClose"></i>
            </div>

            <ul>
                <li class="active">
                    <div class="option-head">{{__('front.about')}}<i class="fa-solid fa-caret-right"></i></div>
                    <div class="option-main">
                        <div class="menu-option">
                            <a href="{{url('overview')}}">
                                <div class="options">{{__('front.overview')}}</div>
                            </a>
                            <a href="{{url('goal')}}">
                                <div class="options">{{__('front.goal')}}</div>
                            </a>
                            <a href="{{url('workingarea')}}">
                                <div class="options">{{__('front.area')}}</div>
                            </a>
                            <a href="{{url('mission')}}">
                                <div class="options">{{__('front.mission')}}</div>
                            </a>
                            <a href="{{url('gallery/photos')}}">
                                <div class="options">{{__('front.imgG')}}</div>
                            </a>
                        </div>
                    </div>
                </li>
                <a href="{{url('entrepreneurs')}}">
                    <li>
                        <div class="option-head">{{__('front.entre')}}</div>
                    </li>
                </a>

                <a href="{{url('stories')}}">
                    <li>
                        <div class="option-head">{{__('front.stories')}} </div>
                    </li>
                </a>

                <a href="{{url('/faq')}}">
                    <li>
                        <div class="option-head">FAQ</div>
                    </li>
                </a>
                <a href="{{url('/products')}}">
                    <li>
                        <div class="option-head">products</div>
                    </li>
                </a>
                <a href="{{url('events')}}">
                    <li>
                        <div class="option-head">{{__('front.events')}}</div>
                    </li>
                </a>
                <a href="{{url('newses')}}">
                    <li>
                        <div class="option-head">{{__('front.news')}}</div>
                    </li>
                </a>
                <a href="{{url('blogs')}}">
                    <li>
                        <div class="option-head">{{__('front.blog')}}</div>
                    </li>
                </a>
                <a href="{{url('notices')}}">
                    <li>
                        <div class="option-head">{{__('front.notice')}}</div>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</header><!-- header end -->
