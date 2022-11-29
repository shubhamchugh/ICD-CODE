<?php

namespace App\Http\Controllers\GetData\ICD11;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Models\ICD11\Icd11Release;

class Icd11StoreAvailableReleaseController extends Controller
{
    const ICD11RELEASE_URI  = 'https://id.who.int/icd/release/11/mms';

    public function StoreRelease()
    {
    $icd_get =  ICD_API::request(Self::ICD11RELEASE_URI);

        foreach ($icd_get['release'] as $release) {
            Icd11Release::firstOrCreate([
                'release' => http_to_https($release),
            ]);
    }

    $release = Icd11Release::select('release')->get();

    foreach ($release as $value) {
      $release_data =   ICD_API::request($value['release']);
  
      $release = Icd11Release::where('release',$value['release'])
      ->update([
                  'releaseDate' => $release_data['releaseDate'],
                  'lang' => $release_data['availableLanguages'],
                  'releaseId' => $release_data['releaseId']
      ]);
    }

    Icd11Release::where('release', '!=' ,Str::replace('http://', 'https://', $icd_get['latestRelease']))->update(['latestRelease' => 'Old']);
    Icd11Release::where('release', '=' ,Str::replace('http://', 'https://', $icd_get['latestRelease']))->update(['latestRelease' => 'Latest']);

    return "Release Added With Latest Tag";
}
}
