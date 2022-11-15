<?php

namespace App\Http\Controllers\ICD11;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use App\Models\icd_11_release;
use Illuminate\Http\Request;

class ICD11RecordsController extends Controller
{
    public function check_records()
    {
       $release =  icd_11_release::where('is_scrape')->first();
        
       $lang =  json_decode($release->lang, true);
       foreach ($lang as $lang_value) {
        $icd_records =  ICD_API::request($release->release,$lang_value);

        $update =  Icd11Records::firstOrCreate([
            'description' => $icd_records['title']['@value'],
            'releaseId' => $icd_records['releaseId'],
            'language' => $icd_records['title']['@language'],
            'browserUrl' => $icd_records['browserUrl'],
            'parent_id' => '0',
            'category' => 'Book',
            'releaseDate' => $icd_records['releaseDate'],
            'linear_url' => http_to_https($release->release),
        ]);
       }
        
    }
}
