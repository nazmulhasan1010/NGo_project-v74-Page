<?php


use App\Models\Contacts;
use App\Models\Links;
use App\Models\ImageGallery;
use App\Models\Privacy;
use App\Models\Terms;
use App\Models\VideoGallery;
use App\Models\Beneficiary;
use App\Models\About;
use App\Models\Workingarea;
use App\Models\Activity;
use App\Models\FAQ;
use App\Models\SuccessStories;
use App\Models\Event;
use App\Models\News;
use App\Models\Blog;
use App\Models\Notice;
use App\Models\Logo;
use App\Models\Message;

if (!function_exists('getCommunication')) {
    function getCommunication(): array
    {
        $contact = Contacts::latest()->take(1)->get();
        $links = Links::latest()->take(1)->get();
        return [
            'contact' => $contact,
            'links' => $links
        ];
    }
}
if (!function_exists('getImage')) {
    function getImage()
    {
        return ImageGallery::latest()->get();
    }
}
if (!function_exists('getVideo')) {
    function getVideo()
    {
        return VideoGallery::latest()->get();
    }
}
if (!function_exists('getEnterprise')) {
    function getEnterprise()
    {
        return Beneficiary::latest()->get();
    }
}
if (!function_exists('getAbout')) {
    function getAbout()
    {
        return About::latest()->get();
    }
}
if (!function_exists('getWorkingArea')) {
    function getWorkingArea()
    {
        return Workingarea::latest()->first();
    }
}
if (!function_exists('activities')) {
    function activities($id)
    {
        if ($id === 'all') {
            return Activity::latest()->get();
        } else {
            return Activity::where('id', '=', $id)->get();
        }
    }
}

if (!function_exists('getFaq')) {
    function getFaq()
    {
        return FAQ::latest()->get();
    }
}

if (!function_exists('success')) {
    function success($start,$limit,$sta)
    {
        if ($sta === 'all') {
            return SuccessStories::latest()->get();
        } elseif ($sta === 'spe') {
            return SuccessStories::where('id', '>', $start)->take($limit)->get();
        } else {
            return SuccessStories::where('id', '=', $start)->get();
        }
    }
}
if (!function_exists('getLatest')) {
    function getLatest(): array
    {
        $success = SuccessStories::latest()->take(3)->get();
        $blog = Blog::latest()->take(3)->get();
        $news = News::latest()->take(3)->get();
        return [
            'story' => $success,
            'blog' => $blog,
            'news' => $news
        ];
    }
}
if (!function_exists('getEvents')) {
    function getEvents($start, $limit, $sta)
    {
        if ($sta === 'all') {
            return Event::get();
        }elseif ($sta === 'spe') {
            return Event::where('id', '>', $start)->take($limit)->get();
        }else {
            return Event::where('id', '=', $start)->get();
        }

    }
}
if (!function_exists('getNews')) {
    function getNews($start, $limit, $sta)
    {
        if ($sta === 'all') {
            return News::get();
        } elseif ($sta === 'spe') {
            return News::where('id', '>', $start)->take($limit)->get();
        } else {
            return News::where('id', '=', $start)->get();
        }

    }
}
if (!function_exists('getBlogs')) {
    function getBlogs($start, $limit, $sta)
    {
        if ($sta === 'all') {
            return Blog::get();
        } elseif ($sta === 'spe') {
            return Blog::where('id', '>', $start)->take($limit)->get();
        }else {
            return Blog::where('id', '=', $start)->get();
        }

    }
}
if (!function_exists('getNotices')) {
    function getNotices($start, $limit, $sta)
    {
        if ($sta === 'all') {
            return Notice::get();
        }elseif ($sta === 'spe') {
            return Notice::where('id', '>', $start)->take($limit)->get();
        } else {
            return Notice::where('id', '=', $start)->get();
        }
    }
}
if (!function_exists('getLogo')) {
    function getLogo($type)
    {
        return Logo::where('logo_status', '=', $type)->latest()->get();
    }
}

if (!function_exists('getTerms')){
    function getTerms(){
        return Terms::where('status', '=', 1)->take(1)->get();
    }
}
if (!function_exists('getPrivacy')) {
    function getPrivacy()    {
        return Privacy::where('status', '=', 1)->take(1)->get();
    }
}
if (!function_exists('getMessage')){
    function getMessage($start, $limit, $sta){
        if ($sta === 'all') {
            return Message::get();
        }elseif ($sta === 'spe') {
            return Message::where('id', '>', $start)->take($limit)->get();
        } else {
            return Message::where('id', '=', $start)->get();
        }
    }
}
