<?php


/**
 * Отправка данный в Битрикс24
 * @param mixed $param
 * 
 * @return [type]
 */
function sendToB24($param){
    $appParams = http_build_query([
        'halt' => 0,
        'cmd' => $param
    ]);
    $appRequestUrl = #WEBHOOK#.'batch';
    $curl=curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $appRequestUrl,
        CURLOPT_POSTFIELDS => $appParams
    ));
    $out=curl_exec($curl);
    curl_close($curl);
    $result = json_decode($out, 1);
    return $result;
}