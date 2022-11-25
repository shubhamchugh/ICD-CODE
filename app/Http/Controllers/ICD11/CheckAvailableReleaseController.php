<?php

namespace App\Http\Controllers\ICD11;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\icd_11_release;
use App\Http\Controllers\Controller;
use App\Helpers\HelperClasses\ICD\ICD_API;

class CheckAvailableReleaseController extends Controller
{
    public function CheckRelease()
    {
    $icd_get =  ICD_API::request('https://id.who.int/icd/release/11/mms');

        foreach ($icd_get['release'] as $release) {
            icd_11_release::firstOrCreate([
                'release' => http_to_https($release),
            ]);
    }

    $release = icd_11_release::select('release')->get();

    foreach ($release as $value) {
      $release_data =   ICD_API::request($value['release']);
  
      $release = icd_11_release::where('release',$value['release'])
      ->update([
                  'releaseDate' => $release_data['releaseDate'],
                  'lang' => $release_data['availableLanguages'],
                  'releaseId' => $release_data['releaseId']
      ]);
    }

    icd_11_release::where('release', '!=' ,Str::replace('http://', 'https://', $icd_get['latestRelease']))->update(['latestRelease' => 'Old']);
    icd_11_release::where('release', '=' ,Str::replace('http://', 'https://', $icd_get['latestRelease']))->update(['latestRelease' => 'Latest']);

    return "Release Added With Latest Tag";
}
}
