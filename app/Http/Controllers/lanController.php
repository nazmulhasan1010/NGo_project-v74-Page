<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class lanController extends Controller
{
    public function language(Request $request)
    {
        if (session()->has('language')){
            $lan = session()->get('language');
        }else{
            $lan = App::currentLocale();
        }
        $lanC = $lan == 'en' ? 'bn' : 'en';
        session()->put('language', $lanC);
    }
}
