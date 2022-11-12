<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\icd_11_release;

class CheckAvailableRelease extends Controller
{
   public function check_release()
   {
    $icd_get =  icd_headers_curl("https://id.who.int/icd/release/11/mms");
    $icd_data = json_decode($icd_get,true);    
    dd($icd_get);
    foreach ($icd_data['release'] as $release) {
        $Update = icd_11_release::firstOrCreate([
            'release' => $release
        ]);
    }
                icd_11_release::all()->
                update([
                    'latestRelease' => Null
                ]);


    return $Update;

}
}
