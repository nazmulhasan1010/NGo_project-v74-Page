@extends('layouts.product')
@section('title','Product')
@push('onPage-css')
@endpush
@section('content')
    @php
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    @php
        if (App::isLocale('bn')) {
            $catTitle = $categoryName->title_bn;
        }else{
            $catTitle = $categoryName->title;
        }
    @endphp
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15" style="text-transform: capitalize; font-size:30px">{{$catTitle}}</h1>
                            <div class="breadcrumb">
                                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{__('front.home')}}</a>
                                <span></span> {{__('front.product')}} <span></span> {{$catTitle}}
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                @foreach($categories as $key=>$category)
                                    @if($key<3)
                                        @php
                                            if (App::isLocale('bn')) {
                                                $title = $category->title_bn;
                                            }else{
                                                $title = $category->title;
                                            }
                                        @endphp
                                        <li class="hover-up">
                                            <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}"><i
                                                    class="fi-rs-cross mr-10"></i>{{$title}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>{{__('front.we')}} {{__('front.found')}} <strong class="text-brand">{{count($products)}}</strong> {{__('front.items')}} {{__('front.for')}} {{__('front.you')}}!</p>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @foreach($products as $product)
                            <!-- product card-->
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
                                        @foreach($image as $key=>$images)
                                            @if($key=1)
                                                @php
                                                    $pImage = $images->image;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">
                                                <img class="default-img"
                                                     src="{{asset('storage/'.$pImage)}}"
                                                     alt=""/>
                                                <img class="hover-img"
                                                     src="{{asset('storage/'.$pImage)}}"
                                                     alt=""/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('products',['catName'=>$categoryName->title,'catId'=>encrypt($categoryName->id)])}}">{{$catTitle}}</a>
                                        </div>
                                        <h2>
                                            <a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">{{$title}}</a>
                                        </h2>
                                        <div>
                                                <span class="font-small text-muted">By <a
                                                        href="">{{$product->owner_company}}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{__('front.tk')}} {{$product->price}} </span>
                                                <span
                                                    class="old-price">{{__('front.tk')}} {{$product->price+50}} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end product card-->
                        @endforeach
                    </div>
                    <!--product grid-->
{{--                    <div class="pagination-area mt-20 mb-20">--}}
{{--                        <nav aria-label="Page navigation example">--}}
{{--                            <ul class="pagination justify-content-start">--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
                    <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">{{__('front.dayDeal')}}</h3>
                        </div>
                        @php
                            $randomProduct =  getProduct('', 'random');
                        @endphp
                        <div class="row">
                            @foreach($randomProduct as $key=>$product)
                                @if($key<4)
                                    @php
                                        $image =  getProductImage($product->product_id);
                                        if (App::isLocale('bn')) {
                                            $title = $product->title_bn;
                                        }else{
                                            $title = $product->title;
                                        }
                                    @endphp
                                    <!-- deal product -->
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="product-cart-wrap style-2">
                                            @foreach($image as $key=>$images)
                                                @if($key=1)
                                                    @php
                                                        $pImage = $images->image;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <div class="product-img-action-wrap">
                                                <div class="product-img">
                                                    <a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">
                                                        <img src="{{asset('storage/'.$pImage)}}" alt=""/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="deals-content">
                                                    <h2><a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">{{$title}}</a></h2>
                                                    <div>
                                                    <span class="font-small text-muted">By <a
                                                            href="">{{$product->owner_company}}</a></span>
                                                    </div>
                                                    <div class="product-card-bottom">
                                                        <div class="product-price">
                                                            <span>{{__('front.tk')}} {{$product->price}} </span>
                                                            <span
                                                                class="old-price">{{__('front.tk')}} {{$product->price+50}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- deal product end -->
                                @endif
                            @endforeach
                        </div>
                    </section>
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">{{__('front.categories')}}</h5>
                        <ul>
                            @foreach($categories as $category)
                                @php
                                    $catProduct = getProduct($category->id,'category');
                                @endphp
                                @if(count($catProduct)>0)
                                    @php
                                        if (App::isLocale('bn')) {
                                            $catTitle = $category->title_bn;
                                        }else{
                                            $catTitle = $category->title;
                                        }
                                    @endphp
                                    <li>
                                        <a href="{{route('products',['catName'=>$category->title,'catId'=>encrypt($category->id)])}}">
                                            <img src="{{asset('storage/'.$category->image)}}" alt=""/>
                                            {{$catTitle}}
                                        </a>
                                        <span class="count">{{count($catProduct)}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @php
                        $newProduct = getProduct('','new');
                    @endphp
                        <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">{{__('front.newProduct')}}</h5>

                        @foreach($newProduct as $key=>$product)
                            @if($key<3)
                                @php
                                    $image =  getProductImage($product->product_id);
                                    if (App::isLocale('bn')) {
                                        $productTitle = $product->title_bn;
                                    }else{
                                        $productTitle = $product->title;
                                    }
                                @endphp
                                    <!-- new product -->
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{asset('storage/'.$image[0]->image)}}" alt="#"/>
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">{{$productTitle}}</a></h5>
                                        <p class="price mb-0 mt-5">{{__('front.tk')}} {{$product->price}}</p>
                                    </div>
                                </div><!-- new product end -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
