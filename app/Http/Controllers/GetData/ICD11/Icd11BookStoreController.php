<?php

namespace App\Http\Controllers\GetData\ICD11;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\ICD11\Icd11Record;
use App\Models\ICD11\Icd11Release;
use Illuminate\Http\Request;

class Icd11BookStoreController extends Controller
{
    public function StoreBook()
    {
        $release =  Icd11Release::where('is_fetch','pending')->first();

    if (!empty($release)) {

        $release->update([
            'is_fetch' => 'scraping_start'
        ]);

        echo "New Book Found Added to Database<br>";

        $lang =  json_decode($release->lang, true);
        foreach ($lang as $lang_value) {
        
        $icd_records =  ICD_API::request($release->release,$lang_value);

        Icd11Record::firstOrCreate([
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
        'is_fetch' => 'done'
       ]);
       }else {
        echo "No New Book Found<br>";
       } 

      
    }
}
