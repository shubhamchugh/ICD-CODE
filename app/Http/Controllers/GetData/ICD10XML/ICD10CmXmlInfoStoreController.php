<?php

namespace App\Http\Controllers\GetData\ICD10XML;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ICD10\Icd10CmXmlRecord;
use App\Models\ICD10\Icd10CmXmlRelease;
use Illuminate\Support\Facades\Storage;

class ICD10CmXmlInfoStoreController extends Controller
{
    public function index()
    {
        $icd10release = Icd10CmXmlRelease::where('is_fetch', 'pending')->first();

        if (!empty($icd10release)) {
            $filePath = 'public/Data/ICD10CM/icd10cm_'.$icd10release->releaseYear.'.xml';
            $filePath = Storage::path($filePath);

            $icdObject = simplexml_load_file($filePath);

            $icd10release->update([
                'title' => $icdObject->introduction->introSection[0]->title,
                'is_fetch' => 'start',
            ]);
        }

        //insert chapters
        if (!empty($icdObject->chapter)) {
            foreach ($icdObject->chapter as $chapter) {
                $chapter_code = (!empty($chapter->desc)) ? trim(Str::between($chapter->desc, '(', ')')) : null;
                $chapter_desc = (!empty($chapter->desc)) ? trim(Str::before($chapter->desc, '(')) : null;
                echo "<h1>Chapter : $chapter_code</h1><br>";

                $chapter_store = Icd10CmXmlRecord::firstOrCreate([
                    'releaseYear' => $icd10release->releaseYear,
                    'code' => $chapter_code,
                    'chapter_code' => $chapter_code,
                    'parent_id' => null,
                    'classKind' => 'chapter',
                    'title' =>  $chapter_desc,
                    'includes' => (!empty($chapter->includes)) ? json_encode($chapter->includes) : null,
                    'inclusionTerm' => (!empty($chapter->inclusionTerm)) ? json_encode($chapter->inclusionTerm) : null,
                    'notes' => (!empty($chapter->notes)) ? json_encode($chapter->notes) : null,
                    'codeFirst' => (!empty($chapter->codeFirst)) ? json_encode($chapter->codeFirst) : null,
                    'codeAlso' => (!empty($chapter->codeAlso)) ? json_encode($chapter->codeAlso) : null,
                    'useAdditionalCode' => (!empty($chapter->useAdditionalCode)) ? json_encode($chapter->useAdditionalCode) : null,
                    'excludes1' => (!empty($chapter->excludes1)) ? json_encode($chapter->excludes1) : null,
                    'excludes2' => (!empty($chapter->excludes2)) ? json_encode($chapter->excludes2) : null,
                ]);
                foreach ($chapter->section as $section) {
                    if (!empty($section->attributes()->id)) {
                        echo '<h2>-->section : '.$section->attributes()->id.'</h2><br>';
                        $block_desc_single = (!empty($section->desc)) ? trim(Str::before($section->desc, '(')) : null;
                        $block_store =   Icd10CmXmlRecord::firstOrCreate([
                            'releaseYear' => $icd10release->releaseYear,
                          'code' => $section->attributes()->id,
                          'section_code' =>$section->attributes()->id,
                          'title' => $block_desc_single,
                          'parent_id' => $chapter_store->id,
                          'classKind' => 'section',
                          ]);
                    }

                    foreach ($section->diag as $branch) {
                        echo "<h3>---->Branch: $branch->name</h3>";
                        $branch_store =   Icd10CmXmlRecord::firstOrCreate([
                            'releaseYear' => $icd10release->releaseYear,
                                'code' => $branch->name,
                                'branch_code' => $branch->name,
                                'parent_id' => $block_store->id,
                                'classKind' => 'branch',
                                'title' => $branch->desc,
                                'includes' => (!empty($branch->includes)) ? json_encode($branch->includes) : null,
                                'inclusionTerm' => (!empty($branch->inclusionTerm)) ? json_encode($branch->inclusionTerm) : null,
                                'notes' => (!empty($branch->notes)) ? json_encode($branch->notes) : null,
                                'codeFirst' => (!empty($branch->codeFirst)) ? json_encode($branch->codeFirst) : null,
                                'codeAlso' => (!empty($branch->codeAlso)) ? json_encode($branch->codeAlso) : null,
                                'useAdditionalCode' => (!empty($branch->useAdditionalCode)) ? json_encode($branch->useAdditionalCode) : null,
                                'excludes1' => (!empty($branch->excludes1)) ? json_encode($branch->excludes1) : null,
                                'excludes2' => (!empty($branch->excludes2)) ? json_encode($branch->excludes2) : null,
                            ]);


                            if (!empty($branch->diag)) {
                                foreach ($branch->diag as $leaf) {
                                    echo "<h4>----------> Leaf: $leaf->name</h4>";
                                    $leaf_store =   Icd10CmXmlRecord::firstOrCreate([
                                        'releaseYear' => $icd10release->releaseYear,
                                          'code' => $leaf->name,
                                          'leaf_code' => $leaf->name,
                                          'parent_id' => $branch_store->id,
                                          'classKind' => 'leaf',
                                          'title' => $leaf->desc,
                                          'includes' => (!empty($leaf->includes)) ? json_encode($leaf->includes) : null,
                                          'inclusionTerm' => (!empty($leaf->inclusionTerm)) ? json_encode($leaf->inclusionTerm) : null,
                                          'notes' => (!empty($leaf->notes)) ? json_encode($leaf->notes) : null,
                                          'codeFirst' => (!empty($leaf->codeFirst)) ? json_encode($leaf->codeFirst) : null,
                                          'codeAlso' => (!empty($leaf->codeAlso)) ? json_encode($leaf->codeAlso) : null,
                                          'useAdditionalCode' => (!empty($leaf->useAdditionalCode)) ? json_encode($leaf->useAdditionalCode) : null,
                                          'excludes1' => (!empty($leaf->excludes1)) ? json_encode($leaf->excludes1) : null,
                                          'excludes2' => (!empty($leaf->excludes2)) ? json_encode($leaf->excludes2) : null,
                                      ]);

                                      if (!empty($leaf->diag)) {
                                        foreach ($leaf->diag as $subLeaf) {
                                            echo "<h5>-------------------->SubLeaf: $subLeaf->name</h5>";

                                            Icd10CmXmlRecord::firstOrCreate([
                                                'releaseYear' => $icd10release->releaseYear,
                                                'code' => $subLeaf->name,
                                                'sub_leaf_code' => $subLeaf->name,
                                                'parent_id' => $leaf_store->id,
                                                'classKind' => 'sub-leaf',
                                                'title' => $subLeaf->desc,
                                                'includes' => (!empty($subLeaf->includes)) ? json_encode($subLeaf->includes) : null,
                                                'inclusionTerm' => (!empty($subLeaf->inclusionTerm)) ? json_encode($subLeaf->inclusionTerm) : null,
                                                'notes' => (!empty($subLeaf->notes)) ? json_encode($subLeaf->notes) : null,
                                                'codeFirst' => (!empty($subLeaf->codeFirst)) ? json_encode($subLeaf->codeFirst) : null,
                                                'codeAlso' => (!empty($subLeaf->codeAlso)) ? json_encode($subLeaf->codeAlso) : null,
                                                'useAdditionalCode' => (!empty($subLeaf->useAdditionalCode)) ? json_encode($subLeaf->useAdditionalCode) : null,
                                                'excludes1' => (!empty($subLeaf->excludes1)) ? json_encode($subLeaf->excludes1) : null,
                                                'excludes2' => (!empty($subLeaf->excludes2)) ? json_encode($subLeaf->excludes2) : null,
                                            ]);
                                        }
                                      }




                                }
                            }





                    }





                }
            }
        }

        $icd10release->update([
            'is_fetch' => 'done',
        ]);
    }
}
