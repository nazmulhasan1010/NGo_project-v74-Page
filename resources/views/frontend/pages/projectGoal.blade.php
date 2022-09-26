@extends('layouts.frontend')
@section('title','Goal')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        $abouts = getAbout();
    @endphp

    <div class="project_summary bg-white-cu content-100">
        <div class="row content-80 bg-dark-cu project-summary-more">
            @php
                $row = count(json_decode($abouts, true));
                 $goal = 'Goal no added yet';
            @endphp
            @if ($row > 0)
                @for ($i = 0; $i < $row; $i++)
                    @php
                        $image = $abouts[$i]->image;
                            if ($abouts[$i]->project_goal !== null){
                                $goal = $abouts[$i]->project_goal;
                                break;
                            } else {
                                $goal = '';
                            }
                    @endphp
                @endfor
            @endif
            <div class="col-md-6 summary-more">
                <img src="{{asset('storage/'.$image)}}" alt="">
            </div>
            <div class="col-md-6 summary-more">
                <div class="heading">
                    <span class="heading-1">Project</span>
                    <span class="heading-2">Goal</span>
                </div>
                <p>{{$goal}}</p>
            </div>

        </div>
    </div>

@endsection
