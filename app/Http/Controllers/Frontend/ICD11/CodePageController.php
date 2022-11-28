<?php

namespace App\Http\Controllers\Frontend\ICD11;

use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use App\Models\icd_11_release;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class CodePageController extends Controller
{
    public function index(Request $request)
    {
        $releaseId = $request->releaseId;
        $liner_id = $request->liner_id;

        $lang_available = lang_available($releaseId);

        if (!empty($lang_available['status']) == 404 ) {
            return abort($lang_available['status'],'releaseId'.$releaseId.'Not Found in our database');
        }
        
        $availableRecords =  Icd11Records::where('language',tongue()->current())
        ->when($releaseId,function ($query, $releaseId) {
            return $query->where('releaseId', $releaseId);
        })
        ->when($liner_id,function ($query, $liner_id) {
            return $query->where('liner_id', $liner_id);
        })->first();

        //Record Not Found
        if (empty($availableRecords)) {

            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. tongue()->current();

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.ICD11.content.ICD11404',[
                'error' => $error,
            ]), 404);
        }

        $child = Icd11Records::where('parent_id',$availableRecords->id)
        ->where('language',tongue()->current())
        ->get();

        SEOTools::setTitle('ICD CODE LIST');
        SEOTools::setDescription('ICD CODE LIST');

        return view('themes.default.ICD11.content.code',[
            'child' => $child,
            'lang_available' => $lang_available,
        ]);
    }
}
