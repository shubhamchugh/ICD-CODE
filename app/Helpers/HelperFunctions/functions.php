<?php

use Illuminate\Support\Str;

function http_to_https($url)
{
   return Str::replace('http://', 'https://', $url);
}