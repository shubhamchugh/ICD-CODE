<?php

namespace App\Http\Controllers\Frontend\ICD11;

use App\Http\Controllers\Controller;
use App\Models\ICD11\Icd11Record;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Icd11CodePageController extends Controller
{
    public function index(Request $request)
    {
        $releaseYear = $request->releaseYear;
        $liner_id = $request->liner_id;

        $lang_available = icd_11_lang_available($releaseYear);
        if (!empty($lang_available['status']) == 404 ) {
            return abort($lang_available['status'],'releaseId'.$releaseYear.'Not Found in our database');
        }
        
        $availableRecords =  Icd11Record::where('language',LaravelLocalization::getCurrentLocale() )
        ->when($releaseYear,function ($query, $releaseYear) {
            return $query->where('releaseYear', $releaseYear);
        })
        ->when($liner_id,function ($query, $liner_id) {
            return $query->where('liner_id', $liner_id);
        })->first();

        //Record Not Found
        if (empty($availableRecords)) {

            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. LaravelLocalization::getCurrentLocale();

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.ICD11.content.ICD11404',[
                'error' => $error,
            ]), 404);
        }

        $child = Icd11Record::where('parent_id',$availableRecords->id)
        ->where('language',LaravelLocalization::getCurrentLocale())
        ->get();
        
        $code_title = (!empty($availableRecords->title)) ? $availableRecords->title : Null;
        
        $code = (!empty($availableRecords->code)) ? $availableRecords->code : $availableRecords->codeRange;
        
        SEOTools::setTitle($code.' '.$code_title . ' ICD 11 Codes '. $releaseYear);
        SEOTools::setDescription('ICD-11 Code for '.$code_title.'. Inclusion, exclusion and all ICD 11 '.$code.' history, related codes, synonyms, rules & guidelines.');

        return view('themes.default.ICD11.content.code',[
            'child' => $child,
            'lang_available' => $lang_available,
            'availableRecords' => $availableRecords,
        ]);
    }
}
