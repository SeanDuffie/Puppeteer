
<!DOCTYPE html>
    <html>
        <head>

            <?php
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
            ?>

            <title> Smart-Press | Coffee Maker </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="data:,">

            <style>
                html { font-family: Helvetica; color: #FFFFFF; display: inline-block; margin: 0px auto; text-align: center; }
                .bg { background-color: #000000; }
                .button1 { background-color: #800000; border: none; color: #FFFFFF; padding: 16px 40px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }
                .button0 { background-color: #FFFFFF; border: none; color: #800000; padding: 16px 32px; text-decoration: none; font-size: 30px; margin: 2px; cursor: pointer; }
            </style>

            <meta http-equiv="refresh" content="20">
        </head>

        <body class="bg">
            <h1>RPi Web Server</h1>

            <?php echo "<p>GPIO $output3 - Currently $output3State</p>";
                if ($output3State="OFF")
                    echo "<p><a href=\"/3/ON\"><button class=\"button1\">ON</button></a>";
                else
                    echo "<p><a href=\"/3/OFF\"><button class=\"button0\">OFF</button></a></p>";

                echo "<p>GPIO $output2 - Currently $output2State</p>";
                if ($output2State="OFF")
                    echo "<p><a href=\"/2/ON\"><button class=\"button1\">ON</button></a>";
                else
                    echo "<p><a href=\"/2/OFF\"><button class=\"button0\">OFF</button></a></p>";

                echo "<p>GPIO $output1 - Currently $output1State</p>";
                if ($output1State="OFF")
                    echo "<p><a href=\"/1/ON\"><button class=\"button1\">ON</button></a>";
                else
                    echo "<p><a href=\"/1/OFF\"><button class=\"button0\">OFF</button></a></p>";

                echo "<p>GPIO $output0 - Currently $output0State</p>";
                if ($output0State="OFF")
                    echo "<p><a href=\"/0/ON\"><button class=\"button1\">ON</button></a>";
                else
                    echo "<p><a href=\"/0/OFF\"><button class=\"button0\">OFF</button></a></p>";


                $ch = curl_init();
                $fp = fopen("example_homepage.txt", "w");

                curl_setopt($ch, CURLOPT_URL, "http://192.168.0.177/3/OFF");

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $server_output = curl_exec($ch);
                
                if(curl_error($ch)) {
                    fwrite($fp, curl_error($ch));
                }

                echo "<p>$server_output</p>";

                curl_close($ch);
                fclose($fp);
            ?>

        </body>
    </html>
