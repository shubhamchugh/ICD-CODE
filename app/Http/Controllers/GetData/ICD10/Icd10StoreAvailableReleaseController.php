<?php

namespace App\Http\Controllers\GetData\ICD10;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ICD10\Icd10Release;
use App\Http\Controllers\Controller;
use App\Helpers\HelperClasses\ICD\ICD_API;

class Icd10StoreAvailableReleaseController extends Controller
{
    const ICD10RELEASE_URI = 'https://id.who.int/icd/release/10';

    public function StoreRelease()
    {
    
        $ICD10_ReleaseDetails =  ICD_API::request(Self::ICD10RELEASE_URI);

        foreach ($ICD10_ReleaseDetails['release'] as $release) {
            Icd10Release::firstOrCreate([
                'lang' => $ICD10_ReleaseDetails['title']['@language'],
                'title' => $ICD10_ReleaseDetails['title']['@value'],
                'release' => http_to_https($release),
                'releaseId' => Str::replace('http://id.who.int/icd/release/10/','',$release),
            ]);    
        }

        Icd10Release::where('release', '!=' ,Str::replace('http://', 'https://', $ICD10_ReleaseDetails['latestRelease']))->update(['latestRelease' => 'Old']);
        Icd10Release::where('release', '=' ,Str::replace('http://', 'https://', $ICD10_ReleaseDetails['latestRelease']))->update(['latestRelease' => 'Latest']);
    }
}
