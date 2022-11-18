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
                        'language' => $record->language,
                        'parent_id' => $record->id,
                        'releaseId' => $record->releaseId,
                        'releaseDate' => $record->releaseDate,
                        'linear_url' => http_to_https($record_child),
                    ]);
                }
            }
            $record->update([
                'is_scraped' => 'record_fetch_done'
            ]);
        } else {
            echo "No Record Found for Store any child";
        }
    }
}