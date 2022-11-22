<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use App\Models\icd_11_release;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        $release = icd_11_release::get();
        
        return view('themes.default.content.home',[
           'release' => $release
        ]);
    }
}
