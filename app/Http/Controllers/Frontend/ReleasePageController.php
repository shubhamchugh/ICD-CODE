<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use Illuminate\Http\Request;

class ReleasePageController extends Controller
{
    public function index($release)
    {
        $availableRecords =  Icd11Records::where('releaseId',$release)
        ->where('language',tongue()->current())
        ->where('parent_id',0)
        ->get();
        

        if (!$availableRecords->isEmpty()) {
            return view('themes.default.content.release',[
                'availableRecords' => $availableRecords
            ]);
        }else{
            return view('errors.release404',[
                'release' => $release,
                'language' => tongue()->current(),
            ]);
        }


       
    }
}
