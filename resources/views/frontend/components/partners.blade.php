<!-- development Partner -->
@if($partners)
    <div class="project_summary bg-white-cu content-100 en-partners">
        <div class="heading">
            <span class="heading-1">Development</span>
            <span class="heading-2">Partner</span>
        </div>
        <div class="row content-80 partner ">
            @foreach($partners as $partner)
                @if($partner->status == 1)
                    <div class="col-md-3 partners">
                        <a href="{{$partner->website}}"><img src="{{asset('storage/' .$partner->companyLogo)}}" alt=""></a>
                    </div>
                @endif
            @endforeach
        </div>
    </div><!-- Development Partner end -->
@endif
