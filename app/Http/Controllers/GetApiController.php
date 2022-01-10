<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetApiController extends Controller
{
    public function getKota()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://countriesnow.space/api/v0.1/countries/cities',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "country": "indonesia"
        }',
        CURLOPT_HTTPHEADER => ['Content-Type: application/json']
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $kota = json_decode($response, true);

        sort($kota['data']);

        return $kota;
    }
}
