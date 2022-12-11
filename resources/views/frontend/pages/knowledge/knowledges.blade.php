@extends('layouts.frontend')
@section('title','Knowledge')
@section('content')
    @include('layouts.partials.frontend.pageTitle')
    @php
        if (session()->has('language')) {
           $lanCode = session()->get('language');
           App::setLocale($lanCode);
        }
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
            <div class="col-md-8 successes knowledge">
                @foreach($knowledge as $know)
                    @if($know->status===1)
                        <div class="info-field">
                            @php
                                if (strlen($know->title)>50){
                                   $title = substr($know->title,0,50).'...';
                                }else{
                                    $title = $know->title ;
                                }
                            @endphp

                            <div class="row others-info">
                                <div class="col-md-4">
                                    <div class="date">
                                        <span><i class="fa-regular fa-clock"></i></span>
                                        <span>{{date("d", strtotime($know->updated_at)).' '.substr(date("F", strtotime($know->updated_at)),0,3).'  '.date("Y", strtotime($know->updated_at)) }}</span>

                                    </div>
                                    <span class="category-preview"><a href="{{url('knowledge/'.$know->category)}}">{{$know->category}}</a></span>
                                    <h2>{{$title}}</h2>
                                </div>
                                <div class="col-md-4 attachPreview">
                                    @php
                                        $file = explode('.',$know->attachment);
                                        $ext = $file[count($file)-1];

                                    @endphp
                                    @if($ext === 'pdf')
                                        <object data="{{asset('storage/knowledge/'.$know->attachment)}}" >
                                        </object>

                                    @else
                                        <a href="{{asset('storage/knowledge/'.$know->attachment)}}">
                                            <img src="{{asset('storage/knowledge/'.$know->attachment)}}" alt="knowledge"
                                                 width="100%">
                                        </a>

                                    @endif
                                </div>
                                <div class="col-md-4 actionBtn">
                                    <a href="{{url('knowledge/show/'.$know->id)}}">
                                        <button type="button" class="more-button ">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{url('download/knowledge/'.$know->attachment)}}">
                                        <button type="button" class="more-button ">
                                            <i class="fa-solid fa-download"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 sub-container successes">
                <div class="heading">
                    <span class="heading-1">{{__('front.categories')}}</span>
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
