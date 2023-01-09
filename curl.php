<?php
// Sends curl GET to the esp32

function get($pin, $state) {

    $ch = curl_init();
    $fp = fopen("example_homepage.txt", "w");

    curl_setopt($ch, CURLOPT_URL, "http://192.168.0.177/$pin/$state");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    
    if(curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }

    echo "<p>$server_output</p>";

    curl_close($ch);
    fclose($fp);

    return $server_output;
}

?>