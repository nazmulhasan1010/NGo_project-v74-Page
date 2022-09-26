<!-- galleries -->
<div class="project_summary bg-dark-cu content-100">
    <div class="row content-80 ">
        @if($photos)
            <div class="col-md-8 sub-container gallery">
                <div class="heading">
                    <span class="heading-1">Photo</span>
                    <span class="heading-2">Gallery</span>
                </div>
                @php
                    $rows = count(json_decode($photos, true));
                @endphp
                <div class="row photos">
                    @for ($j = 0; $j < $rows; $j++)
                        @if($photos[$j]->status==1)
                            <div class="col-md-4">
                                <img src="{{asset('storage/' .$photos[$j]->image)}}" alt="gallery">
                            </div>
                        @endif
                    @endfor
                </div>

                <a href="{{url('gallery/photos')}}">
                    <button type="button" class="more-button see-all">See All <i
                            class="fa-solid fa-angles-right"></i></button>
                </a>
            </div>
        @endif
        @if($videos)
            <div class="col-md-4 sub-container gallery">
                <div class="heading">
                    <span class="heading-1">Video</span>
                    <span class="heading-2">Gallery</span>
                </div>
                <div class="row videos">
                    @foreach($videos as $video)
                        @if($video->status == 1)
                            <div class="row">
                                {!! $video->link !!}
                            </div>
                        @endif
                    @endforeach
                </div>
                <a href="{{url('gallery/videos')}}">
                    <button type="button" class="more-button see-all">See All <i
                            class="fa-solid fa-angles-right"></i></button>
                </a>
            </div>
        @endif
    </div>
</div><!-- galleries end -->
