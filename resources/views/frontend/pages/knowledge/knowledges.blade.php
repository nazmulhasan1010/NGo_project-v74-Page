@extends('layouts.frontend')
@section('title','Knowledge')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        if($category==='all'){
            $catSt = 'all-5';
            $catStcat = 'all';
        } else{
            $catSt = 'category';
            $catStcat = 'categoryStAll';
        }
            $start = 0;
            $pages = 5;
            $clickPage = 0;
            $knowledge = getKnowledge($category,$catStcat,$start,$pages);
            $item = count($knowledge);
            $page = ceil($item/5);
            if (isset($_GET['page'])){
                $clickPage = $_GET['page'];
                $start = ($clickPage-1)*$pages;
            }
            $knowledge = getKnowledge($category,$catSt,$start,$pages);
    @endphp

    <div class="project_summary bg-dark-cu content-100 success">
        @include('frontend.pages.component.themeChanger')
        <div class="row content-80 border-bottom-">
            <div class="col-md-8 successes">
                @foreach($knowledge as $know)
                    @if($know->status===1)
                        <div class="info-field">
                            @php
                                if (strlen($know->description)>500){
                                   $description = substr($know->description,0,500).'...';
                                }else{
                                    $description = $know->description ;
                                }
                            @endphp
                            <div class="date">
                                <span><i class="fa-regular fa-clock"></i></span>
                                <span>{{date("d", strtotime($know->updated_at)).' '.substr(date("F", strtotime($know->updated_at)),0,3).'  '.date("Y", strtotime($know->updated_at)) }}</span>
                                <span><a href="{{url('knowledge/'.$know->category)}}">{{$know->category}}</a></span>
                            </div>
                            <h2>{{$know->title}}</h2>
                            <p>{{$description}}</p>
                            <p>{{$know->address}}</p>
                            <a href="{{url('blog/'.$know->id)}}">
                                <button type="button" class="more-button ">
                                    Read More
                                </button>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 sub-container successes">
                <div class="heading">
                    <span class="heading-1">Categories</span>
                </div>
                @php
                    $knowCat = getKnowledge('','catName','','');
                @endphp
                <div class="categories">
                    <ul>
                        <a href="{{url('knowledge')}}">
                            <li class="{{Request::is('knowledge')?'active':''}}">All</li>
                        </a>
                        @foreach($knowCat as $categories)
                            <a href="{{url('knowledge/'.$categories->category)}}">
                                <li class="{{Request::is('knowledge/'.$categories->category)?'active':''}}">{{$categories->category}}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @include('frontend.pages.component.pagination')

    </div>
@endsection
