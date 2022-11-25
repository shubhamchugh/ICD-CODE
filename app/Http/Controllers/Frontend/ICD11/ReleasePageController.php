<?php

namespace App\Http\Controllers\Frontend\ICD11;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class ReleasePageController extends Controller
{
    public function index($release)
    {
        $availableRecords =  Icd11Records::where('releaseId',$release)
        ->where('language',tongue()->current())
        ->where('parent_id',0)
        ->get();
        
        //Record Not Found
        if ($availableRecords->isEmpty()) {

            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. tongue()->current().' | Release Year'. $release;

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.content.ICD11.release404',[
                'error' => $error,
            ]), 404);
        }

        SEOTools::setTitle('ICD CODE LIST');
        SEOTools::setDescription('ICD CODE LIST');

        return view('themes.default.content.ICD11.release',[
            'availableRecords' => $availableRecords
        ]);
    }


    public function list($release,$parent_id)
    {
        $availableRecords =  Icd11Records::where('releaseId',$release)
        ->where('language',tongue()->current())
        ->where('parent_id',$parent_id)
        ->get();

        //Record Not Found
        if ($availableRecords->isEmpty()) {

            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. tongue()->current().' | Release Year'. $release;

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.content.ICD11.ICD11404',[
                'error' => $error,
            ]), 404);
        }

        SEOTools::setTitle('ICD CODE LIST');
        SEOTools::setDescription('ICD CODE LIST');

        return view('themes.default.content.ICD11.chapter',[
            'availableRecords' => $availableRecords
        ]);
    }


}
