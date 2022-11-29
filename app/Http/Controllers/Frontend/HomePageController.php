<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ICD11\Icd11Record;
use App\Models\ICD11\Icd11Release;
use App\Models\Icd11Records;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class HomePageController extends Controller
{
    public function index()
    {
        
        $lang = tongue()->current();
        $release = Icd11Release::where('lang','LIKE',"%{$lang}%")->get();

        SEOTools::setTitle('Home Package');
        SEOTools::setDescription('This is my page description from Package');
        
        if ($release->isEmpty()) {
        $currentDomain = request()->server('SERVER_NAME');
        return "No Data Found Please Get some data From API: $currentDomain/check_release";
        } 
        
        foreach ($release as  $release_data) {
        $availableRelease['book'][] =  Icd11Record::where('releaseId', $release_data->releaseId)
            ->where('language',tongue()->current())
            ->where('parent_id',0)
            ->get();
            $availableRelease['releaseType'][] = $release_data->latestRelease;
        }

        return view('themes.default.pages.content.home',[
           'availableRelease' => $availableRelease,
        ]);
    }
}
