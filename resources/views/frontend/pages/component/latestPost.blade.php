@php
    $uri = explode('/',$_SERVER['REQUEST_URI']);
    $uri_ = explode('?',$_SERVER['REQUEST_URI']);
    $count = count($uri);
    $count_ = count($uri_);
//    print_r($uri_);
@endphp
@if($uri[$count-1]==='blogs'||$uri[$count-2]==='blog'||$uri_[0]==='/blogs')
    @foreach(getLatest()['blog'] as $latestStory)
        @if($latestStory->status === 1)
            <a href="{{url('blog/'.$latestStory->id)}}" class="row latest-post-links">
                <div class="col-md-6 lp-links ">
                    <img src="{{asset('storage/'.$latestStory->image)}}" alt="">
                </div>
                <div class="col-md-6 lp-links">
                    <div class="date">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span>{{date("d", strtotime($latestStory->updated_at)).'  '.substr(date("F", strtotime($latestStory->updated_at)),0,3).'  '.date("Y", strtotime($latestStory->updated_at)) }}</span>
                    </div>
                    @php
                        if (strlen($latestStory->title)>25){
                       $title_ls = substr($latestStory->title,0,25).'...';
                    }else{
                        $title_ls = $latestStory->title ;
                    }
                    @endphp
                    <h2>{{$title_ls}}</h2>
                    @php
                        if (strlen($latestStory->description)>50){
                       $des_ls = substr($latestStory->description,0,50).'...';
                    }else{
                        $des_ls = $latestStory->description ;
                    }
                    @endphp
                    <p>{{$des_ls}}</p>
                </div>
            </a>
        @endif
    @endforeach
@endif
@if($uri[$count-1]==='newses'||$uri[$count-2]==='news'|| $uri_[0]==='/newses')
    @foreach(getLatest()['news'] as $latestStory)
        @if($latestStory->status === 1)
            <a href="{{url('news/'.$latestStory->id)}}" class="row latest-post-links">
                <div class="col-md-6 lp-links ">
                    <img src="{{asset('storage/'.$latestStory->image)}}" alt="">
                </div>
                <div class="col-md-6 lp-links">
                    <div class="date">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span>{{date("d", strtotime($latestStory->updated_at)).'  '.substr(date("F", strtotime($latestStory->updated_at)),0,3).'  '.date("Y", strtotime($latestStory->updated_at)) }}</span>
                    </div>
                    @php
                        if (strlen($latestStory->title)>25){
                       $title_ls = substr($latestStory->title,0,25).'...';
                    }else{
                        $title_ls = $latestStory->title ;
                    }
                    @endphp
                    <h2>{{$title_ls}}</h2>
                    @php
                        if (strlen($latestStory->description)>50){
                       $des_ls = substr($latestStory->description,0,50).'...';
                    }else{
                        $des_ls = $latestStory->description ;
                    }
                    @endphp
                    <p>{{$des_ls}}</p>
                </div>
            </a>
        @endif
    @endforeach

@endif
@if($uri[$count-1]==='stories'||$uri[$count-2]==='story'||$uri_[0]==='/stories')
    @foreach(getLatest()['story'] as $latestStory)
        @if($latestStory->status === 1)
            <a href="{{url('story/'.$latestStory->id)}}" class="row latest-post-links">
                <div class="col-md-6 lp-links ">
                    <img src="{{asset('storage/'.$latestStory->image)}}" alt="">
                </div>
                <div class="col-md-6 lp-links">
                    <div class="date">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span>{{date("d", strtotime($latestStory->updated_at)).'  '.substr(date("F", strtotime($latestStory->updated_at)),0,3).'  '.date("Y", strtotime($latestStory->updated_at)) }}</span>
                    </div>
                    @php
                        if (strlen($latestStory->title)>25){
                       $title_ls = substr($latestStory->title,0,25).'...';
                    }else{
                        $title_ls = $latestStory->title ;
                    }
                    @endphp
                    <h2>{{$title_ls}}</h2>
                    @php
                        if (strlen($latestStory->description)>50){
                       $des_ls = substr($latestStory->description,0,50).'...';
                    }else{
                        $des_ls = $latestStory->description ;
                    }
                    @endphp
                    <p>{{$des_ls}}</p>
                </div>
            </a>
        @endif
    @endforeach

@endif

