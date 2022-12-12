<!-- event & notice -->
<div class="project_summary bg-white-cu content-100">
    <div class="row content-80 event-notices">
        @if($event)
            <div class="col-md-6 sub-container event-notice">
                <div class="heading">
                    <span class="heading-1">{{__('front.upcoming')}}</span>
                    <span class="heading-2">{{__('front.events')}}</span>
                </div>
                @foreach($event as $events)
                    @if($events->status===1)
                        @php
                            if (App::isLocale('bn')) {
                                  $title = $events->title_bn;
                                  $description = $events->description_bn;
                             }else{
                                  $title = $events->title;
                                  $description = $events->description;
                             }
                        @endphp
                        <div class="row event">
                            <div class="col-md-4 events">
                                <img src="{{asset('storage/' .$events->image)}}" alt="">
                            </div>
                            <div class="col-md-8 events">
                                @php
                                    if (strlen($title)>35){
                                       $title = substr($title,0,34);
                                    }else{
                                        $title = $title ;
                                    }
                                @endphp
                                <h4>{!! $title !!}</h4>
                                <div class="event-date-place">
                                    <span>{{date("d", strtotime($events->start)).' '.substr(date("F", strtotime($events->start)),0,3).' '.date("Y", strtotime($events->start)) .' - ' .date("d", strtotime($events->end)).' '.substr(date("F", strtotime($events->end)),0,3).' ' .date("Y", strtotime($events->end))}}</span>
                                    <span>{{$events->place}}</span>
                                </div>
                                @php
                                    if (strlen($description)>80){
                                       $des = substr($description,0,80).'...';
                                    }else{
                                        $des = $description ;
                                    }
                                @endphp
                                <p>{!! $des !!}</p>
                                <a href="{{url('event/'.$events->id)}}">
                                    <button type="button" class="more-button">{{__('front.lrnMore')}}</button>
                                </a>
                            </div>
                        </div>

                    @endif
                @endforeach
                <a href="{{url('events')}}" class="more-link">
                    <button type="button" class="more-button see-all">{{__('front.seeAll')}}<i
                            class="fa-solid fa-angles-right"></i></button>
                </a>
            </div>
        @endif
        @if($notice)
            <div class="col-md-6 sub-container event-notice ">
                <div class="heading">
                    <span class="heading-1">{{__('front.notice')}}</span>
                </div>
                @foreach($notice as $notices)
                    @if($notices->status===1)
                        @php
                            if (App::isLocale('bn')) {
                                  $title = $notices->title_bn;
                                  $description = $notices->description_bn;
                             }else{
                                  $title = $notices->title;
                                  $description = $notices->description;
                             }
                        @endphp
                        <div class="row notice">
                            <div class="col-md-2 notices">
                                <div class="date">
                                    {{date('d',strtotime($notices->dateAt)).' '.substr(date('F',strtotime($notices->dateAt)),0,3).' '.date('Y',strtotime($notices->dateAt))}}
                                </div>
                            </div>
                            <a href="{{url('notice/'.$notices->id)}}" class="col-md-10 notices">
                                @php
                                    if (strlen($title)>40){
                                       $title = substr($title,0,39).'...';
                                    }else{
                                        $title = $title ;
                                    }
                                @endphp
                                <h3>{!! $title !!}</h3>
                                @php
                                    if (strlen($description)>300){
                                       $des = substr($description,0,299).'...';
                                    }else{
                                        $des = $description ;
                                    }
                                @endphp
                                <p>{!! $des !!}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
                <a href="{{url('notices')}}" class="more-link">
                    <button type="button" class="more-button see-all">{{__('front.seeAll')}}<i
                            class="fa-solid fa-angles-right"></i></button>
                </a>
            </div>
        @endif
    </div>
</div> <!-- event & notice end -->
