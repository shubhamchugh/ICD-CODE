<?php

namespace App\Http\Controllers\ICD11;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\Exclusion;
use App\Models\FoundationChildElsewhere;
use App\Models\Icd11Records;
use Illuminate\Http\Request;

class RecordCheckController extends Controller
{
    public function RecordCheck()
    {
        /**************************************
         * BLOCK & CHAPTERS RECORD STORE ONLY *
         **************************************/

        $record = Icd11Records::where('is_scraped', 'pending')->first();

        if (!empty($record)) {
            $record_detail = ICD_API::request($record->linear_url, $record->language);
            if (!empty($record_detail['child'])) {
                foreach ($record_detail['child'] as $record_child) {
                    Icd11Records::firstOrCreate([
                        'parent_id' => $record->id,
                        'linear_url' => http_to_https($record_child),
                    ]);
                }
            }
            $record->update([
                'is_scraped' => 'done'
            ]);
        } else {
            echo "No Record Found for Store any child";
        }

        // //Chapters Blocks Store
        // if ($record_details['classKind'] !== 'category') {

        //     foreach ($record_details['child'] as  $child) {
        //         $record_saved =  Icd11Records::firstOrCreate([
        //          'code' => (!empty($record_details['code'])) ? $record_details['code'] : null,
        //          'classKind' => (!empty($record_details['classKind'])) ? $record_details['classKind'] : null,
        //          'blockId' => (!empty($record_details['blockId'])) ? $record_details['blockId'] : null,
        //          'codeRange' => (!empty($record_details['codeRange'])) ? $record_details['codeRange'] : null,
        //          'title' => $record_details['title']['@value'],
        //          'definition' => (!empty($record_details['definition']['@value'])) ? $record_details['definition']['@value'] : null,
        //          'codingNote' => (!empty($record_details['codingNote'])) ? $record_details['codingNote']['@value'] : null ,
        //          'releaseId' => (!empty($record_details['releaseId'])) ? $record_details['releaseId'] : null,
        //          'releaseDate' => (!empty($record_details['releaseDate'])) ? $record_details['releaseDate'] : null,
        //          'language' => $record_details['title']['@language'],
        //          'parent_id' => $new_record->id,
        //          'foundation_url' => (!empty($record_details['source'])) ? $record_details['source'] : null,
        //          'browserUrl' => $record_details['browserUrl'],
        //          'linear_url' => http_to_https($child),
        //     ]);
        //     }

        //     if (!empty($record_details['exclusion'])) {
        //         foreach ($record_details['exclusion'] as $exclusion) {
        //             Exclusion::firstOrCreate([
        //                 'record_id' => $new_record->id,
        //                 'language' => $exclusion['label']['@language'],
        //                 'value' => (!empty($exclusion['label']['@value'])) ? $exclusion['label']['@value'] : Null,
        //                 'foundationReference' => (!empty($exclusion['foundationReference'])) ? $exclusion['foundationReference'] : Null,
        //                 'linearizationReference' => (!empty($exclusion['linearizationReference'])) ? $exclusion['linearizationReference'] : null,
        //             ]);
        //         }
        //     }

        //     if (!empty($record_details['foundationChildElsewhere'])) {
        //         foreach ($record_details['foundationChildElsewhere'] as $Elsewhere) {
        //             FoundationChildElsewhere::firstOrCreate([
        //                 'record_id' => $new_record->id,
        //                 'language' => $Elsewhere['label']['@language'],
        //                 'value' => (!empty($Elsewhere['label']['@value'])) ? $Elsewhere['label']['@value'] : Null,
        //                 'foundationReference' => (!empty($Elsewhere['foundationReference'])) ? $Elsewhere['foundationReference'] : null,
        //                 'linearizationReference' => (!empty($Elsewhere['linearizationReference'])) ? $Elsewhere['linearizationReference'] : Null,
        //             ]);
        //         }
        //     }
        // }
    }
}
