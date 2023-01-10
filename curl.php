<?php
// Sends curl GET to the esp32

function get($pin, $state) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://192.168.0.177/$pin/$state");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);

    curl_close($ch);

    return $server_output;
}

?>