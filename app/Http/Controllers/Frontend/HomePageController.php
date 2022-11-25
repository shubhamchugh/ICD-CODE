<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use App\Models\icd_11_release;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomePageController extends Controller
{
    public function index()
    {
        $lang = tongue()->current();
        $release = icd_11_release::where('lang','LIKE',"%{$lang}%")->get();

        SEOTools::setTitle('Home Package');
        SEOTools::setDescription('This is my page description from pakage');
        
        return view('themes.default.content.home',[
           'release' => $release
        ]);
    }
}
