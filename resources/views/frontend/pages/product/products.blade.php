@extends('layouts.frontend')
@section('title','Products')
@section('content')
    @php
        $product = getProduct('all');
    @endphp
    @include('layouts.partials.frontend.pageTitle')

    <div class="content-100 bg-white-cu faq-main">
        <div class="heading">
            <span class="heading-1">Our</span>
            <span class="heading-2">Products</span>
        </div>
        <div class="row content-80 products">
            @foreach($product as $products)
                @if($products->status===1)
                    <div class="col-md-4 p-2 d-flex">
                        <div class="card  product">
                            <img src="{{asset('storage/'.$products->image)}}" alt="{{$products->title}}"/>
                            <div class="card-body">
                                <h2 class="card-title">
                                    @php
                                        if (strlen($products->title)>22){
                                           $title = substr($products->title,0,22).'...';
                                        }else{
                                            $title = $products->title ;
                                        }
                                    @endphp
                                    {{$title}}
                                    @if(strtotime($products->updated_at)>strtotime('-3 days'))
                                        <div class="new-badge">new</div>
                                    @endif

                                </h2>
                                @php
                                    if (strlen($products->description)>130){
                                       $description = substr($products->description,0,130).'...';
                                    }else{
                                        $description = $products->description ;
                                    }
                                @endphp
                                <p>{!! $description !!}</p>
                                <div class="product-card-footer ">
                                    <a href="{{url('product/'.$products->id)}}">
                                        <button type="button" class="more-button">See details</button>
                                    </a>

                                    <div class="category">
                                        <div class="category-badge ">{{$products->category}}</div>
                                        <div class="category-badge ">Products</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
