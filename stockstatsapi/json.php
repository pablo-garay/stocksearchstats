<?php
    header("Access-Control-Allow-Origin: *");
    function generate_error_response($error_message){
        $php_response = ["Error" => "Message: " . $error_message];
        $json_response = json_encode($php_response);
        echo $json_response;
        return $json_response;
    }

    function strval_number_format_round($number, $decimals = 2){
        return strval(number_format(round($number, $decimals), $decimals));
    }

    function get_indicator($number1, $number2, $decimals = 2){
        $rounded_num1 = (number_format(round($number1, $decimals), $decimals));
        $rounded_num2 = (number_format(round($number2, $decimals), $decimals));
        
        if ($rounded_num1 < 0 || $rounded_num2 < 0){
            return -1;
        } else if ($rounded_num1 == 0 && $rounded_num2 == 0){
            return 0;
        } else {
            return 1;
        }
        /*return ($rounded_num > 0 ? 1 : ($rounded_num < 0 ? -1 : 0));*/
    }

    if (isset($_GET["symbol"])){
        /* JSON */
        $json = @file_get_contents("http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=" . rawurlencode(htmlspecialchars($_GET["symbol"])));
        /*echo $json;*/

        if ($json === FALSE){ /* conditional for error handling */
            return generate_error_response("Error while trying to access resource to generate response");
        } else {
            $jsonResultArray = json_decode($json, true);

            // /* for debugging purposes */
            // print_r($jsonResultArray);
            if (isset($jsonResultArray["Message"])){
                return generate_error_response("No symbol matches found for symbol input.  Try another symbol such as MSFT or AAPL");

            } else if ($jsonResultArray["Status"] === "SUCCESS"){

                /* Here comes the Timestamp. It requires a few manipulations to output in the correct format */
                // echo $jsonResultArray["Timestamp"];
                $matches = [];
                preg_match('/^[A-Za-z]{3} ([A-Za-z]{3}) (\d+) (\d{2}:\d{2}:\d{2}) UTC(\S*) (\d{4})$/', $jsonResultArray["Timestamp"], $matches);
                date_default_timezone_set('America/Los_Angeles');
                $date = DateTime::createFromFormat('Y-M-d H:i:s P', 
                                  $matches[5] . "-" . $matches[1]  . "-" . $matches[2] . " " . $matches[3] . " " . $matches[4]);
                // print_r($date);
                $tz = new DateTimeZone('America/Los_Angeles');
                $formatted_timestamp = $date->setTimezone($tz)->format('d F Y, h:i:s a');
                
                /* MarketCap processing */
                if ($jsonResultArray["MarketCap"] >= 1000000000){
                    $formatted_marketcap = strval_number_format_round($jsonResultArray["MarketCap"] / 1000000000, 2) . " Billion";
                } else if ($jsonResultArray["MarketCap"] >= 1000000){
                    $formatted_marketcap = strval_number_format_round($jsonResultArray["MarketCap"] / 1000000, 2) . " Million";
                } else {
                    $formatted_marketcap = strval_number_format_round($jsonResultArray["MarketCap"], 2);
                }
                
                $php_response = [
                    'Name' => $jsonResultArray["Name"],
                    'Symbol' => $jsonResultArray["Symbol"],
                    'Last Price' => "$ " .  strval_number_format_round($jsonResultArray["LastPrice"], 2),
                    'Change (Change Percent)' => strval_number_format_round($jsonResultArray["Change"], 2) . 
                                         " ( " . strval_number_format_round($jsonResultArray["ChangePercent"], 2) . "%" . " )",
                    'Change Indicator' => get_indicator($jsonResultArray["Change"], $jsonResultArray["ChangePercent"], 2),
                    'Time and Date' => $formatted_timestamp,
                    'Market Cap' => $formatted_marketcap,
                    'Volume' => strval($jsonResultArray["Volume"]),
                    'Change YTD (Change Percent YTD)' => strval_number_format_round($jsonResultArray["ChangeYTD"], 2). 
                                                 " ( " . strval_number_format_round($jsonResultArray["ChangePercentYTD"], 2) . "%" . " )",
                    'Change YTD Indicator' => get_indicator($jsonResultArray["ChangeYTD"], $jsonResultArray["ChangePercentYTD"], 2),
                    'High' => "$ " .  strval_number_format_round($jsonResultArray["High"], 2),
                    'Low' => "$ " .  strval_number_format_round($jsonResultArray["Low"], 2),
                    'Open' => "$ " .  strval_number_format_round($jsonResultArray["Open"], 2)
                ];
                
                $json_response = json_encode($php_response);
                echo ($json_response);

            } else {
                return generate_error_response("There is no stock information available");
            }						
        }

    } else if(isset($_GET["input"])){
        /* JSON */
        $json = @file_get_contents( 'http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=' . rawurlencode(htmlspecialchars($_GET["input"])) );
        
        if ($json === FALSE){ /* conditional for error handling */
            return generate_error_response("Error while trying to access resource to generate response");
        } else {
            echo $json;
            /*if ($xmlElement->count() == 0) {
            //it's empty
            echo '<div class="info-message">Select a valid entry</div>';

            // print_r($xmlElement);
            } else {
                //XML object has children
                // echo "no empty"; echo "<br />";
                echo '<table class="table1">';
                echo '<tr><th>Name</th><th>Symbol</th><th>Exchange</th><th>Details</th></tr>';

                foreach ($xmlElement->LookupResult as $result) {
                    echo '<tr>';
                   // print_r($result);
                    echo '<td>' . $result->Name . '</td>';
                    echo '<td>' . $result->Symbol . '</td>';
                    echo '<td>' . $result->Exchange . '</td>';
                    echo '<td>' . '<a href="?input=' . rawurlencode(htmlspecialchars($_GET["input"])) . '&symbol=' . rawurlencode($result->Symbol) . '">More Info</a>' . '</td>';
                   echo '</tr>';
                }
                echo "</table>";

                // print_r($xmlElement);
            }
        //    echo "<br /><br />";
        //    print_r($xmlElement->Status);	*/
        }
        
    } else if(isset($_GET["newsq"])){
        // Replace this value with your account key
        $accountKey = 'fTTAa7OTU3P+kcix41pXlsmXsgiPJ8Z35z5FOIKD9Q4';
        $ServiceRootURL =  'https://api.datamarket.azure.com/Bing/Search/v1/';
        $WebSearchURL = $ServiceRootURL . 'News?$format=json&Query=';

        $context = stream_context_create(array(
            'http' => array(
                'request_fulluri' => true,
                'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
            )
        ));
        $request = $WebSearchURL . urlencode( '\''  . rawurlencode(htmlspecialchars($_GET["newsq"])) . '\'');
        /*echo($request . "<br /><br />");*/
        $response = file_get_contents($request, 0, $context);
        echo $response;

        /*$jsonobj = json_decode($response);
        print_r($jsonobj);*/
        
    } else if(isset($_GET["parameters"])){
        $json = @file_get_contents( 'http://dev.markitondemand.com/Api/v2/InteractiveChart/json?parameters=' . rawurlencode($_GET["parameters"]) );
        
        if ($json === FALSE){ /* conditional for error handling */
            return generate_error_response("Error while trying to access resource to generate response");
        } else {
            echo $json;
        }
        
    } else {
        return generate_error_response("No parameters have been provided");
    }
?>