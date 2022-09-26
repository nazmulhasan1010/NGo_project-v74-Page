@extends('layouts.frontend')
@section('title','FAQ')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $faq = getFaq();
    @endphp

    <!-- FAQ -->
    <div class="content-100 bg-white-cu faq-main">
        <div class="row content-80  faq-field">
            <div class="col-md-6 faq-fields qna sub-container">
                <div class="heading">
                    <span class="heading-1">QNA</span>
                </div>
                @foreach($faq as $faqs)
                    @if($faqs->status == 1)
                        <div class="faq-qna">
                            <div class="faq-qu"><span>{{$faqs->questions}}</span> <i
                                    class="fa-solid fa-plus"></i>
                            </div>

                            <div class="faq-ans">{{$faqs->answers}}</div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 faq-fields sub-container input">
                <div class="heading">
                    <span class="heading-1">Have a</span>
                    <span class="heading-2">Questions?</span>
                </div>
                <form action="{{url('message')}}" method="post" role="form">
                    @csrf
                    <div class="faq-input">
                        <label for="userName" class="form-label">Your Name</label>
                        <input type="text" name="clientName" class="form-control" id="userName" placeholder="Your name">
                    </div>
                    <div class="faq-input">
                        <label for="userEmail" class="form-label">Your Email address</label>
                        <input type="email" name="clientMail" class="form-control" id="userEmail" placeholder="Email">
                    </div>
                    <div class="faq-input">
                        <label for="userMsg" class="form-label">Your Message</label>
                        <textarea class="form-control" name="clientMessage" id="userMsg" rows="4"></textarea>
                    </div>
                    <div class="faq-input">
                        <button type="submit" class="more-button">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- FAQ end -->


@endsection
