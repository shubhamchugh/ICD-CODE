<?php

namespace App\Http\Controllers;

use App\Helpers\HelperClasses\ICD\ICD_API;
use App\Models\mms_2022_02_en_icd_11;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;



class TestController extends Controller
{
    public function test()
    {
		return ICD_API::request('https://id.who.int/icd/release/11/mms/1435254666');
	}
}
