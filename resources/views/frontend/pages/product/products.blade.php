@extends('layouts.frontend')
@section('title','Products')
@section('content')
    @include('layouts.partials.frontend.pageTitle')

    <div class="content-100 bg-white-cu faq-main">
        <div class="heading">
            <span class="heading-1">Our</span>
            <span class="heading-2">Products</span>
        </div>
        <div class="row content-80 products">
            <div class="col-md-4 p-2 d-flex">
                <div class="card  product">
                    <img src="{{asset('assets/test/product-1.png')}}" alt="Shoes"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            Special italian coffee beans!
                            <div class="new-badge">NEW</div>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi deleniti ea hic quaerat
                            quibusdam, ut?</p>
                        <div class="product-card-footer ">
                            <a href="{{url('product/1')}}">
                                <button type="button" class="more-button">See details</button>
                            </a>

                            <div class="category">
                                <div class="category-badge ">Fashion</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 d-flex">
                <div class="card product">
                    <img src="{{asset('assets/test/product-4.png')}}" alt="Shoes"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            Makeup equipments package!
                            <div class="new-badge">NEW</div>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam et iusto laboriosam
                            mollitia
                            quis veritatis?</p>
                        <div class="product-card-footer ">
                            <a href="{{url('product/1')}}">
                                <button type="button" class="more-button">See details</button>
                            </a>
                            <div class="category">
                                <div class="category-badge ">Fashion</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 d-flex">
                <div class="card product">
                    <img src="{{asset('assets/test/product-6.png')}}" alt="Shoes"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            Macbook 4 apple
                            <div class="new-badge">NEW</div>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequatur quaerat reiciendis
                            ullam
                            voluptatibus.</p>
                        <div class="product-card-footer ">
                            <a href="{{url('product/1')}}">
                                <button type="button" class="more-button">See details</button>
                            </a>
                            <div class="category">
                                <div class="category-badge ">Fashion</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 d-flex">
                <div class="card product">
                    <img src="{{asset('assets/test/product-5.png')}}" alt="Shoes"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            Sea fish
                            <div class="new-badge">NEW</div>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequatur quaerat reiciendis
                            ullam
                            voluptatibus.</p>
                        <div class="product-card-footer ">
                            <a href="{{url('product/1')}}">
                                <button type="button" class="more-button">See details</button>
                            </a>
                            <div class="category">
                                <div class="category-badge ">Fashion</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2 d-flex">
                <div class="card product">
                    <img src="{{asset('assets/test/product-3.png')}}" alt="Shoes"/>
                    <div class="card-body">
                        <h2 class="card-title">
                            Women long kurta!
                            <div class="new-badge">NEW</div>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequatur quaerat reiciendis
                            ullam voluptatibus.</p>
                        <div class="product-card-footer ">
                            <a href="{{url('product/1')}}">
                                <button type="button" class="more-button">See details</button>
                            </a>
                            <div class="category">
                                <div class="category-badge ">Fashion</div>
                                <div class="category-badge ">Products</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
