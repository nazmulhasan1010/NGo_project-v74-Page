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
            $logo_2 = getLogo('secondary');
        @endphp
        @if (count($logo)>0)
            @if($logo[0]->status===1)
                <a href="{{url('/')}}"><img src="{{asset('storage/'. $logo[0]->image)}}" alt="" class="logo"></a>
            @endif
        @endif
        @if (count($logo_2)>0)
            @if($logo_2[0]->status===1)
                <a href="#"><img src="{{asset('storage/'. $logo_2[0]->image)}}" alt="" class="logo logo-2"></a>
            @endif
        @endif
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
                <a href="{{url('/')}}">
                    <li class="options-menu {{ Request::is('/')? 'active' : ''}}">
                        <div class="option-head">{{__('front.home')}}</div>
                    </li>
                </a>

                @if (Request::is('overview')||Request::is('goal')||Request::is('mission')||Request::is('entrepreneurs')||Request::is('stories')||Request::is('faq'))
                    @php
                        $aboutSta = 'active';
                    @endphp
                @else
                    @php
                        $aboutSta = '';
                    @endphp
                @endif

                <li class="options-menu {{$aboutSta}}">
                    <div class="option-head">{{__('front.about')}}<i class="fa-solid fa-caret-right"></i></div>
                    <div class="option-main">
                        <div class="menu-option">
                            <a href="{{url('overview')}}">
                                <div
                                    class="options {{ Request::is('overview')? 'options-active' : ''}}">{{__('front.overview')}}</div>
                            </a>
                            <a href="{{url('goal')}}">
                                <div
                                    class="options {{ Request::is('goal')? 'options-active' : ''}}">{{__('front.goal')}}</div>
                            </a>
                            <a href="{{url('mission')}}">
                                <div
                                    class="options {{ Request::is('mission')? 'options-active' : ''}}">{{__('front.mission')}}</div>
                            </a>
                            <a href="{{url('entrepreneurs')}}">
                                <div
                                    class="options {{ Request::is('entrepreneurs')? 'options-active' : ''}}">{{__('front.entre')}}</div>
                            </a>
                            <a href="{{url('stories')}}">
                                <div
                                    class="options {{ Request::is('stories')? 'options-active' : ''}}">{{__('front.stories')}} </div>
                            </a>
                            <a href="{{url('faq')}}">
                                <div class="options {{ Request::is('faq')? 'options-active' : ''}}">FAQ</div>
                            </a>
                        </div>
                    </div>
                </li>
                <a href="{{url('gallery/photos')}}">
                    <li class="options-menu {{ Request::is('gallery/photos')? 'active' : ''}}">
                        <div class="option-head">{{__('front.imgG')}}</div>
                    </li>
                </a>
                {{--                <a href="{{url('workingarea')}}">--}}
                {{--                    <li class="{{ Request::is('knowledge')? 'active' : ''}}">--}}
                {{--                        <div class="option-head">Knowledge</div>--}}
                {{--                    </li>--}}
                {{--                </a>--}}
                <li class="options-menu {{ Request::is('knowledge*')? 'active' : ''}}">
                    <div class="option-head">{{__('front.knowledge')}}<i class="fa-solid fa-caret-right"></i></div>
                    @if(count(getKnowledge('','catName','',''))>0)
                        <div class="option-main">
                            <div class="menu-option">
                                @foreach(getKnowledge('','catName','','') as $category)
                                    <a href="{{url('knowledge/'.$category->category)}}">
                                        <div class="options {{ Request::is('knowledge/'.$category->category)? 'options-active' : ''}}">{{$category->category}}</div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </li>
                <a href="#capacityBuilding">
                    <li class=" options-menu {{ Request::is('#capacityBuilding')? 'active' : ''}}">
                        <div class="option-head">{{__('front.activity')}} </div>
                    </li>
                </a>
                <a href="{{url('/products')}}">
                    <li class=" options-menu {{ Request::is('products')? 'active' : ''}}">
                        <div class="option-head">{{__('front.product')}}</div>
                    </li>
                </a>
                <a href="{{url('workingarea')}}">
                    <li class=" options-menu {{ Request::is('workingarea')? 'active' : ''}}">
                        <div class="option-head">GIS</div>
                    </li>
                </a>

                <a href="{{url('events')}}">
                    <li class=" options-menu {{ Request::is('events')? 'active' : ''}}{{Request::is('events/')? 'active' : ''}}">
                        <div class="option-head">{{__('front.events')}}</div>
                    </li>
                </a>
                {{--                <a href="{{url('newses')}}">--}}
                {{--                    <li>--}}
                {{--                        <div class="option-head">{{__('front.news')}}</div>--}}
                {{--                    </li>--}}
                {{--                </a>--}}
                <a href="{{url('blogs')}}">
                    <li class=" options-menu {{  Request::is('blogs')? 'active' : ''}}">
                        <div class="option-head">{{__('front.blog')}}</div>
                    </li>
                </a>
                <a href="{{url('notices')}}">
                    <li class=" options-menu {{ Request::is('notices')? 'active' : ''}}">
                        <div class="option-head">{{__('front.notice')}}</div>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</header><!-- header end -->
