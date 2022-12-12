<!-- working area -->
@if($area)
    <div class="project_summary bg-dark-cu content-100">
        <div class="heading">
            <span class="heading-1">{{__('front.workingArea1')}}</span>
            <span class="heading-2">{{__('front.workingArea2')}}</span>
        </div>
        <div class="row content-80 ">
            <div class="col-md-6 working-area">
                <img src="{{asset('storage/' . $area[0]->image)}}" alt="">
            </div>
            <div class="col-md-6 working-area">
                <h2>{{App::isLocale('bn')? $area[0]->area_bn:$area[0]->area}}</h2>
                <p>{{App::isLocale('bn')? $area[0]->description_bn:$area[0]->description}}}</p>
                <a href="{{url('workingarea')}}">
                    <button type="button" class="more-button">{{__('front.lrnMore')}}</button>
                </a>
            </div>
        </div>
    </div><!-- working area end -->
@endif
