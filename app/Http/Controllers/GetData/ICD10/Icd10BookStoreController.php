<?php

namespace App\Http\Controllers\GetData\ICD10;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10Record;
use App\Models\ICD10\Icd10Release;
use Illuminate\Http\Request;

class Icd10BookStoreController extends Controller
{
    public function StoreBook()
    {
        $release =  Icd10Release::where('is_fetch','pending')->first();
        
        if (empty($release)) {
            return "All books details are fetched";
        }

        $release->update([
            'is_fetch' => 'fetch_start'
        ]);

        echo "New Book Found Added to Database<br>";

        $icd_records = ICD_API::request($release->release);

        Icd10Record::firstOrCreate([
            'title' => $icd_records['title']['@value'],
            'linear_url' => http_to_https($release->release),
            'language' => $release->lang,
            'releaseDate' => $icd_records['releaseDate'],
            'releaseId' => $release['releaseId'],
            'browserUrl' => $icd_records['browserUrl'],
            'parent_id' => null,
        ]);
    
        $release->update([
            'is_fetch' => 'done',
        ]);
    }
}
