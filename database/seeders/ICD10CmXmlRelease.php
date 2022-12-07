<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ICD10CmXmlRelease extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $release = ['2023','2022','2021','2020','2019','2018','2017','2016','2015','2014'];
        foreach ($release as $releaseId) {
            DB::table('icd10_cm_xml_releases')->insert([
                'releaseId' => $releaseId,
                'releaseYear' => $releaseId,
                'language' => 'en',
            ]);
        }
    }
}
