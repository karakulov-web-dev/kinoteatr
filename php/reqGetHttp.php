<?php

function reqGetHttp($url) {
    $opts = array(
        'http' =>
        array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n", 
            'method'  => 'GET'
        )
    );
    $context  = stream_context_create($opts);
    $data = json_decode(file_get_contents($url, false, $context));
    return $data;
}
