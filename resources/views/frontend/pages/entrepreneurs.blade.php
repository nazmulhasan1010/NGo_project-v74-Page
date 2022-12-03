@extends('layouts.frontend')
@section('title','Entrepreneurs')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $enterprises = getEnterprise('','all');
    @endphp

    <div class="project_summary bg-dark-cu content-100">
        <div class="row content-80 enterprise">
            @foreach($enterprises as $enterprise)
                @if($enterprise->status==1)
                    @if($enterprise->mapLink !== null)
                        <div class="col-md-4 enterprises">
                            <div class="en-location-map">
                                {!! $enterprise->mapLink !!}
                            </div>
                            <div class="info-field">
                                @php
                                    if (strlen($enterprise->title)>22){
                                       $title = substr($enterprise->title,0,22);
                                    }else{
                                        $title = $enterprise->title ;
                                    }
                                @endphp
                                <h2>{{$title}}</h2>
                                <p class="contact-num">{{$enterprise->contact}}</p>
                                <p>{{$enterprise->address}}</p>
                                <a href="#">
                                    <button type="button" data-link="{{ $enterprise->mapLink }}"
                                            class="more-button mapShow">View Map
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            <!-- map show modal -->
            <div class="modal fade" id="mapShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="fa-solid fa-location-dot"></i>
                            <i class="fa-solid fa-xmark modal-close"></i>
                        </div>
                        <div class="modal-body " id="modalBody">

                        </div>
                    </div>
                </div>
            </div> <!-- map show modal end -->
        </div>
    </div>

@endsection

