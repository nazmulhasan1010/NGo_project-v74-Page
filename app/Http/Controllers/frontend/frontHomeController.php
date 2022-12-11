<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Activity;
use App\Models\Beneficiary;
use App\Models\Contacts;
use App\Models\Entrepreneurs;
use App\Models\Event;
use App\Models\ImageGallery;
use App\Models\Links;
use App\Models\Notice;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\VideoGallery;
use App\Models\Workingarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class frontHomeController extends Controller
{

    public function index()
    {
        $slider = Slider::get();
        $area = Workingarea::latest()->first();
        $activities = Activity::latest()->take(3)->get();
        $event = Event::latest()->take(3)->get();
        $notice = Notice::latest()->take(4)->get();
        $enterprises = Entrepreneurs::latest()->take(3)->get();
        $photos = ImageGallery::latest()->take(9)->get();
        $videos = VideoGallery::latest()->take(3)->get();
        $partners = Partner::latest()->get();
        $abouts = About::latest()->get();
        return view('frontend.pages.home', [
            'slider' => $slider,
            'area' => $area,
            'activities' => $activities,
            'event' => $event,
            'notice' => $notice,
            'enterprises' => $enterprises,
            'photos' => $photos,
            'videos' => $videos,
            'partners' => $partners,
            'abouts' => $abouts,
        ]);
    }
    public function language($lan): void
    {
        if ($lan){
            App::setLocale($lan);
        }
    }
}
