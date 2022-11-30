@extends('layouts.product')
@section('title','Product')
@push('onPage-css')
    <style>
        .sdm-category {
            display: none;
        }

        @media only screen and (max-width: 990px) {
            .sdm-category {
                display: block;
            }
        }

    </style>
@endpush
@section('content')
    @php
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md-3 d-none d-lg-block">
                    <div class="categories-dropdown-wrap style-2 font-heading mt-30">
                        @php
                            $categories = getCategories('','all');
                        @endphp
                        <div class="d-flex categori-dropdown-inner">
                            <ul>
                                <li><h5>{{__('front.categories')}}</h5></li>
                                @foreach($categories as $key=>$category)
                                    @if($key <=7)
                                        @php
                                            if (App::isLocale('bn')) {
                                                 $title = $category->title_bn;
                                            }else{
                                                $title = $category->title;
                                            }
                                        @endphp

                                        <li>
                                            <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}"
                                               style="text-transform: capitalize"> <img
                                                    src="{{asset('storage/'.$category->image)}}"
                                                    alt=""/>{{$title}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @if(count($categories)>7)
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach($categories as $key=>$category)
                                            @if($key >7)
                                                @php
                                                    if (App::isLocale('bn')) {
                                                         $title = $category->title_bn;
                                                    }else{
                                                        $title = $category->title;
                                                    }
                                                @endphp
                                                <li>
                                                    <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}" style="text-transform: capitalize">
                                                        <img
                                                            src="{{asset('storage/'.$category->image)}}"
                                                            alt=""/>{{$title}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories">
                                <span class="icon"></span>
                                <span class="heading-sm-1">{{__('front.show_more')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
                @php
                    $sliders = getProductSlider('','all');
                @endphp
                <div class="col-md-9">
                    <div class="home-slide-cover mt-30">
                        <div class="hero-slider-1 style-5 dot-style-1 dot-style-1-position-2">
                            @foreach($sliders as $slider)
                                @if($slider->status ==1)
                                    <div class="single-hero-slider single-animation-wrap"
                                         style="background-image: url({{asset('storage/'.$slider->image)}})">
                                        @if ($slider->title !== null && $slider->title_bn !== null || $slider->description !== null && $slider->description_bn !== null)
                                            <div class="slider-content"
                                                 style="background-color: rgba(255,255,255,0.50); width: 60%; padding: 20px; border-radius:10px;">
                                                @if($slider->title!==null && $slider->title_bn!==null )
                                                    @php
                                                        if (App::isLocale('bn')) {
                                                             $title = $slider->title_bn;
                                                        }else{
                                                            $title = $slider->title;
                                                        }
                                                    @endphp
                                                    <h1 class="display-2 mb-40">{{$title}}</h1>
                                                @endif
                                                @if($slider->description!==null && $slider->description_bn!==null )
                                                    @php
                                                        if (App::isLocale('bn')) {
                                                             $des = $slider->description_bn;
                                                        }else{
                                                            $des = $slider->description;
                                                        }
                                                    @endphp
                                                    <p class="mb-65">{{$des}}</p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="slider-arrow hero-slider-1-arrow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    categories--}}
    <section class="popular-categories section-padding  ">
        <div class="container wow animate__animated animate__fadeIn sdm-category ">
            <div class="section-title">
                <div class="title">
                    <h3>Categories</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                     id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-13.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Cake & Milk</a></h6>
                        <span>26 items</span>
                    </div>
                    <div class="card-2 bg-10 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-12.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Oganic Kiwi</a></h6>
                        <span>28 items</span>
                    </div>
                    <div class="card-2 bg-11 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-11.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Peach</a></h6>
                        <span>14 items</span>
                    </div>
                    <div class="card-2 bg-12 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-9.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Red Apple</a></h6>
                        <span>54 items</span>
                    </div>
                    <div class="card-2 bg-13 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-3.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Snack</a></h6>
                        <span>56 items</span>
                    </div>
                    <div class="card-2 bg-14 wow animate__animated animate__fadeInUp" data-wow-delay=".6s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-1.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Vegetables</a></h6>
                        <span>72 items</span>
                    </div>
                    <div class="card-2 bg-15 wow animate__animated animate__fadeInUp" data-wow-delay=".7s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-2.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Strawberry</a></h6>
                        <span>36 items</span>
                    </div>
                    <div class="card-2 bg-12 wow animate__animated animate__fadeInUp" data-wow-delay=".8s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-4.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Black plum</a></h6>
                        <span>123 items</span>
                    </div>
                    <div class="card-2 bg-10 wow animate__animated animate__fadeInUp" data-wow-delay=".9s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-13.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Custard apple</a></h6>
                        <span>34 items</span>
                    </div>
                    <div class="card-2 bg-12 wow animate__animated animate__fadeInUp" data-wow-delay="1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-14.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Coffe & Tea</a></h6>
                        <span>89 items</span>
                    </div>
                    <div class="card-2 bg-11 wow animate__animated animate__fadeInUp" data-wow-delay="0s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="shop-grid-right.html"><img
                                    src="{{asset('assets/frontend/product/imgs/shop/cat-15.png')}}" alt=""/></a>
                        </figure>
                        <h6><a href="shop-grid-right.html">Headphone</a></h6>
                        <span>87 items</span>
                    </div>
                </div>
            </div>
        </div>

        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{asset('assets/frontend/product/imgs/banner/banner-1.png')}}" alt=""/>
                            <div class="banner-text">
                                <h4>
                                    Everyday Fresh & <br/>Clean with Our<br/>
                                    Products
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <img src="{{asset('assets/frontend/product/imgs/banner/banner-2.png')}}" alt=""/>
                            <div class="banner-text">
                                <h4>
                                    Make your Breakfast<br/>
                                    Healthy and Easy
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <img src="{{asset('assets/frontend/product/imgs/banner/banner-3.png')}}" alt=""/>
                            <div class="banner-text">
                                <h4>The best Organic <br/>Products Online</h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--    popular product--}}
        <section class="product-tabs section-padding position-relative">
            @foreach($categories as $key=>$category)
                @php
                    $products = getProduct($category->id,'category');
                     if (App::isLocale('bn')) {
                         $catTitle = $category->title_bn;
                     }else{
                         $catTitle = $category->title;
                     }
                @endphp

                @if(count($products)>0)
                    <div class="container">
                        <div class="section-title style-2 wow animate__animated animate__fadeIn">
                            <h3 style="text-transform: capitalize;">{{$catTitle}}</h3>
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel"
                                 aria-labelledby="tab-one">
                                <div class="row product-grid-4">
                                    @foreach($products as $product)
                                        @php
                                            $image =  getProductImage($product->product_id);

                                            if (App::isLocale('bn')) {
                                                $title = $product->title_bn;
                                            }else{
                                                $title = $product->title;
                                            }
                                        @endphp
                                        {{-- product card--}}
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                                 data-wow-delay=".1s">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">
                                                            <img class="default-img"
                                                                 src="{{asset('storage/'.$image[0]->image)}}"
                                                                 alt=""/>
                                                            <img class="hover-img"
                                                                 src="{{asset('storage/'.$image[0]->image)}}"
                                                                 alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#quickViewModal"><i
                                                                class="fi-rs-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}">{{$catTitle}}</a>
                                                    </div>
                                                    <h2>
                                                        <a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">{{$title}}</a>
                                                    </h2>
                                                    <div>
                                                <span class="font-small text-muted">By
                                                    <a role="button">{{$product->owner_company}}</a></span>
                                                    </div>
                                                    <div class="product-card-bottom">
                                                        <div class="product-price">
                                                            <span>{{__('front.tk')}} {{$product->price}} </span>
                                                            <span
                                                                class="old-price">{{__('front.tk')}} {{$product->price+50}} </span>
                                                        </div>
                                                        <div class="add-cart">
                                                            <a class="add" href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}"><i
                                                                    class="fa-solid fa-eye"></i> View </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end product card-->
                                    @endforeach
                                </div>
                            </div>
                        </div><!--End tab-content-->
                    </div>
                @endif
            @endforeach
        </section>
    </section>
@endsection
