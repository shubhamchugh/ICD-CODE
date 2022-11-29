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

        $BookDetails =   ICD_API::request($release->release);
        
        foreach ($BookDetails['child']  as $chapters) {
            Icd10Record::firstOrCreate([
                'linear_url' => $chapters,
                'language' => $release->lang,
                'releaseDate' => $BookDetails['releaseDate'],
                'browserUrl' => $BookDetails['browserUrl'],
            ]);
        }
    }
}
