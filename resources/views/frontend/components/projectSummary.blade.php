<!-- project summary -->
<div class="project_summary bg-white-cu content-100">
    <div class="heading">
        <span class="heading-1">{{__('front.projectSummary1')}}</span>
        <span class="heading-2">{{__('front.projectSummary2')}}</span>
    </div>
    <div class="row content-80">
        @php
            $row = count(json_decode($abouts, true));
            $overView = $goal = $mission ='';
        @endphp
        @if ($row > 0)
            @for ($i = 0; $i < $row; $i++)
                @php
                    $image = $abouts[$i]->image;
                       if ($abouts[$i]->project_overview !== null && $abouts[$i]->project_overview_bn !== null){
                             if (App::isLocale('bn')) {
                                   $overView = $abouts[$i]->project_overview_bn;
                             }else{
                                  $overView = $abouts[$i]->project_overview;
                             }
                           break;
                       }else {
                           $overView = '';
                       }
                @endphp
            @endfor
        @endif
        @if($overView!=='')
            @php
                  if (strlen($overView)>120){
                     $overView_ = substr($overView,0,120);
                  }else{
                      $overView_ = $overView ;
                  }
            @endphp
            <div class="col-md-4 summary">
                <div class="icon">
                    <img src="{{asset('storage/'.$image)}}" alt="summary">
                </div>
                <h2>{{__('front.projectOverview')}}</h2>
                <p>{!! $overView_ !!}</p>
                <a href="{{url('overview')}}">
                    <button type="button" class="more-button">{{__('front.lrnMore')}}</button>
                </a>
            </div>
        @endif

        {{--   project goal    --}}

        @php
            $row = count(json_decode($abouts, true));
        @endphp
        @if ($row > 0)
            @for ($i = 0; $i < $row; $i++)
                @php
                    $image = $abouts[$i]->image;
                       if ($abouts[$i]->project_goal !== null){
                           if (App::isLocale('bn')) {
                                  $goal = $abouts[$i]->project_goal_bn;
                             }else{
                                  $goal = $abouts[$i]->project_goal;
                             }
                           break;
                       } else {
                           $goal = '';
                       }
                @endphp
            @endfor
        @endif
        @if($goal!=='')
            @php
                if (strlen($goal)>120){
                   $goal_ = substr($goal,0,120);
                }else{
                     $goal_ = $goal ;
                }
            @endphp
            <div class="col-md-4 summary">
                <div class="icon">
                    <img src="{{asset('storage/'.$image)}}" alt="summary">
                </div>
                <h2>{{__('front.projectGoal')}}</h2>
                <p>{!! $goal_ !!}</p>
                <a href="{{url('goal')}}">
                    <button type="button" class="more-button">{{__('front.lrnMore')}}</button>
                </a>
            </div>
        @endif

        {{--   project goal    --}}

        @php
            $row = count(json_decode($abouts, true));
        @endphp
        @if ($row > 0)
            @for ($i = 0; $i < $row; $i++)
                @php
                    $image = $abouts[$i]->image;
                       if ($abouts[$i]->mission !== null){
                            if (App::isLocale('bn')) {
                                  $mission = $abouts[$i]->mission_bn;
                             }else{
                                  $mission = $abouts[$i]->mission;
                             }
                           break;
                       } else {
                           $mission = '';
                       }
                @endphp
            @endfor
        @endif
        @if($mission!=='')
            @php
                if (strlen($mission)>120){
                   $mission_ = substr($mission,0,120);
                }else{
                     $mission_ = $mission ;
                }
            @endphp
            <div class="col-md-4 summary">
                <div class="icon">
                    <img src="{{asset('storage/'.$image)}}" alt="summary">
                </div>
                <h2>{{__('front.projectMission')}}</h2>
                <p>{!! $mission_ !!}</p>
                <a href="{{url('mission')}}">
                    <button type="button" class="more-button">{{__('front.lrnMore')}}</button>
                </a>
            </div>
        @endif
    </div>
</div><!-- project summary end -->
