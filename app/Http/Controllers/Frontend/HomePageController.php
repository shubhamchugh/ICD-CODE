<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10Record;
use App\Models\ICD10\Icd10Release;
use App\Models\ICD11\Icd11Record;
use App\Models\ICD11\Icd11Release;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomePageController extends Controller
{
    public function index()
    {
        $icd_11_availableRelease = false;
        $icd_10_availableRelease = false;

        $lang = tongue()->current();
        $icd_11_release = Icd11Release::where('lang','LIKE',"%{$lang}%")->get();
        $icd_10_release = Icd10Release::where('lang','LIKE',"%{$lang}%")->get();
  
        $currentDomain = request()->server('SERVER_NAME');

        SEOTools::setTitle('Home Package');
        SEOTools::setDescription('This is my page description from Package');
        
        if (!$icd_11_release->isEmpty()) {
            foreach ($icd_11_release as  $icd_11_release_data) {
                $icd_11_availableRelease['book'][] =  Icd11Record::where('releaseId', $icd_11_release_data->releaseId)
                    ->where('language',tongue()->current())
                    ->where('parent_id',null)
                    ->get();
                    $icd_11_availableRelease['releaseType'][] = $icd_11_release_data->latestRelease;
            }
        }

        if (!$icd_10_release->isEmpty()) {
            foreach ($icd_10_release as $icd_10_release_data) {
                $icd_10_availableRelease['book'][] =  Icd10Record::where('releaseId', $icd_10_release_data->releaseId)
                ->where('language',tongue()->current())
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
