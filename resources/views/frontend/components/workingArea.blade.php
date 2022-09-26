<!-- working area -->
@if($area)
    <div class="project_summary bg-dark-cu content-100">
        <div class="heading">
            <span class="heading-1">Working</span>
            <span class="heading-2">Area</span>
        </div>
            <div class="row content-80 ">
                <div class="col-md-6 working-area">
                    <img src="{{asset('storage/' . $area->image)}}" alt="">
                </div>
                <div class="col-md-6 working-area">
                    <h2>{{$area->area}}</h2>
                    <p>{{$area->description}}</p>
                    <a href="{{url('workingarea')}}">
                        <button type="button" class="more-button">Learn more</button>
                    </a>
                </div>
            </div>
    </div><!-- working area end -->
@endif
