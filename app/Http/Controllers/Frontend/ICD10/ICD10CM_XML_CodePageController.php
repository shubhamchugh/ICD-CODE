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
       

        $availableRecords =  Icd10CmXmlRecord::where('parent_id',null)
            ->where('language', LaravelLocalization::getCurrentLocale())
            ->when($releaseYear, function ($query, $releaseYear) {
                return $query->where('releaseYear', $releaseYear);
            })->get();

            if (!empty($slug)) {
            $availableRecords =  Icd10CmXmlRecord::where('language', LaravelLocalization::getCurrentLocale())
                ->when($releaseYear, function ($query, $releaseYear) {
                    return $query->where('releaseYear', $releaseYear);
                })
                ->when($slug, function ($query, $slug) {
                    return $query->where('slug', $slug);
                })
                ->first();
                

                 $availableRecords = Icd10CmXmlRecord::where('parent_id', $availableRecords->id)
                            ->where('language', LaravelLocalization::getCurrentLocale())
                            ->get();
            }

       

        //Record Not Found
        if (empty($availableRecords)) {
            $error = 'ICD CODE NOT FOUND OR VALID FOR Language: '. LaravelLocalization::getCurrentLocale();

            SEOTools::setTitle($error);
            SEOTools::setDescription($error);

            return response(view('themes.default.ICD10.content.ICD10404', [
                'error' => $error,
            ]), 404);
        }

        SEOTools::setTitle('ICD CODE LIST');
        SEOTools::setDescription('ICD CODE LIST');
       
        return view('themes.default.ICD10XML_CM.content.code',[
            'availableRecords' => $availableRecords,
        ]);
    }
}
