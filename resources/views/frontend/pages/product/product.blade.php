@extends('layouts.frontend')
@section('title','Product')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    <div class="project_summary bg-white-cu content-100 success">
        <div class="row content-80 border-bottom-">
            <div class="col-md-8 products products-show">
                <div class="card  product">
                    <img src="{{asset('assets/test/product-1.png')}}" alt="Shoes"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            Special italian coffee beans!
                            <div class="new-badge">NEW</div>
                        </h2>
                        <div class="product-card-footer ">
                            <div class="category">
                                <div class="category-badge ">Fashion</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad amet aspernatur autem deserunt
                            dolorem doloribus fuga fugit ipsa ipsum labore nemo nisi pariatur praesentium quod sapiente,
                            voluptas. Ab accusantium aliquid aspernatur beatae consequatur culpa cum deserunt dolorum ea
                            eum eveniet fuga fugit harum in inventore labore laudantium modi mollitia, nam neque
                            officia, optio perferendis possimus qui quos reiciendis repellat sequi sit sunt ullam
                            voluptas voluptate voluptates voluptatum. Adipisci aliquid amet asperiores aspernatur at
                            commodi distinctio dolorum earum eius eos est excepturi expedita facere id illo incidunt
                            maxime minus molestias nam odit quae quam quidem, quisquam sapiente tempore temporibus
                            veniam.</p>
                        <strong>Product details</strong>
                        <ul>
                            <li>Brand : ZARA</li>
                            <li>Bspernatur at commodi distinctio</li>
                            <li>Color : Red,Black,Pink,Hot Pink</li>
                            <li>Stock : 150</li>
                            <li>Puae quam quidem, quisquam</li>
                            <li>Wspernatur at commodi</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sub-container products-show">
                <div class="heading">
                    <span class="heading-1">Owner</span>
                    <span class="heading-2">Information</span>
                </div>
                <div class="card owner-info">
                    <img src="{{asset('assets/test/logo.png')}}" alt="">

                    <div class="other-info">
                        <h3>Owner Name : <span>Kamrul Hasan</span></h3>
                        <p>Email : <span>example@gmail.com</span></p>
                        <p>Phone : <span>01693898048</span></p>
                        <p>Address : <span>77/3 Mirpur block D</span></p>
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
