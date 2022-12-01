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
        $categories = getCategories('','all');
    @endphp
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md-3 d-none d-lg-block">
                    <div class="categories-dropdown-wrap style-2 font-heading mt-30">
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
                                                    <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}"
                                                       style="text-transform: capitalize">
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
                    @foreach($categories as $key=>$category)
                        @php
                            $catProduct = getProduct($category->id,'category');
                               if (App::isLocale('bn')) {
                                    $title = $category->title_bn;
                               }else{
                                   $title = $category->title;
                               }
                        @endphp
                        <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}"><img
                                        src="{{asset('storage/'.$category->image)}}" alt=""/></a>
                            </figure>
                            <h6>
                                <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}">{{$title}}</a>
                            </h6>
                            <span>{{count($catProduct)}} items</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    @foreach($categories as $key=>$category)
                        @if($key<3)
                            @php
                                $product = getProduct($category->id,'catCount');
                                 $catProduct = getProduct($category->id,'category');
                                if (App::isLocale('bn')) {
                                    $title = $category->title_bn;
                                }else{
                                    $title = $category->title;
                                }
                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0" style="position: relative">
                                    <img src="{{asset('assets/frontend/product/imgs/banner/banner-2.png')}}"
                                         alt=""/>
                                    <div class="banner-text">
                                        <h4 style="text-transform: capitalize">{{$title}}</h4>
                                        <p>{{__('front.total')}} {{count($catProduct)}}</p>
                                        <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}"
                                           class="btn btn-xs">{{__('front.shop_now')}} <i class="fi-rs-arrow-small-right"></i></a>
                                    </div>
                                    <img style="height:150px; width: 150px; position: absolute; bottom:20px; right: 20px"
                                         src="{{asset('storage/'.$category->image)}}" alt="">
                                </div>
                            </div>
                        @endif
                    @endforeach
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
                                                            <a class="add"
                                                               href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}"><i
                                                                    class="fa-solid fa-eye"></i> {{__('front.view')}} </a>
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
