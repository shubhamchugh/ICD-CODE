<?php

function icd_headers_curl($request_url , $lang = Null)
{
    $lang = (!empty($lang)) ? $lang : 'en';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$request_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $headers = [
        'accept: application/json',
        'API-Version: v2',
        'Accept-Language:'. $lang,
        'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYmYiOjE2NjgyNDE3NzgsImV4cCI6MTY2ODI0NTM3OCwiaXNzIjoiaHR0cHM6Ly9pY2RhY2Nlc3NtYW5hZ2VtZW50Lndoby5pbnQiLCJhdWQiOlsiaHR0cHM6Ly9pY2RhY2Nlc3NtYW5hZ2VtZW50Lndoby5pbnQvcmVzb3VyY2VzIiwiaWNkYXBpIl0sImNsaWVudF9pZCI6ImIzYjBhOGU3LTdmNmMtNDk4Ny1iMzg0LTBmNmQyNDExODY1ZF8yMWNjMzhjZi0wMGUyLTQzNTctOGE5MC05YzdiMTNiOWQ0ZTkiLCJzY29wZSI6WyJpY2RhcGlfYWNjZXNzIl19.ZUIwxujhWl5Lc_8l8H1fKhbHIISjECSR-WFgBvo5O1X1BhdxhUgnB8FGCq9YM2dyK2YJiWA3-75h-xrBx_QUxvKwoCJrAwQZ7Ei6sTFVZ9z2eJwDqmAv5f3mz7ggJQyRVynUUwl-Q5EXKwRgL5q73JIYH_tXgkD4anoVZn2gOM1f-0eZrPwiNDRjI_A2gnKzWC6Jl4C-je9w5BVtQ0RNk93eD5B-fSPm4EsI2PjLbnh3wXloV3u3GBZvt3eYzalEsdpr4E2yG-fc_v8EIpsb3bjPqjwzWg56bn7HPXn43nDnCKKhwKsCj2MOuZQiE-UBc_9Dd8zpT82JSHvRPqY4tQ'
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec ($ch);    
    curl_close ($ch);

    return  $server_output ;
}
