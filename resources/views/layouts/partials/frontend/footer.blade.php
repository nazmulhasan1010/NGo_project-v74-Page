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
                <h4>about</h4>
                <a href="{{url('entrepreneurs')}}">
                    <p>entrepreneurs</p>
                </a>
                <a href="{{url('stories')}}">
                    <p>success stories</p>
                </a>
                <a href="{{url('terms')}}">
                    <p>Terms & Condition</p>
                </a>

            </div>
            <div class="footer-content">
                <h4>services</h4>
                <a href="{{url('products')}}">
                    <p>Our Product</p>
                </a>
                <a href="#">
                    <p>Promo</p>
                </a>
                <a href="#">
                    <p>Payment Method</p>
                </a>
            </div>
            <div class="footer-content">
                <h4>others</h4>
                <a href="{{url('faq')}}">
                    <p>Contact Us</p>
                </a>
                <a href="#">
                    <p>Help</p>
                </a>
                <a href="{{url('privacy')}}">
                    <p>Privacy Policy</p>
                </a>
            </div>
        </div>
    </div>
</div> <!-- footer end -->

<button type="button" id="top-button"><i class="fa-solid fa-arrow-up"></i></button>
