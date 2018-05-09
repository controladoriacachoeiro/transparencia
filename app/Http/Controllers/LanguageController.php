<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {        
        if (array_key_exists($lang, Config::get('languages'))) {            
            Session::put('applocale', $lang);
        }
        return back();
    }
    
}
