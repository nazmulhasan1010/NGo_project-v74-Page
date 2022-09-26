<!-- slider -->
@if($slider)
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach($slider as $kay=>$sliders)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$kay}}"
                        class="{{$kay==0?'active':''}}"
                        aria-current="true" aria-label="Slide {{$kay}}"></button>
            @endforeach

        </div>
        <div class="carousel-inner">
            @foreach($slider as $kay=>$sliders)
                @if($sliders->status===1)
                    <div class="carousel-item {{ $kay=== 0 ? 'active' : '' }} ">
                        <div class="content" style="background-image: linear-gradient(rgba(51, 51, 51, 0.486),
                   rgba(51, 51, 51, 0.486)),url('{{asset('storage/' . $sliders->image)}}');">
                            @if($sliders->title&&$sliders->description)
                                <div class="modal-content">
                                    <div class="content-text">
                                        <h1>{{$sliders->title}}</h1>
                                        <h3>{{$sliders->description}}</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-prev-icon" aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-next-icon" aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
            <span class="visually-hidden"></span>
        </button>
    </div> <!-- slider end -->
@endif
