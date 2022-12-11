<!-- footer -->
<div class="sub-container footer">
    <div class="footer-contents">
        <div class="footer-content left">
            <img src="{{asset('assets/frontend/img-icon/pksf.png')}}" alt="logo">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at dignissim nunc, id maximus ex.
                Etiam nec dignissim
                elit, at dignissim enim.</p>
            <div class="footer-social-ico">
                @php
                    $link = getCommunication()['links'];
                @endphp
                @foreach($link as $links)
                    <a href="{{$links->facebookLinks}}"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="{{$links->youtubeLinks}}"><i class="fa-brands fa-youtube"></i></a>
                    <a href="{{$links->twitterLinks}}"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="{{$links->linkedInLinks}}"><i class="fa-brands fa-linkedin"></i></a>
                @endforeach

            </div>
        </div>
        <div class="commom-links right">
            <div class="footer-content ">
                <h4>{{__('front.about')}}</h4>
                <a href="{{url('entrepreneurs')}}">
                    <p>{{__('front.entre')}}</p>
                </a>
                <a href="{{url('stories')}}">
                    <p>{{__('front.stories')}}</p>
                </a>
                <a href="{{url('terms')}}">
                    <p>{{__('front.terms')}}</p>
                </a>

            </div>
            <div class="footer-content">
                <h4>{{__('front.services')}}</h4>
                <a href="{{url('/')}}">
                    <p>{{__('front.ourProduct')}}</p>
                </a>
                <a href="#">
                    <p>{{__('front.promo')}}</p>
                </a>
                <a href="#">
                    <p>{{__('front.paymentMethod')}}</p>
                </a>
            </div>
            <div class="footer-content">
                <h4>{{__('front.others')}}</h4>
                <a href="{{url('faq')}}">
                    <p>{{__('front.contactUs')}}</p>
                </a>
                <a href="#">
                    <p>{{__('front.help')}}</p>
                </a>
                <a href="{{url('privacy')}}">
                    <p>{{__('front.privacyPolicy')}}</p>
                </a>
            </div>
        </div>
    </div>
</div> <!-- footer end -->

<button type="button" id="top-button"><i class="fa-solid fa-arrow-up"></i></button>
