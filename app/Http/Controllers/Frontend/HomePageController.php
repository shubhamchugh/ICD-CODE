<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ICD10\Icd10Record;
use App\Models\ICD11\Icd11Record;
use App\Models\ICD10\Icd10Release;
use App\Models\ICD11\Icd11Release;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomePageController extends Controller
{
    public function index()
    {
        $icd_11_availableRelease = false;
        $icd_10_availableRelease = false;

        $currentLocale = LaravelLocalization::getCurrentLocale();
    
        $icd_11_release = Icd11Release::where('lang','LIKE',"%{$currentLocale}%")->get();
        $icd_10_release = Icd10Release::where('lang','LIKE',"%{$currentLocale}%")->get();
  
        $currentDomain = request()->server('SERVER_NAME');

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

       
        
        return view('themes.default.pages.content.home',[
           'icd_11_availableRelease' => $icd_11_availableRelease,
           'icd_10_availableRelease' => $icd_10_availableRelease
        ]);
    }
}
