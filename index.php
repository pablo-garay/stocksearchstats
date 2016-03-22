<!DOCTYPE html>
<html>

<head>
<style>
	body {
		text-align: center;
		margin: 0;
	}
	div.centered 
	{
	    text-align: center;
	    padding: 4em;
	}

	div.centered table 
	{
	    margin: 0 auto; 
	}

	h1 {
		margin: 0; padding: 0;
	}

	div.form-container {
		background-color: #F5F5F5;
		border: 1px solid;
		border-color: #DCDCDC;
		padding-top: 5px;
		padding-bottom: 2em;
		width: 700px;
		height: 125px;
		margin: 0 auto;
		display: block;
		margin-top: 10px; margin-bottom: 10px;
	}

	hr {
		background:#CDCCCD; 
		border:0; 
		height:1px;
		width:97%;
		margin: 0 auto; padding: 0;
	}

	.form-blocks {
		display: block;
	}

	.form-block{
		margin-top: 5px;
		padding: 0;
	}

	.form-input {
		margin-top: 20px;
		margin-left: 10px;
		text-align: left;
	}

	.form-title {
		font-weight: bold;
		font-style: italic;
		margin: 0; padding: 0;
	}

	.box {
		display:inline-block;
		vertical-align:top;
	}

	.inlined {
		display: inline;
	}

	input[type=submit], input[type=button] {
		background-color: white;
		border-radius:5px;
		border: solid #CCCBCB;
		border-width: 1px;
	}

	input[type=text]{
		border: solid #CCCBCB;
		border-width: 1px;
	}


	table, th, td {
	    border-collapse: collapse;
	    font-family: Arial, Helvetica, sans-serif;
	}
	th, td {
		text-align: left;
	    padding: 5px;
	}
	th {
		font-weight: bold;
		text-align: left;
		background-color: #F5F5F5;
	}
	td {
		background-color: #FBFAF9;
	}
	td.td2 {
		text-align: center;
	}

	.table1, .table2{
		width: 710px;
	}

	.table2 {
		height: 432px;
	}

	/* table inner borders */
	td + td,
	th + th,
	th + td { border-left: 1px solid #CCCBCB; }
	tr + tr { border-top: 1px solid #CCCBCB; }

	/* table outer borders */
	/* up */
	table tr:first-child{
	  border-top: solid 2px;
	  border-color: #CCCBCB;
	}
	/* down */
	table tr:last-child{
	  border-bottom: solid 2px;
	  border-color: #CCCBCB;
	}
	/* left */
	table td:first-child,
	table th:first-child {
	  border-left: solid 2px;
	  border-color: #CCCBCB;
	}
	/* right */
	table td:last-child,
	table th:last-child {
	  border-right: solid 2px;
	  border-color: #CCCBCB;
	}
    
    .markit-on-demand-logo {
        height: 20px;
		width: 100px;
    }

	.marker-icon {
		height: 12px;
		width: 12px;
	}

	.info-message {
		background-color: #FCFBFA;
		border: 2px solid;
	    border-color: #CCCBCB;
	    margin: 0 auto;
	    padding: 4px;
	    width: 700px;
	    font-family: Arial, Helvetica, sans-serif;
	    text-align: center;
	}

</style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script type="text/javascript">
        function clearSearch(){
            document.getElementById("input").value="";
            document.getElementById("resultsArea").innerHTML = "";		
        }
    </script>
</head>

<body>
    <div class="centered">
    	<div class="form-container">
			<h1 class="form-title">Stock Market Search</h1>
			<hr>

			<form id= "inputForm" method="GET" action="">
				<div class="form-input">
					<div id="content">				
                        <div class="box">
						<label for="input">Enter the stock name or symbol*: </label>						
							<input type="text" id="input" name="input" placeholder="e.g. Apple"
								required pattern="^[a-zA-Z0-9][a-zA-Z0-9 ]*$" 
								value='<?php if (isset($_GET["input"])) echo htmlspecialchars($_GET["input"]); ?>' > </input>
                                <div class="box">
                                    <input type="submit" value="Get Quote" autofocus></input>								
                                    <input type="button" value="Clear" onclick="clearSearch();"></input>
                                        <div class="form-block">
                                            Powered By: <img src="img/mod-logo.png" class="markit-on-demand-logo" alt="MarkitOnDemand Logo">
                                        </div>
                                </div>
						</div>
					</div>				
				</div>
			</form>
        </div>

        <div id="resultsArea">
			<?php
				if (isset($_GET["symbol"])){
					/* JSON */
					$json = @file_get_contents("http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=" . rawurlencode(htmlspecialchars($_GET["symbol"])));

					if ($json === FALSE){
						echo '<div class="info-message">Error while trying to get JSON file resource</div>';
					} else {
						$jsonResultArray = json_decode($json, true);

						// /* for debugging purposes */
						// print_r($jsonResultArray);
						if (isset($jsonResultArray["Message"])){
							echo '<div class="info-message">No symbol matches found for symbol input.  Try another symbol such as MSFT or AAPL.</div>';

						} else if ($jsonResultArray["Status"] === "SUCCESS"){

							echo '<table class="table2">';

							echo '<tr><th>Name</th><td class="td2">';
							echo $jsonResultArray["Name"];
							echo '</td></tr>';

							echo '<tr><th>Symbol</th><td class="td2">';
							echo $jsonResultArray["Symbol"];
							echo '</td></tr>';

							echo '<tr><th>Last Price</th><td class="td2">';
							echo $jsonResultArray["LastPrice"];
							echo '</td></tr>';

							echo '<tr><th>Change</th><td class="td2">';
							echo round($jsonResultArray["Change"], 2);
							if ($jsonResultArray["Change"] > 0) 		echo '<img src="img/up.png" class="marker-icon" alt="marker">';
							else if ($jsonResultArray["Change"] < 0) 	echo '<img src="img/down.png" class="marker-icon" alt="marker">';
							echo '</td></tr>';

							echo '<tr><th>Change Percent</th><td class="td2">';
							echo strval(round($jsonResultArray["ChangePercent"], 2)) . "%";
							if ($jsonResultArray["ChangePercent"] > 0) 		echo '<img src="img/up.png" class="marker-icon" alt="marker">';
							else if ($jsonResultArray["ChangePercent"] < 0) echo '<img src="img/down.png" class="marker-icon" alt="marker">';				
							echo '</td></tr>';

							/* Here comes the Timestamp. It requires a few manipulations to output in the correct format */
							echo '<tr><th>Timestamp</th><td class="td2">';
							// echo $jsonResultArray["Timestamp"];
							$matches = array();
							preg_match('/^[A-Za-z]{3} ([A-Za-z]{3}) (\d+) (\d{2}:\d{2}):\d{2} UTC(\S*) (\d{4})$/', $jsonResultArray["Timestamp"], $matches);
							// echo ("<br />Timestamp " . $matches[4] . "-" . $matches[1]  . "-" . $matches[2] . " " . $matches[3]);
							// /* e.g. 2016-Feb-26 15:59 */
							// $timestamp_array = date_parse_from_format('Y-M-d H:i', $matches[4] . "-" . $matches[1]  . "-" . $matches[2] . " " . $matches[3]);
							// echo "<br />AAAAAAAAA";
							// print_r($timestamp_array);
							date_default_timezone_set('America/Los_Angeles');
							$date = DateTime::createFromFormat('Y-M-d H:i P', 
											  $matches[5] . "-" . $matches[1]  . "-" . $matches[2] . " " . $matches[3] . " " . $matches[4]);
							// print_r($date);
							$tz = new DateTimeZone('America/Los_Angeles');
							echo $date->setTimezone($tz)->format('Y-m-d h:i A');				
							echo '</td></tr>';
							// print_r(($jsonResultArray["Timestamp"]));

							echo '<tr><th>Market Cap</th><td class="td2">';
							if ($jsonResultArray["MarketCap"] >= 1000000000){
								echo strval(round($jsonResultArray["MarketCap"] / 1000000000, 2)) . " B";
							} else if ($jsonResultArray["MarketCap"] >= 1000000){
								echo strval(round($jsonResultArray["MarketCap"] / 1000000, 2)) . " M";
							} else {
								echo strval(round($jsonResultArray["MarketCap"], 2));
							}
							echo '</td></tr>';

							echo '<tr><th>Volume</th><td class="td2">';
							echo number_format(($jsonResultArray["Volume"]), $decimals = 0 , $dec_point = "." , $thousands_sep = ",");
							echo '</td></tr>';

							echo '<tr><th>Change YTD</th><td class="td2">';
							$changeYTD = $jsonResultArray["LastPrice"] - $jsonResultArray["ChangeYTD"];
							if ($changeYTD < 0){ 
								echo "(" . strval(round($changeYTD, 2)) . ")";				
								echo '<img src="img/down.png" class="marker-icon" alt="marker">';						
							}
							else {
								echo strval(round($jsonResultArray["ChangeYTD"], 2));
								if ($changeYTD > 0) echo '<img src="img/up.png" class="marker-icon" alt="marker">';
							}
							echo '</td></tr>';

							echo '<tr><th>Change Percent YTD</th><td class="td2">';
							echo strval(round($jsonResultArray["ChangePercentYTD"], 2)) . "%";
							if ($jsonResultArray["ChangePercentYTD"] > 0) 		echo '<img src="img/up.png" class="marker-icon" alt="marker">';
							else if ($jsonResultArray["ChangePercentYTD"] < 0) 	echo '<img src="img/down.png" class="marker-icon" alt="marker">';					
							echo '</td></tr>';

							echo '<tr><th>High</th><td class="td2">';
							echo $jsonResultArray["High"];
							echo '</td></tr>';

							echo '<tr><th>Low</th><td class="td2">';
							echo $jsonResultArray["Low"];
							echo '</td></tr>';

							echo '<tr><th>Open</th><td class="td2">';
							echo $jsonResultArray["Open"];
							echo '</td></tr>';

							echo '</table>';				

						} else {
							echo '<div class="info-message">There is no stock information available.</div>';
						}						
					}

				} else if(isset($_GET["input"])){
					// print_r($_POST);

					/* Output debugging data */
					// $xml = file_get_contents("http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=APPL");
					// echo "<br />";
					// print_r($xml);

					/* XML */
					$xmlElement = @simplexml_load_file('http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=' . rawurlencode(htmlspecialchars($_GET["input"])));	 
				    
				    if ($xmlElement === false){ /* conditional for error handling */
				    	echo '<div class="info-message">Error while trying to load XML file resource</div>';
				    } else {
						if ($xmlElement->count() == 0) {
					    //it's empty
					    echo '<div class="info-message">No Record has been found</div>';
					    
					    // print_r($xmlElement);
					}
					else {
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
					//    print_r($xmlElement->Status);	
				    }
				}
			?>
		</div>
	</div>
<script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        console.log( "ready!" );
        console.log( "Hello Pablo!" );
    });
</script>
<noscript>
</body>
</html>