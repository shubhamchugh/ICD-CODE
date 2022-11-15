<?php

namespace App\Http\Controllers\ICD11;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use App\Models\icd_11_release;
use Illuminate\Http\Request;

class BookCheckController extends Controller
{
    public function CheckBook()
    {
       $release =  icd_11_release::where('is_scraped','pending')->first();

       if (!empty($release)) {

        echo "New Book Found Added to Database<br>";

    $lang =  json_decode($release->lang, true);
        foreach ($lang as $lang_value) {
        
        $icd_records =  ICD_API::request($release->release,$lang_value);

        Icd11Records::firstOrCreate([
                'title' => $icd_records['title']['@value'],
                'releaseId' => $icd_records['releaseId'],
                'language' => $icd_records['title']['@language'],
                'browserUrl' => $icd_records['browserUrl'],
                'parent_id' => '0',
                'classKind' => 'Book',
                'releaseDate' => $icd_records['releaseDate'],
                'linear_url' => http_to_https($release->release),
            ]);
       }

       $release->update([
        'is_scraped' => 'done'
       ]);
       }else {
        echo "No New Book Found<br>";
       } 

      
    }
}
