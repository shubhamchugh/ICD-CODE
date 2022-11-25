<?php

namespace App\Http\Controllers\ICD11;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\Icd11Records;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class InfoStoreController extends Controller
{
    public function InfoStore()
    {
        $record =  Icd11Records::where('is_scraped','record_fetch_done')->first();
        if (empty($record)) {
            return "No Record Found to store Info";
        }
        
        $record_info = ICD_API::request($record->linear_url, $record->language);
        
        if ((!empty($record_info['classKind'])) == 'category') {
            $record_info['classKind'] = 'code';
        }

       
       

        $liner_id = str::remove('https://id.who.int/icd/release/11/'.$record->releaseId.'/mms',$record->linear_url);

        $liner_id = ltrim($liner_id,'/');
        $liner_id_code = (!empty(str::before($liner_id,'/'))) ? str::before($liner_id,'/') : Null;
        $liner_id_residual = (!empty(str::after($liner_id,'/'))) ? str::after($liner_id,'/') : Null;
        
        $lang = (!empty($record->language)) ? $record->language : Null;
        $releaseId_slug = (!empty($record)) ? '-release-'.$record->releaseId : Null;
        $classKind = (!empty($record_info['classKind'])) ? '-'.$record_info['classKind'] : Null;
        $liner_id_code_slug = (!empty($liner_id_code)) ? '-'.$liner_id_code : Null;
        $liner_id_residual_slug = (!empty($$liner_id_residual)) ? '-'.$$liner_id_residual : Null;
        $slug =  $lang.$releaseId_slug.$classKind.$liner_id_code_slug.$liner_id_residual_slug;

        $record->update([
            'slug' => $slug,
            'code' => (!empty($record_info['code'])) ? $record_info['code'] : null,
            'classKind' => (!empty($record_info['classKind'])) ? $record_info['classKind'] : null,
            'blockId' => (!empty($record_info['blockId'])) ? $record_info['blockId'] : null,
            'codeRange' => (!empty($record_info['codeRange'])) ? $record_info['codeRange'] : null,
            'title' => $record_info['title']['@value'],
            'definition' => (!empty($record_info['definition']['@value'])) ? $record_info['definition']['@value'] : null,
            'longDefinition' => (!empty($record_info['longDefinition']['@value'])) ? $record_info['longDefinition']['@value'] : null,
            'codingNote' => (!empty($record_info['codingNote'])) ? $record_info['codingNote']['@value'] : null ,
            'foundation_url' => (!empty($record_info['source'])) ? $record_info['source'] : null,
            'synonym' => (!empty($record_info['synonym'])) ? $record_info['synonym'] : null,
            'narrowerTerm' => (!empty($record_info['narrowerTerm'])) ? $record_info['narrowerTerm'] : null,
            'exclusions' => (!empty($record_info['exclusions'])) ? $record_info['exclusions'] : null,
            'relatedEntitiesInPerinatalChapter' => (!empty($record_info['relatedEntitiesInPerinatalChapter'])) ? $record_info['relatedEntitiesInPerinatalChapter'] : null,
            'relatedEntitiesInMaternalChapter' => (!empty($record_info['relatedEntitiesInMaternalChapter'])) ? $record_info['relatedEntitiesInMaternalChapter'] : null,
            'diagnosticCriteria' => (!empty($record_info['diagnosticCriteria'])) ? $record_info['diagnosticCriteria'] : null,
            'fullySpecifiedName' => (!empty($record_info['fullySpecifiedName'])) ? $record_info['fullySpecifiedName'] : null,
            'parent' => (!empty($record_info['parent'])) ? $record_info['parent'] : null,
            'ancestor' => (!empty($record_info['ancestor'])) ? $record_info['ancestor'] : null,
            'descendant' => (!empty($record_info['descendant'])) ? $record_info['descendant'] : null,
            'foundationChildElsewhere' => (!empty($record_info['foundationChildElsewhere'])) ? $record_info['foundationChildElsewhere'] : null,
            'indexTerm' => (!empty($record_info['indexTerm'])) ? $record_info['indexTerm'] : null,
            'inclusion' => (!empty($record_info['inclusion'])) ? $record_info['inclusion'] : null,
            'exclusion' => (!empty($record_info['exclusion'])) ? $record_info['exclusion'] : null,
            'postcoordinationScale' => (!empty($record_info['postcoordinationScale'])) ? $record_info['postcoordinationScale'] : null,
            'browserUrl' => $record_info['browserUrl'],
            'api_data' =>  $record_info,
            'is_scraped' => 'record_info_done'
        ]);
    }
}
