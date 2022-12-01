<?php

namespace App\Http\Controllers\GetData\ICD10;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10Record;
use Illuminate\Http\Request;

class ICD10RecordStoreController extends Controller
{
    public function RecordStore()
    {
        $record =  Icd10Record::where('is_fetch', 'pending')->first();

        if (empty($record)) {
            return "Please get some books before fetch records";
        }

        if (!empty($record)) {
            $record->update([
                'is_fetch' => 'record_info_fetch_start'
            ]);
        }
        $record_detail = ICD_API::request($record->linear_url, $record->language);

        if (!empty($record_detail['child'])) {
            foreach ($record_detail['child'] as $record_child) {
                Icd10Record::firstOrCreate([
                    'language' => $record->language,
                    'parent_id' => $record->id,
                    'releaseId' => $record->releaseId,
                    'releaseDate' => $record->releaseDate,
                    'linear_url' => http_to_https($record_child),
                ]);
            }
        }

        if (!empty($record)) {
            $record->update([
                'is_fetch' => 'record_record_store'
            ]);
        }
    }
}
