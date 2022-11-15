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
        $new_record = Icd11Records::where('is_scraped', 'pending')->first();

        if (empty($new_record)) {
            return "No New Record Found";
        }

        $record_details = ICD_API::request($new_record->linear_url, $new_record->language);
        dd($record_details);
        //Blocks Store
        if ((!empty($record_details['classKind'])) != 'category' || (empty($record_details['classKind']))) {
            
            foreach ($record_details['child'] as  $child) {
            $record_saved =  Icd11Records::firstOrCreate([
                 'code' => (!empty($record_details['code'])) ? $record_details['code'] : null,
                 'classKind' => (!empty($record_details['classKind'])) ? $record_details['classKind'] : null,
                 'title' => $record_details['title']['@value'],
                 'definition' => (!empty($record_details['definition']['@value'])) ? $record_details['definition']['@value'] : null,
                 'codingNote' => (!empty($record_details['codingNote'])) ? $record_details['codingNote']['@value'] : null ,
                 'releaseId' => (!empty($record_details['releaseId'])) ? $record_details['releaseId'] : null,
                 'releaseDate' => (!empty($record_details['releaseDate'])) ? $record_details['releaseDate'] : null,
                 'language' => $record_details['title']['@language'],
                 'parent_id' => $new_record->id,
                 'foundation_url' => (!empty($record_details['source'])) ? $record_details['source'] : null,
                 'browserUrl' => $record_details['browserUrl'],
                 'linear_url' => http_to_https($child),
            ]);
            }

            if (!empty($record_details['exclusion'])) {
                foreach ($record_details['exclusion'] as $exclusion) {
                    Exclusion::firstOrCreate([
                        'record_id' => $new_record->id,
                        'language' => $exclusion['label']['@language'],
                        'value' => (!empty($exclusion['label']['@value'])) ? $exclusion['label']['@value'] : Null,
                        'foundationReference' => (!empty($exclusion['foundationReference'])) ? $exclusion['foundationReference'] : Null,
                        'linearizationReference' => (!empty($exclusion['linearizationReference'])) ? $exclusion['linearizationReference'] : null,
                    ]);
                }
            }

            if (!empty($record_details['foundationChildElsewhere'])) {
                foreach ($record_details['foundationChildElsewhere'] as $Elsewhere) {
                    FoundationChildElsewhere::firstOrCreate([
                        'record_id' => $new_record->id,
                        'language' => $Elsewhere['label']['@language'],
                        'value' => (!empty($Elsewhere['label']['@value'])) ? $Elsewhere['label']['@value'] : Null,
                        'foundationReference' => (!empty($Elsewhere['foundationReference'])) ? $Elsewhere['foundationReference'] : null,
                        'linearizationReference' => (!empty($Elsewhere['linearizationReference'])) ? $Elsewhere['linearizationReference'] : Null,
                    ]);
                }
            }
        }

        $new_record->update([
            'is_scraped' => 'done'
        ]);





    }
}
