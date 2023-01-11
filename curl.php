<?php
// Sends curl GET to the esp32

function getpin($url, $pin) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "$url/$pin");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);

    curl_close($ch);

    return $server_output;
}

function get($url, $pin, $state) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "$url/$pin/$state");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);

    curl_close($ch);

    return $server_output;
}

?>