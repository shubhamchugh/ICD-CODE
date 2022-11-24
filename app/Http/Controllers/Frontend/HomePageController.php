<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use App\Models\icd_11_release;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $lang = tongue()->current();
        $release = icd_11_release::where('lang','LIKE',"%{$lang}%")->get();
        
        return view('themes.default.content.home',[
           'release' => $release
        ]);
    }
}
