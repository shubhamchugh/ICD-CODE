<?php

namespace App\Http\Controllers\Frontend\ICD10;

use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10Record;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class ICD10CodePageController extends Controller
{
  public function index(Request $request)
  {
    $releaseId = $request->releaseId;
    $code = $request->code;

    $availableRecords =  Icd10Record::where('language',tongue()->current())
        ->when($releaseId,function ($query, $releaseId) {
            return $query->where('releaseId', $releaseId);
        })
        ->when($code,function ($query, $code) {
            return $query->where('code', $code);
        })->first();


         //Record Not Found
         if (empty($availableRecords)) {

            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. tongue()->current();

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.ICD10.content.ICD10404',[
                'error' => $error,
            ]), 404);
        }

        $child = Icd10Record::where('parent_id',$availableRecords->id)
        ->where('language',tongue()->current())
        ->get();

        SEOTools::setTitle('ICD CODE LIST');
        SEOTools::setDescription('ICD CODE LIST');

        return view('themes.default.ICD10.content.code',[
            'child' => $child,
        ]);
  }
}
