@extends('layouts.frontend')
@section('title','Photos')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $image = getImage();
        $row = count(json_decode($image, true));
        $year22='';
        for ($i = 0; $i < $row; $i++){
            if (date("Y", strtotime($image[$i]->updated_at))==2022){
                $year22=true;
                break;
            }
        }
        $year23='';
         for ($i = 0; $i < $row; $i++){
            if (date("Y", strtotime($image[$i]->updated_at))==2023){
                $year23=true;
                break;
            }
        }
         $year24='';
         for ($i = 0; $i < $row; $i++){
            if (date("Y", strtotime($image[$i]->updated_at))==2024){
                $year24=true;
                break;
            }
        }
         $year25='';
         for ($i = 0; $i < $row; $i++){
            if (date("Y", strtotime($image[$i]->updated_at))==2025){
                $year25=true;
                break;
            }
        }
         if (session()->has('language')) {
            $lanCode = session()->get('language');
            App::setLocale($lanCode);
         }
    @endphp

    @if($image)
        <!-- photos -->
        <div class="project_summary bg-dark-cu content-100 shadow-light">
            <div class="heading">
                <span class="heading-1">{{__('front.photoGallery1')}}</span>
                <span class="heading-2">{{__('front.photoGallery2')}}</span>
            </div>

            <div class="row content-80 ">
                @if($year25==true)
                    <div class="col-md-12 sub-container gallery gallery-coll">
                        <div class="heading coll-heading">
                            <div class="left">
                                <span class="heading-1">2025</span>
                                <span class="heading-2">{{__('front.photoGallery2')}}</span>
                                <div class="counter">
                                    <span class="total-photos">30</span><span>{{__('front.photoGallery1')}}</span>
                                </div>
                            </div>
                            <div class="right">
                                <i class="fa-solid fa-circle-chevron-down"></i>
                            </div>
                        </div>
                        <div class="row phptos ">
                            @foreach($image as $images)
                                @php
                                    $year = date("Y", strtotime($images->updated_at));
                                @endphp
                                @if($images->status == 1 && $year == 2025)
                                    <div class="col-md-3 gallery-image">
                                        <img src="{{asset('storage/'.$images->image)}}" alt="gallery">
                                        <input type="hidden"
                                               value="{{$images->title}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($year24==true)
                    <div class="col-md-12 sub-container gallery gallery-coll">
                        <div class="heading coll-heading">
                            <div class="left">
                                <span class="heading-1">2024</span>
                                <span class="heading-2">{{__('front.photoGallery2')}}</span>
                                <div class="counter">
                                    <span class="total-photos">30</span><span>{{__('front.photoGallery1')}}</span>
                                </div>
                            </div>
                            <div class="right">
                                <i class="fa-solid fa-circle-chevron-down"></i>
                            </div>
                        </div>
                        <div class="row phptos ">
                            @foreach($image as $images)
                                @php
                                    $year = date("Y", strtotime($images->updated_at));
                                @endphp
                                @if($images->status == 1 && $year == 2024)
                                    <div class="col-md-3 gallery-image">
                                        <img src="{{asset('storage/'.$images->image)}}" alt="gallery">
                                        <input type="hidden"
                                               value="{{$images->title}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($year23==true)
                    <div class="col-md-12 sub-container gallery gallery-coll">
                        <div class="heading coll-heading">
                            <div class="left">
                                <span class="heading-1">2023</span>
                                <span class="heading-2">{{__('front.photoGallery2')}}</span>
                                <div class="counter">
                                    <span class="total-photos">30</span><span>{{__('front.photoGallery1')}}</span>
                                </div>
                            </div>
                            <div class="right">
                                <i class="fa-solid fa-circle-chevron-down"></i>
                            </div>
                        </div>
                        <div class="row phptos ">
                            @foreach($image as $images)
                                @php
                                    $year = date("Y", strtotime($images->updated_at));
                                @endphp
                                @if($images->status == 1 && $year == 2023)
                                    <div class="col-md-3 gallery-image">
                                        <img src="{{asset('storage/'.$images->image)}}" alt="gallery">
                                        <input type="hidden"
                                               value="{{$images->title}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($year22===true)
                    <div class="col-md-12 sub-container gallery gallery-coll">
                        <div class="heading coll-heading">
                            <div class="left">
                                <span class="heading-1">2022</span>
                                <span class="heading-2">{{__('front.photoGallery2')}}</span>
                                <div class="counter">
                                    <span class="total-photos">30</span><span>{{__('front.photoGallery1')}}</span>
                                </div>
                            </div>
                            <div class="right">
                                <i class="fa-solid fa-circle-chevron-down"></i>
                            </div>
                        </div>
                        <div class="row phptos ">
                            @foreach($image as $images)
                                @php
                                    $year = date("Y", strtotime($images->updated_at));
                                @endphp
                                @if($images->status == 1 && $year == 2022)
                                    <div class="col-md-3 gallery-image">
                                        <img src="{{asset('storage/'.$images->image)}}" alt="gallery">
                                        <input type="hidden"
                                               value="{{$images->title}}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div><!-- photos end -->
    @endif


    <!-- photo show modal -->
    <div class="modal fade" id="photoShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa-solid fa-image"></i>
                    <i class="fa-solid fa-xmark modal-close"></i>
                </div>
                <div class="modal-body" id="modalBody">
                    <img src="" alt="">
                </div>
                <p class="img-description"></p>
            </div>
        </div>
    </div> <!-- photo show modal end -->
@endsection
