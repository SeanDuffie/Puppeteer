<?php
/** https://docs.php.earth/faq/misc/structure/
 *  TODO:
 *  - Acquire Pin state from node directly, not initialized here
 *  - Acquire list of available pins from node as well
 *  - Allow for different IPs/URLs to be contacted if there are multiple nodes
 *  - Create a list of node IPs somehow (brainstorm below)
 *      - Scan a list of all devices on the local network
 *      - Add a text form to the home page for appending to the list of devices
 *      - Read in the list of devices from an external txt file
 *  - Have a separate page for each device using a nav panel
 */
    include "./curl.php";

    $APP = "Coffee Maker";
    $BACK = "#000000";
    $COLOR = "#800000";
    $TEXT = "#FFFFFF";

    /** FIXME: Add a way for multiple urls handled separately **/
    $URL = "http://192.168.0.177";

    /** FIXME: These pin values should ideally not be hardcoded, maybe receive a list from the node **/
    $output0 = 5;
    $output1 = 32;
    $output2 = 33;
    $output3 = 25;

    /** FIXME: I need these variables to be read from the nodes directly, not through  **/
    $output0State = getPin($URL, $output0);
    $output1State = getPin($URL, $output1);
    $output2State = getPin($URL, $output2);
    $output3State = getPin($URL, $output3);

    echo "<!DOCTYPE html><html>
    <head>
        <title> Smart-Press | $APP </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='icon' href='data:,'>
        <link href='test.css' rel='stylesheet' type='text/css'/>
        <style>
            html { font-family: Helvetica; color: $TEXT; display: inline-block; margin: 0px auto; text-align: center; }
            .bg { background-color: $BACK; }
            .ON { background-color: $COLOR; border: none; color: $TEXT; padding: 16px 40px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }
            .OFF { background-color: $TEXT; border: none; color: $COLOR; padding: 16px 32px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }
            </style>
        <meta http-equiv='refresh' content='20'>
    </head>
    <body class='bg'>
        <h1>RPi Web Server</h1>\n";

    /** Handle Button Inputs **/
    if (array_key_exists($output0, $_POST)) {
        if (str_contains($output0State, "ON")) { $output0State = "OFF"; }
        elseif (str_contains($output0State, "OFF")) { $output0State = "ON"; }
        else { echo "ERROR WITH $output0!"; }
        setPin($URL, $output0, $output0State);
    }
    else if (array_key_exists($output1, $_POST)) {
        if (str_contains($output1State, "ON")) { $output1State = "OFF"; }
        elseif (str_contains($output1State, "OFF")) { $output1State = "ON"; }
        else { echo "ERROR WITH $output1!"; }
        setPin($URL, $output1, $output1State);
    }
    else if (array_key_exists($output2, $_POST)) {
        if (str_contains($output2State, "ON")) { $output2State = "OFF"; }
        elseif (str_contains($output2State, "OFF")) { $output2State = "ON"; }
        else { echo "ERROR WITH $output2!"; }
        setPin($URL, $output2, $output2State);
    }
    else if (array_key_exists($output3, $_POST)) {
        if (str_contains($output3State, "ON")) { $output3State = "OFF"; }
        elseif (str_contains($output3State, "OFF")) { $output3State = "ON"; }
        else { echo "ERROR WITH $output3!"; }
        setPin($URL, $output3, $output3State);
    }

    /** Display Button Forms to HTML */
    echo "\t<form method='post'>
        <p>GPIO $output0 - Currently $output0State</p>
        <p><input class=$output0State type='submit' name='$output0' value='$output0State'/></p>
        <p>GPIO $output1 - Currently $output1State</p>
        <p><input type='submit' class=$output1State name='$output1' value='$output1State'/></p>
        <p>GPIO $output2 - Currently $output2State</p>
        <p><input type='submit' class=$output2State name='$output2' value='$output2State'/></p>
        <p>GPIO $output3 - Currently $output3State</p>
        <p><input type='submit' class=$output3State name='$output3' value='$output3State'/></p>
    </form>\n";

    // header("Content-type: text/plain");
    echo $_GET["setup"];

    echo "\t<script type='text/javascript'></script>
    </body>
</html>";
?>
