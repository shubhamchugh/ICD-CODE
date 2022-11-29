<?php

namespace App\Http\Controllers\GetData\ICD11;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\Exclusion;
use App\Models\FoundationChildElsewhere;
use App\Models\ICD11\Icd11Record;
use Illuminate\Http\Request;


class Icd11RecordStoreController extends Controller
{
    public function RecordStore()
    {

        /**************************************
         * BLOCK & CHAPTERS RECORD STORE ONLY *
        **************************************/
        $record = Icd11Record::where('is_fetch', 'pending')->first();

        if (!empty($record)) {

            $record->update([
                'is_fetch' => 'record_info_scrape_start'
            ]);

            $record_detail = ICD_API::request($record->linear_url, $record->language);
            if (!empty($record_detail['child'])) {
                foreach ($record_detail['child'] as $record_child) {
                    Icd11Record::firstOrCreate([
                        'language' => $record->language,
                        'parent_id' => $record->id,
                        'releaseId' => $record->releaseId,
                        'releaseDate' => $record->releaseDate,
                        'linear_url' => http_to_https($record_child),
                    ]);
                }
            }
            $record->update([
                'is_fetch' => 'record_fetch_done'
            ]);
        } else {
            echo "No Record Found for Store any child";
        }
    }
}
