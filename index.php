<?php
// https://docs.php.earth/faq/misc/structure/
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

    if(array_key_exists('button1', $_POST)) {
        get(1, "ON");
    }
    else if(array_key_exists('button2', $_POST)) {
        get(1, "ON");
    }

echo "<!DOCTYPE html><html>";
    echo "<head>";
        echo "<title> Smart-Press | $APP </title>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
        echo "<link rel='icon' href='data:,'>";

        echo "<style>";
        echo "html { font-family: Helvetica; color: $TEXT; display: inline-block; margin: 0px auto; text-align: center; }";
        echo ".bg { background-color: $BACK; }";
        echo ".ON { background-color: $COLOR; border: none; color: $TEXT; padding: 16px 40px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }";
        echo ".OFF { background-color: $TEXT; border: none; color: $COLOR; padding: 16px 32px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }";
        echo "</style>";

        echo "<meta http-equiv='refresh' content='20'>";
    echo "</head>";

    echo "<body class='bg'>";
        echo "<h1>RPi Web Server</h1>";
        
        if (isset($_POST[$output0])) {
            if ($_POST[$output0] == "ON") {
                echo "output0 ON";
                $output0State = "ON";
                get(0, "ON");
            } elseif ($_POST[$output0] == "OFF") {
                echo "output0 OFF";
                $output0State = "OFF";
                get(0, "OFF");
            }
        }
        if (isset($_POST[$output1])) {
            if ($_POST[$output1] == "ON") {
                echo "output1 ON";
                $output1State = "ON";
                get(1, "ON");
            } elseif ($_POST[$output1] == "OFF") {
                echo "output1 OFF";
                $output1State = "OFF";
                get(1, "OFF");
            }
        }
        if (isset($_POST[$output2])) {
            if ($_POST[$output2] == "ON") {
                echo "output2 ON";
                $output2State = "ON";
                get(2, "ON");
            } elseif ($_POST[$output2] == "OFF") {
                echo "output2 OFF";
                $output2State = "OFF";
                get(2, "OFF");
            }
        }
        if (isset($_POST[$output3])) {
            if ($_POST[$output3] == "ON") {
                echo "output3 ON";
                $output3State = "ON";
                get(3, "ON");
            } elseif ($_POST[$output3] == "OFF") {
                echo "output3 OFF";
                $output3State = "OFF";
                get(3, "OFF");
            }
        }

        echo "<form  method='post'>";
            echo "<input type='button' class=$output0State name='$output0' value='$output0'>";
            echo "<input type='button' class=$output1State name='$output1' value='$output1'>";
            echo "<input type='button' class=$output2State name='$output2' value='$output2'>";
            echo "<input type='button' class=$output3State name='$output3' value='$output3'>";
        echo "</form>";

        echo "<p>$_POST[$output3]</p>";

            // echo "<p>GPIO $output3 - Currently $output3State</p>";
            // if ($output3State="OFF")
            //     get(3, "ON");
            //     echo "<p><a href=get(3,\"ON\")><button class=\"button1\">ON</button></a>";
            // else
            //     get(3, "OFF");
            //     echo "<p><a href=get(3,\"OFF\")><button class=\"button0\">OFF</button></a></p>";

            // // echo "<p>GPIO $output2 - Currently $output2State</p>";
            // if ($output2State="OFF")
            //     get(2, "ON");
            //     echo "<p><a href=get(2,\"ON\")><button class=\"button1\">ON</button></a>";
            // else
            //     get(2, "OFF");
            //     echo "<p><a href=\"get(2,\"OFF\")><button class=\"button0\">OFF</button></a></p>";

            // echo "<p>GPIO $output1 - Currently $output1State</p>";
            // if ($output1State="OFF")
            //     get(1, "ON");
            //     echo "<p><a href=get(1,\"ON\")><button class=\"button1\">ON</button></a>";
            // else
            //     get(1, "OFF");
            //     echo "<p><a href=get(1,\"OFF\")><button class=\"button0\">OFF</button></a></p>";

            // echo "<p>GPIO $output0 - Currently $output0State</p>";
            // if ($output0State="OFF")
            //     get(0, "ON");
            //     echo "<p><a href=get(0,\"ON\")><button class=\"button1\">ON</button></a>";
            // else
            //     get(0, "OFF");
            //     echo "<p><a href=get(0,\"OFF\")><button class=\"button0\">OFF</button></a></p>";
?>
