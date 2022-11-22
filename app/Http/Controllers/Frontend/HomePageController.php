<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        $book = Icd11Records::where('parent_id','0')
        ->where('language','en')
        ->get();
        
        return view('themes.default.content.home',[
           'book' => $book
        ]);
    }
}
