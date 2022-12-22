<?php

namespace App\Http\Controllers\Frontend\ICD10;

use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10CmXmlRecord;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ICD10CM_XML_CodePageController extends Controller
{
    public function index(Request $request)
    {
        $releaseYear = $request->releaseYear;
        $slug = $request->slug;


        $chapterAvailable =  Icd10CmXmlRecord::where('parent_id', null)
            ->where('language', LaravelLocalization::getCurrentLocale())
            ->when($releaseYear, function ($query, $releaseYear) {
                return $query->where('releaseYear', $releaseYear);
            })->get();

        if (!empty($slug)) {
            $codeDetails =  Icd10CmXmlRecord::where('language', LaravelLocalization::getCurrentLocale())
                ->when($releaseYear, function ($query, $releaseYear) {
                    return $query->where('releaseYear', $releaseYear);
                })
                ->when($slug, function ($query, $slug) {
                    return $query->where('slug', $slug);
                })
                ->first();

            $history_Codes = Icd10CmXmlRecord::where('code', $codeDetails->code)->get();


            $availableRecords = Icd10CmXmlRecord::where('parent_id', $codeDetails->id)
                    ->where('language', LaravelLocalization::getCurrentLocale())
                    ->get();

            
            $code_title = (!empty($codeDetails->title)) ? $codeDetails->title : null;

            $code = (!empty($codeDetails->code)) ? $codeDetails->code : null;

            SEOTools::setTitle('ICD 10 Code: '.$code.' '.$code_title .'-'. $releaseYear);
            SEOTools::setDescription('ICD 10 '.$releaseYear.' Code for '.$code_title.'. Inclusion, exclusion and all ICD 10 '.$code.' history, related codes, synonyms, rules & guidelines.');

            return view('themes.default.ICD10XML_CM.content.code', [
                'availableRecords' => $availableRecords,
                'codeDetails' => $codeDetails,
                'history_Codes' => $history_Codes
            ]);
        }

        SEOTools::setTitle($releaseYear.' Free ICD-10-CM Codes');
        SEOTools::setDescription('ICD 10 Code for '.$releaseYear.'. Inclusion, exclusion, history, related codes, synonyms, rules & guidelines.');

        return view('themes.default.ICD10XML_CM.content.code', [
            'chapterAvailable' => $chapterAvailable,
            'availableRecords' => [],
        ]);
    }
}
