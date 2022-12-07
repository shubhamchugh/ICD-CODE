<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ICD10\Icd10Record;
use App\Models\ICD11\Icd11Record;
use App\Models\ICD10\Icd10Release;
use App\Models\ICD11\Icd11Release;
use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10CmXmlRecord;
use App\Models\ICD10\Icd10CmXmlRelease;
use Artesaos\SEOTools\Facades\SEOTools;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $icd_11_availableRelease = [];
        $icd_10_availableRelease = [];
        $icd_10_xml_availableRelease =[];
        
        $releaseYear = $request->releaseYear;
        
        $currentLocale = LaravelLocalization::getCurrentLocale();
        
        $icd_11_release = Icd11Release::where('lang','LIKE',"%{$currentLocale}%")
        ->when($releaseYear,function ($query, $releaseYear) {
            return $query->where('releaseYear', $releaseYear);
        })
        ->get();
        
        $icd_10_release = Icd10Release::where('lang','LIKE',"%{$currentLocale}%")
        ->when($releaseYear,function ($query, $releaseYear) {
            return $query->where('releaseYear', $releaseYear);
        })
        ->get();

        $icd_10_xml_release = Icd10CmXmlRelease::where('is_fetch','done')
        ->where('language','LIKE',"%{$currentLocale}%")
        ->when($releaseYear,function ($query, $releaseYear) {
            return $query->where('releaseYear', $releaseYear);
        })
        ->get();

        SEOTools::setTitle('Home Package');
        SEOTools::setDescription('This is my page description from Package');
        
        if (!$icd_11_release->isEmpty()) {
            foreach ($icd_11_release as  $icd_11_release_data) {
                $icd_11_availableRelease['book'][] =  Icd11Record::where('releaseId', $icd_11_release_data->releaseId)
                    ->where('language',$currentLocale)
                    ->where('parent_id',null)
                    ->get();
                    $icd_11_availableRelease['releaseType'][] = $icd_11_release_data->latestRelease;
            }
        }

        if (!$icd_10_release->isEmpty()) {
            foreach ($icd_10_release as $icd_10_release_data) {
                $icd_10_availableRelease['book'][] =  Icd10Record::where('releaseId', $icd_10_release_data->releaseId)
                ->where('language',$currentLocale)
                ->where('parent_id',null)
                ->get();
                $icd_10_availableRelease['releaseType'][] = $icd_10_release_data->latestRelease;
            }
        } 

        if (!$icd_10_xml_release->isEmpty()) {
            foreach ($icd_10_xml_release as $icd_10_xml_release_data) {
                $icd_10_xml_availableRelease['book'][] = $icd_10_xml_release_data;
            }
        } 

        
        return view('themes.default.pages.content.home',[
           'icd_11_availableRelease' => $icd_11_availableRelease,
           'icd_10_availableRelease' => $icd_10_availableRelease,
           'icd_10_xml_availableRelease' => $icd_10_xml_availableRelease
        ]);
    }
}
