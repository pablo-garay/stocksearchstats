<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Stock Market Statistics Search and Information Retrieval</title>
    
    <style>
        body {
            background: url('img/backg.jpg') no-repeat center center fixed; 
            background-color: transparent;
            background-size: cover;
            text-align: left;
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
            height: 200px;
            margin: 0 auto;
            display: block;
            margin-top: 10px; margin-bottom: 10px;
        }

        hr {
            background: white; 
            border:0; 
            height:1px;
            width:100%;
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

        input[type=text]{
            border: solid #CCCBCB;
            border-width: 1px;
            text-align: left;
        }


        table, th, td {
            border-collapse: collapse;
            font-family: Arial, Helvetica, Verdana, sans-serif;
        }
        th, td {
            text-align: left;
            padding: 5px;
        }
        th {
            font-weight: bold;
            text-align: left;
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

        .markit-on-demand-logo {
            height: 20px;
            width: 140px;
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
        
        .bold-font {
            font-weight: bold;
        }
        
        .red-letter {
            color: #E9072D;
        }
        
        .btn {
            font-family: Lucida Sans Unicode;
        }
    </style>
    
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->      
      
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    
    <style>
        .well {
            background: white;
        }
        .carousel div.item{
          background-color: white;
        }  
    </style>
    
    <!-- Clear button's logic -->
    <script type="text/javascript">
        function clearSearch(){
            document.getElementById("input").value="";
            document.getElementById("resultsArea").innerHTML = "";		
        }
    </script>
</head>

<body>
    <div class="centered">
    	<div class="well well-lg">
			<h1 class="form-title">Stock Market Search</h1>

			<form class="form-inline" id= "inputForm" method="GET" action="">
				<div class="form-input">
					<div id="content">				
                        <div class="box">
                            <!--<div class="col-lg-6">-->
                            <label for="input">Enter the stock name or symbol:<span class="red-letter">*</span> </label>						
                                <input type="text" class="form-control" id="input" name="input" placeholder="e.g. Apple Inc or AAPL"
                                    required pattern="^[a-zA-Z0-9][a-zA-Z0-9 ]*$" 
                                    value='<?php if (isset($_GET["input"])) echo htmlspecialchars($_GET["input"]); ?>' > </input>
                                    <div class="box">
                                        <button type="submit" class="btn btn-primary" autofocus>
                                            <span class="glyphicon glyphicon-search"></span> Get Quote
                                        </button>								
                                        <button type="button" class="btn btn-default" onclick="clearSearch();">
                                            <span class="glyphicon glyphicon-refresh"></span> Clear
                                        </button>
                                            <div class="form-block">
                                                <div class="bold-font">Powered By: <img src="img/mod-logo.png" class="markit-on-demand-logo" alt="MarkitOnDemand Logo"></div>
                                            </div>
                                    </div>
                            <!--</div>-->
						</div>
					</div>				
				</div>
			</form>
        </div>
    
        <hr>

        <div class="well well-lg">
            <!--<button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            </button>-->
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </button>
            
            <!-- Carousel
            ================================================== -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">             
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                    Favorite List
                    <!-- left button -->
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                    </button>                    
                    <a class="btn btn-default" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>                                        
                    
                    <table class="table table-striped">
                        <th>Symbol</th>
                        <th>Company Name</th>
                        <th>Stock Price</th>
                        <th>Change (Change Percent)</th>
                        <th>Market Cap</th>
                    </table>
                </div>
                <div class="item">                  
                    Stock Details
                    <a class="btn btn-default" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <div class="page-header">
                        <ul id="myTab1" class="nav nav-pills">
                            <li class="active"><a href="#currentstocks" data-toggle="tab">
                                    <span class="glyphicon glyphicon-dashboard"></span> Current Stock</a>                                
                            </li>
                            <li><a href="#historicalcharts" data-toggle="tab">
                                    <span class="glyphicon glyphicon-stats"></span> Historical Charts</a>
                            </li>
                            <li><a href="#newsfeed" data-toggle="tab">
                                    <span class="glyphicon glyphicon-link"></span> News Feeds</a>
                            </li>
                        </ul>
                    </div>
                    <div id="myTabContent1" class="tab-content">
                        <div class="tab-pane fade in active" id="currentstocks">
                            <table class="table table-striped table2">
                                <tr><th>Name</th><td class="td2">
                                </td></tr>

                                <tr><th>Symbol</th><td class="td2">
                                </td></tr>

                                <tr><th>Last Price</th><td class="td2">
                                </td></tr>

                                <tr><th>Change (Change Percent)</th><td class="td2">
                                </td></tr>

                                <tr><th>Time and Date</th><td class="td2">
                                </td></tr>

                                <tr><th>Market Cap</th><td class="td2">    
                                </td></tr>

                                <tr><th>Volume</th><td class="td2">
                                </td></tr>

                                <tr><th>Change YTD (Change Percent YTD)</th><td class="td2">
                                </td></tr>

                                <tr><th>High Price</th><td class="td2">
                                </td></tr>

                                <tr><th>Low Price</th><td class="td2">
                                </td></tr>

                                <tr><th>Opening Price</th><td class="td2">
                                </td></tr>
                            </table>
                            
                            <img src="http://chart.finance.yahoo.com/t?s=TSLA&lang=en-US&width=400&height=300" alt="Yahoo Chart Finance graphic">
                        </div>
                        <div class="tab-pane fade" id="historicalcharts">
                            <p>Content 2</p>
                        </div>
                        <div class="tab-pane fade" id="newsfeed">
                            <p>Content 3</p>
                        </div>
                    </div>                
                </div>
              </div>
              
            </div>
            <!-- /.carousel -->

            <div id="resultsArea">          
                <?php
                    if (isset($_GET["symbol"])){

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
                            echo '<div class="info-message">Select a valid entry</div>';

                            // print_r($xmlElement);
                        }
                        else {
                            //XML object has children
                            // echo "no empty"; echo "<br />";
                            echo '<table class="table table-striped table1">';
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
	</div>    

    <!-- ============= JS scripts ============= -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- include jquery libraries -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>      

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--    <script src="js/bootstrap.min.js"></script>-->
    
    <!-- JavaScript Includes for Tabs -->
    <script src="js/transition.js"></script>
    <script src="js/tab.js"></script>
    <script src="js/dropdown.js"></script>    

    <script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        console.log( "ready!" );
        
        function log( message ) {
          $( "<div>" ).text( message ).prependTo( "#log" );
          $( "#log" ).scrollTop( 0 );
        }

        $( "#input" ).autocomplete({
          source: function( request, response ) {
            $.ajax({
              url: "http://localhost/stocksearchstats/stockstatsapi/json.php",
              dataType: "json",
              type: 'GET',
              data: {
                input: request.term
              },
              success: function( data ) {
                var results = {};
                for (var key in data) {
                    results[key] = {};
                    results[key]["label"] = data[key]["Symbol"] + " - " + data[key]["Name"] + " ( " + data[key]["Exchange"] + " )";
                    results[key]["value"] = data[key]["Symbol"];

                }
                response( results );
              }
            });
          },
          minLength: 1,
          /*select: function( event, ui ) {
            log( ui.item ?
              "Selected: " + ui.item.value:
              "Nothing selected, input was " + this.value);
          },*/
          open: function() {
            $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
          },
          close: function() {
            $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
          }
        });
    });
    
    </script>
    <noscript>
</body>
</html>