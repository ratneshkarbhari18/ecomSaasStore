<?php
namespace App\Controllers;

class ApiService extends BaseController
{

    private $mgtSiteUrl = "http://localhost/products/zCommerceMgt/";

    private $key = "619f53ed0e5d2";

    public function post($url,$data)
    {
        $url = $this->mgtSiteUrl.$url;

        $data["key"] = $this->key;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;

    }

}