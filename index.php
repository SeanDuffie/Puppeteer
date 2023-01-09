<?php
    include "./curl.php";

    $APP = "Coffee Maker";
    $BACK = "#000000";
    $COLOR = "#800000";
    $TEXT = "#FFFFFF";
    $output0 = 5;
    $output1 = 32;
    $output2 = 33;
    $output3 = 25;
    $output0State = "ON";
    $output1State = "OFF";
    $output2State = "OFF";
    $output3State = "OFF";
// <!DOCTYPE html>
//     <html>
//         <head>
        //     <title> Smart-Press | $APP </title>""
        //     <meta name="viewport" content="width=device-width, initial-scale=1">
        //     <link rel="icon" href="data:,"> -->

        //     <style>
        //         html { font-family: Helvetica; color: #FFFFFF; display: inline-block; margin: 0px auto; text-align: center; }
        //         .bg { background-color: #000000; }
        //         .button1 { background-color: #800000; border: none; color: #FFFFFF; padding: 16px 40px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }
        //         .button0 { background-color: #FFFFFF; border: none; color: #800000; padding: 16px 32px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }
        //     </style>

        //     <meta http-equiv="refresh" content="20">
        // </head>

        // <body class="bg">
        //     <h1>RPi Web Server</h1>
        // echo get(1, "ON");

                echo "<p>GPIO $output3 - Currently $output3State</p>";
                if ($output3State="OFF")
                //     echo get(3, "ON");
                    echo "<p><a href=get(3,\"ON\")><button class=\"button1\">ON</button></a>";
                else
                //     echo get(3, "OFF");
                    echo "<p><a href=get(3,\"OFF\")><button class=\"button0\">OFF</button></a></p>";

                echo "<p>GPIO $output2 - Currently $output2State</p>";
                if ($output2State="OFF")
                //     echo get(2, "ON");
                    echo "<p><a href=get(2,\"ON\")><button class=\"button1\">ON</button></a>";
                else
                //     echo get(2, "OFF");
                    echo "<p><a href=\"get(2,\"OFF\")><button class=\"button0\">OFF</button></a></p>";

                echo "<p>GPIO $output1 - Currently $output1State</p>";
                if ($output1State="OFF")
                //     echo get(1, "ON");
                    echo "<p><a href=get(1,\"ON\")><button class=\"button1\">ON</button></a>";
                else
                //     echo get(1, "OFF");
                    echo "<p><a href=get(1,\"OFF\")><button class=\"button0\">OFF</button></a></p>";

                echo "<p>GPIO $output0 - Currently $output0State</p>";
                if ($output0State="OFF")
                //     echo get(0, "ON");
                    echo "<p><a href=get(0,\"ON\")><button class=\"button1\">ON</button></a>";
                else
                //     echo get(0, "OFF");
                    echo "<p><a href=get(0,\"OFF\")><button class=\"button0\">OFF</button></a></p>";
?>
