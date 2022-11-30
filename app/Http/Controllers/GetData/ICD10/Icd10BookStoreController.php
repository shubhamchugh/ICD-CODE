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

        $BookDetails = ICD_API::request($release->release);

        foreach ($BookDetails['child']  as $chapters) {
            Icd10Record::firstOrCreate([
                'linear_url' => http_to_https($chapters),
                'language' => $release->lang,
                'releaseDate' => $BookDetails['releaseDate'],
                'releaseId' => $release['releaseId'],
                'browserUrl' => $BookDetails['browserUrl'],
                'parent_id' => '0',
            ]);
        }

        $release->update([
            'is_fetch' => 'done',
        ]);
    }
}
