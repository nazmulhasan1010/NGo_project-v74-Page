@php
    $uri = explode('/',$_SERVER['REQUEST_URI']);
    $uri_ = explode('?',$_SERVER['REQUEST_URI']);
    $uri_2 = explode('/',$_SERVER['REQUEST_URI']);
    $uri_2c = explode('?',$uri_2[count($uri_2)-1]);

    if (in_array('blogs', $uri)||in_array('blog', $uri)||in_array('/blogs', $uri_)||in_array('blogs',$uri_2c)){
         $latest = getLatest()['blog'];
        $url_1 = 'blog';
    }elseif (in_array('newses', $uri)||in_array('newse', $uri)||in_array('/newses', $uri_)||in_array('newses',$uri_2c)){
         $latest = getLatest()['news'];
         $url_1 = 'news';
    }elseif (in_array('stories', $uri)||in_array('storie', $uri)||in_array('/stories', $uri_)||in_array('stories',$uri_2c)||in_array('story', $uri) ){
        $latest = getLatest()['story'];
        $url_1 = 'story';
    }

@endphp
@foreach($latest as $latestStory)
    @if($latestStory->status === 1)
        <a href="{{url($url_1.'/'.$latestStory->id)}}" class="row latest-post-links">
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

