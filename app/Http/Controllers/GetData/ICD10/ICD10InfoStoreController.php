<?php

namespace App\Http\Controllers\GetData\ICD10;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10Record;
use Illuminate\Http\Request;

class ICD10InfoStoreController extends Controller
{
    public function InfoStore()
    {
        $record =   Icd10Record::where('is_fetch', 'record_record_store')->first();

        if (empty($record)) {
            return "No Record Found to store Info";
        }

        $record->update([
            'is_fetch' => 'record_info_fetch_start'
        ]);

        $record_info = ICD_API::request($record->linear_url, $record->language);
        

        $definition = (!empty($record_info['definition'])) ? $record_info['definition']['@value'] : null;
        $longDefinition = (!empty($record_info['longDefinition'])) ? $record_info['longDefinition']['@value'] : null;
        $exclusion = (!empty($record_info['exclusion'])) ? $record_info['exclusion'] : null;
        $exclusion2 = (!empty($record_info['exclusion2'])) ? $record_info['exclusion2'] : null;
        $fullySpecifiedName = (!empty($record_info['fullySpecifiedName'])) ? $record_info['fullySpecifiedName'] : null;
        $note = (!empty($record_info['note'])) ? $record_info['note'] : null;
        $codingHint = (!empty($record_info['codingHint'])) ? $record_info['codingHint'] : null;
        $indexTerm = (!empty($record_info['indexTerm'])) ? $record_info['indexTerm'] : null;
        $inclusion = (!empty($record_info['inclusion'])) ? $record_info['inclusion'] : null;
        $parent = (!empty($record_info['parent'])) ? $record_info['parent'] : null;
        $classKind = (!empty($record_info['classKind'])) ? $record_info['classKind'] : Null;
        $code = (!empty($record_info['code'])) ? $record_info['code'] : Null;

        $record->update([
            'classKind' => $classKind,
            'browserUrl' => $record_info['browserUrl'],
            'code' => $code,
            'title' => $record_info['title']['@value'],
            'definition' => $definition,
            'exclusion' => $exclusion,
            'exclusion2' => $exclusion2,
            'longDefinition' => $longDefinition,
            'fullySpecifiedName' => $fullySpecifiedName,
            'note' => $note,
            'codingHint' => $codingHint,
            'indexTerm' => $indexTerm,
            'inclusion' => $inclusion,
            'parent' => $parent,
            'api_data' =>$record_info,
            'is_fetch' => 'record_info_store'
        ]);
    }
}
