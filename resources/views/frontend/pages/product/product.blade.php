@extends('layouts.frontend')
@section('title','Product')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-white-cu content-100 success">
        <div class="row content-80 border-bottom-">
            <div class="col-md-8 products products-show">
                <div class="card  product">
                    <img src="{{asset('storage/'.$product[0]->image)}}" alt="{{$product[0]->title}}"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            {{$product[0]->title}}
                            @if(strtotime($product[0]->updated_at)>strtotime('-3 days'))
                                <div class="new-badge">new</div>
                            @endif
                        </h2>
                        <div class="product-card-footer ">
                            <div class="category">
                                <div class="category-badge ">{{$product[0]->category}}</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                       <div>
                           {!! $product[0]->description !!}
                       </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 sub-container products-show">
                <div class="heading">
                    <span class="heading-1">Owner</span>
                    <span class="heading-2">Information</span>
                </div>
                <div class="card owner-info">


                    <div class="other-info">
                        <h3>Owner Name : <span>{{$product[0]->owner_name}}</span></h3>
                        <p>Email : <span>{{$product[0]->owner_email}}</span></p>
                        <p>Phone : <span>{{$product[0]->owner_contact}}</span></p>
                        <p>Address : <span>{{$product[0]->owner_address}}</span></p>
                    </div>
                </div>
                <div class="heading heading-">
                    <span class="heading-1">Inquiry</span>
                </div>
                <form action="{{url('message')}}" method="post" role="form">
                    @csrf
                    <div class="faq-input">
                        <label for="userName" class="form-label">Name (full name)</label>
                        <input type="text" name="clientName" class="form-control" id="userName" placeholder="Your name">
                    </div>
                    <div class="faq-input">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" name="clientMail" class="form-control" id="userEmail" placeholder="Email">
                    </div>
                    <div class="faq-input">
                        <label for="userContact" class="form-label">Phone number</label>
                        <input type="text" name="clientContact" class="form-control" id="userContact" placeholder="Phone">
                    </div>
                    <div class="faq-input">
                        <label for="userMsg" class="form-label">Message</label>
                        <textarea class="form-control" name="clientMessage" id="userMsg" rows="4"></textarea>
                    </div>
                    <div class="faq-input">
                        <button type="submit" class="more-button">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
