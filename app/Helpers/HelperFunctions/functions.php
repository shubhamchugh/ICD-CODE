<?php

use App\Models\ICD11\Icd11Release;
use Illuminate\Support\Str;

function http_to_https($url)
{
   return Str::replace('http://', 'https://', $url);
}


function icd_11_lang_available($releaseId)
{
   $release_lang = Icd11Release::where('releaseId',$releaseId)->first();

   if (empty($release_lang)) {
      $lang_available['releaseId'] = $releaseId;
      $lang_available['status'] = 404;
      return $lang_available;
   }
  
   $release_lang = $release_lang->lang;
   $release_lang = json_decode($release_lang,true);
   
   foreach ($release_lang as $value) 
   {
       if (array_key_exists($value, tongue()->speaking()->all())) 
       {
           $main_lang = tongue()->speaking()->all();
           $lang_available[$value] = $main_lang[$value];
       }
   }
   return $lang_available;
}