<?php

namespace App\Http\Controllers\Frontend\ICD10;

use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10Record;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ICD10CodePageController extends Controller
{
  public function index(Request $request)
  {
    $releaseYear = $request->releaseYear;
    $code = $request->code;

    $availableRecords =  Icd10Record::where('language',LaravelLocalization::getCurrentLocale())
        ->when($releaseYear,function ($query, $releaseYear) {
            return $query->where('releaseYear', $releaseYear);
        })
        ->when($code,function ($query, $code) {
            return $query->where('code', $code);
        })->first();


         //Record Not Found
         if (empty($availableRecords)) {

            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. LaravelLocalization::getCurrentLocale();

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.ICD10.content.ICD10404',[
                'error' => $error,
            ]), 404);
        }

        $child = Icd10Record::where('parent_id',$availableRecords->id)
        ->where('language',LaravelLocalization::getCurrentLocale())
        ->get();



       $code_title = (!empty($availableRecords->title)) ? $availableRecords->title : Null;

       $code = (!empty($availableRecords->code)) ? $availableRecords->code : $availableRecords->codeRange;

       SEOTools::setTitle('ICD 10 Code: '.$code.' '.$code_title . '-'. $releaseYear);
       SEOTools::setDescription('ICD-10 '.$releaseYear.' Code for '.$code_title.'. Inclusion, exclusion and all ICD 10 '.$code.' history, related codes, synonyms, rules & guidelines.');

        return view('themes.default.ICD10.content.code',[
            'child' => $child,
            'availableRecords' => $availableRecords,
        ]);
  }
}
