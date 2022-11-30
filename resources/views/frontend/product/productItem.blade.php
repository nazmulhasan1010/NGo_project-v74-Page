@extends('layouts.product')
@section('title','Product')
@push('onPage-css')
@endpush
@section('content')
    @php
        $productImages = getProductImage($products[0]->product_id);
        if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
        }
    @endphp
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="">Product</a> <span></span> {{substr($products[0]->title,0,10)}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                @foreach($productImages as $productImage)
                                                    <figure class="border-radius-10">
                                                        <img src="{{asset('storage/'.$productImage->image)}}"
                                                             alt="product image"/>
                                                    </figure>
                                                @endforeach
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails">
                                                @foreach($productImages as $productImage)
                                                    <div><img src="{{asset('storage/'.$productImage->image)}}"
                                                              alt="product image"/></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    @php
                                        if (App::isLocale('bn')) {
                                            $title = $products[0]->title_bn;
                                            $des = $products[0]->description_bn;
                                            if (strlen($products[0]->description_bn)>500){
                                                $desSort = substr($products[0]->description_bn,0,500).'...';
                                            }else{
                                                $desSort = $products[0]->description_bn ;
                                            }
                                        }else{
                                            $title = $products[0]->title;
                                            $des = $products[0]->description;
                                            if (strlen($products[0]->description)>500){
                                                $desSort = substr($products[0]->description,0,500).'...';
                                            }else{
                                                $desSort = $products[0]->description ;
                                            }
                                        }
                                    @endphp
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                            <span class="stock-status out-stock"> Sale Off </span>
                                            <h2 class="title-detail">{{$title}}</h2>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left">
                                                    <span
                                                        class="current-price text-brand">{{__('front.tk')}} {{$products[0]->price}}
                                                    </span>
                                                    <span>
{{--                                                        <span class="save-price font-md color3 ml-15">26% Off</span>--}}
                                                        <span
                                                            class="old-price font-md ml-15">{{__('front.tk')}} {{$products[0]->price+60}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <p class="font-lg">{!! $desSort !!}</p>
                                            </div>
                                            <div class="font-xs">
                                                <ul class="mr-50 float-start">
                                                    <li>Stock:
                                                        <span class="in-stock text-brand ml-5">{{$products[0]->stock}} Items In Stock</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="detail-extralink mb-50">
                                                <div class="product-extra-link2">
                                                    <button type="submit"
                                                            class="button button-add-to-cart callNowButton">
                                                        <i class="fa-solid fa-phone"></i>Call Now
                                                    </button>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                       href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn hover-up"
                                                       href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                                   href="#Description">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                                   href="#Additional-info">Additional info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab"
                                                   href="#Vendor-info">Vendor</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">{{$des}}</div>
                                            </div>
                                            <div class="tab-pane fade" id="Additional-info">
                                                {!! $products[0]->additional_info !!}
                                            </div>
                                            <div class="tab-pane fade" id="Vendor-info">
                                                <div class="vendor-logo d-flex mb-30">
                                                    <img style="height: 30px; width: 30px"
                                                         src="{{asset('storage/'.$products[0]->owner_company_logo)}}"
                                                         alt=""/>
                                                    <div class="vendor-name ml-15">
                                                        <h6><a href="#">{{$products[0]->owner_company}}</a></h6>
                                                        <p>Best seller</p>
                                                    </div>
                                                </div>
                                                <h5>Call to buy this product</h5>
                                                <br>
                                                <table>
                                                    <tr>
                                                        <th><h6>Owner Name</h6></th>
                                                        <td>{{$products[0]->owner_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th><h6>Address</h6></th>
                                                        <td>{{$products[0]->owner_address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th><h6>Contact Seller</h6></th>
                                                        <td>{{$products[0]->owner_contact}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th><h6>Seller Email</h6></th>
                                                        <td>{{$products[0]->owner_email}}</td>
                                                    </tr>
                                                </table>
                                                <div class="d-flex mb-55">
                                                    <div class="mr-30">
                                                        <p class="text-brand font-xs">Rating</p>
                                                        <h4 class="mb-0">92%</h4>
                                                    </div>
                                                    <div class="mr-30">
                                                        <p class="text-brand font-xs">Ship on time</p>
                                                        <h4 class="mb-0">100%</h4>
                                                    </div>
                                                    <div>
                                                        <p class="text-brand font-xs">Chat response</p>
                                                        <h4 class="mb-0">89%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $relatedProducts = getProduct($products[0]->category, 'category');
                                @endphp
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Related products</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach($relatedProducts as $key=>$product)
                                                @if($key<4)
                                                    @php
                                                        $image =  getProductImage($product->product_id);
                                                        if (App::isLocale('bn')) {
                                                            $title = $product->title_bn;
                                                        }else{
                                                            $title = $product->title;
                                                        }
                                                    @endphp
                                                        <!-- related product  -->
                                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                        <div class="product-cart-wrap hover-up">
                                                            <div class="product-img-action-wrap">
                                                                <div class="product-img product-img-zoom">
                                                                    <a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}" tabindex="0">
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
                                                                <h2><a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}" tabindex="0">{{$title}}</a></h2>
                                                                <div class="product-price">
                                                                    <span>{{__('front.tk')}} {{$product->price}}</span>
                                                                    <span class="old-price">{{__('front.tk')}} {{$product->price+40}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- related product end -->
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $categories = getCategories('', 'all');
                        @endphp
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Category</h5>
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
                                <h5 class="section-title style-1 mb-30">New products</h5>
                                @foreach($newProduct as $key=>$product)
                                    @if($key<3)
                                        @php
                                            $image =  getProductImage($product->product_id);
                                        @endphp
                                            <!-- new product -->
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="{{asset('storage/'.$image[0]->image)}}" alt="#"/>
                                            </div>
                                            <div class="content pt-10">
                                                <h5><a href="{{route('productItem',['product'=>$product->title,'productId'=>encrypt($product->id)])}}">Chen Cardigan</a></h5>
                                                <p class="price mb-0 mt-5">{{$product->price}} BDT</p>
                                            </div>
                                        </div><!-- new product end -->
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('onPage-js')
    <script type="text/javascript">
        $('.callNowButton').click(function () {
            $('.tab-pane').removeClass('active show')
            $('#Vendor-info').addClass('active show').scrollTop(0)
            $('.nav-link').removeClass('active')
            $('#Vendor-info-tab').addClass('active')
            $('html, body').animate({
                'scrollTop': $("#Vendor-info").position().top - 120
            });
        });
    </script>

@endpush
