<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                {{__('front.slogan')}} <br />
                                {{__('front.slogan2')}}
                            </h2>
                            <p class="mb-45"> {{__('front.yourNeed')}} <span class="text-brand"> DSK</span></p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="{{__('front.yourEmail')}}" />
                                <button class="btn" type="submit">{{__('front.subscribe')}}</button>
                            </form>
                        </div>
                        <img src="{{asset('assets/frontend/product/imgs/banner/banner-9.png')}}" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-1.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('front.bestPrice')}}</h3>
                            <p>{{__('front.order')}} {{__('front.tk')}}500 {{__('front.or')}} {{__('front.more')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-2.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('front.freeDeliver')}}</h3>
                            <p>{{__('front.24/7service')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-3.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('front.greatDeal')}}</h3>
                            <p>{{__('front.whenSignUp')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-4.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('front.wideAssortment')}}</h3>
                            <p>{{__('front.discounts')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-5.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('front.easyReturns')}}</h3>
                            <p>{{__('front.within30Days')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-6.svg')}}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('front.safeDelivery')}}</h3>
                            <p>{{__('front.within30Days')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">Copyright © Designed & Developed by <strong class="text-brand">USS</strong> 2022</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">

                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                @php
                    $link = getCommunication()['links'];
                @endphp
                <div class="mobile-social-icon">
                    <a href="{{$link[0]->facebookLinks}}"><img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-facebook-white.svg')}}" alt=""/></a>
                    <a href="{{$link[0]->twitterLinks}}"><img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-twitter-white.svg')}}" alt=""/></a>
                    <a href=""{{$link[0]->linkedInLinks}}><img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-instagram-white.svg')}}" alt=""/></a>
                    <a href="{{$link[0]->youtubeLinks}}"><img src="{{asset('assets/frontend/product/imgs/theme/icons/icon-youtube-white.svg')}}" alt=""/></a>
                </div>
            </div>
        </div>
    </div>
</footer>
