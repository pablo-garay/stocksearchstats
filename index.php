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
            font-family: Arial;
            font-size: 14px;
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
        }

        .form-title {
            font-weight: bold;
            margin: 0; padding: 0;
        }

        .box {
            display:inline-block;
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
            /*font-family: Arial, Helvetica, Verdana, sans-serif;*/
        }
        th, td {
            text-align: left;
            padding: 5px;
        }
        th {
            font-weight: bold;
            text-align: left;
        }

        .table, .table1, .table2{
            width: 100px;
        }

        /*.table2 {
            height: 432px;
        }*/

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
/*            font-family: Arial, Helvetica, sans-serif;*/
            text-align: center;
        }
        
        .bold-font,  .panel-font-title {
            font-weight: bold;
        }
        
        .red-letter {
            color: #ED001E;
        }
        
        .btn {
/*            font-family: Lucida Sans Unicode;*/
        }
        .fb-icon {
            width: 40px;
            width: 34px;
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
        .carousel div.item{
          background-color: white;
        }  
    </style>
</head>

<body>
    <!-- Facebook's basic SDK version should be inserted it directly after the opening <body> tag -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '906240542820734',
          xfbml      : true,
          version    : 'v2.5'
        });         
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- End of FB SDK's insertion code snippet -->
    
    <div class="centered">
    	<div class="well well-lg">
			<h4 class="form-title">Stock Market Search</h4>
        
            <form class="form-horizontal">
                <div class="form-group">    
                    <label for="input" class="col-sm-3 control-label">
                        Enter the stock name or symbol:<span class="red-letter">*</span> 
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="input" name="input" placeholder="e.g. Apple Inc or AAPL"
                                required pattern="^[a-zA-Z0-9][a-zA-Z0-9 ]*$"> </input>
                    </div>
                    <div class="col-sm-2">
                        <div class="box">
                            <button id="get-quote-button" type="submit" class="btn btn-primary" autofocus>
                                <span class="glyphicon glyphicon-search"></span> Get Quote
                            </button>								
                            <button id="clear-button" type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-refresh"></span> Clear
                            </button>

                        </div>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="form-block feedback-message">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bold-font text-left">Powered By: <img src="img/mod-logo.png" class="markit-on-demand-logo" alt="MarkitOnDemand Logo"></div>
                    </div>
                </div>            
            </form>
        </div>
    
        <hr>

        <div class="well well-lg">
            <!--<button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            </button>-->
<!--
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
-->
            </button>
            
            <!-- Carousel
            ================================================== -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">             
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-left panel-font-title">Favorite List</p>                                    
                                </div>
                                <div class="col-md-3">
                                    Automatic Refresh:
                                    <input type="checkbox" checked data-toggle="toggle">
                                    <!-- left button -->
                                    <button type="button" class="btn btn-default" aria-label="Left Align"
                                            data-toggle="tooltip" data-placement="bottom" title="Refresh">
                                      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                    </button>
                                    <a class="btn btn-default" id="stock-details-button" href="#myCarousel" role="button" data-slide="next" 
                                       disabled="disabled" data-toggle="tooltip" data-placement="bottom" title="Display Stock Information">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>                                    
                                </div>                          
                            </div>
                            
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <th>Symbol</th>
                                <th>Company Name</th>
                                <th>Stock Price</th>
                                <th>Change (Change Percent)</th>
                                <th>Market Cap</th>
                                <th></th>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        <div class="row">
                            <div class="col-md-1">
                                <a class="btn btn-default" href="#myCarousel" role="button" data-slide="prev"
                                    data-toggle="tooltip" data-placement="bottom" title="Display Favorite List">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>                            
                            </div>
                            <div class="col-md-11">
                                <p class="text-center panel-font-title">Stock Details</p>
                            </div>
                        </div>
                            
                        </div>
                        <div class="panel-body">
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
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-3">
                                                <p class="text-left bold-font">Stock Details</p>                                            
                                            </div>
                                            <table class="table table-striped table2">
                                                <tr><th>Name</th><td id="stock-details-table-name">
                                                </td></tr>

                                                <tr><th>Symbol</th><td id="stock-details-table-symbol">
                                                </td></tr>

                                                <tr><th>Last Price</th><td id="stock-details-table-last-price">
                                                </td></tr>

                                                <tr><th>Change (Change Percent)</th><td id="stock-details-table-change">
                                                </td></tr>

                                                <tr><th>Time and Date</th><td id="stock-details-table-timestamp">
                                                </td></tr>

                                                <tr><th>Market Cap</th><td id="stock-details-table-marketcap">    
                                                </td></tr>

                                                <tr><th>Volume</th><td id="stock-details-table-volume">
                                                </td></tr>

                                                <tr><th>Change YTD (Change Percent YTD)</th><td id="stock-details-table-ytd">
                                                </td></tr>

                                                <tr><th>High Price</th><td id="stock-details-table-high-price">
                                                </td></tr>

                                                <tr><th>Low Price</th><td id="stock-details-table-low-price">
                                                </td></tr>

                                                <tr><th>Opening Price</th><td id="stock-details-table-opening-price">
                                                </td></tr>
                                            </table>                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <p class="text-right">
                                                    <img src="img/fb-icon.png" class="fb-icon" alt="Facebook Connect button">
                                                    <button type="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                                    </button>
                                                </p>                                                  
                                            </div>
                                            <img src="http://chart.finance.yahoo.com/t?s=AAPL&lang=en-US&width=600&height=500" alt="Yahoo Chart Finance graphic">
                                        </div>                                        
                                    </div>
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
              </div>
              
            </div>
            <!-- /.carousel -->
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
    
    <!--  load Bootstrap Toggle library -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <style>
        .well {
            background: white;
        }        
    </style>

    <script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        console.log( "ready!" );
        
        function enableStockDetailsButton() {
            $('#stock-details-button').prop('disabled', false);
            $('#stock-details-button').removeAttr('disabled');
        }
        
        // disable button to show stock details
        function disableStockDetailsButton() {
            $('#stock-details-button').prop('disabled', true);
            $('#stock-details-button').attr('disabled', 'disabled');
        }
        
        // disable button to show stock details
        disableStockDetailsButton();
        enableStockDetailsButton();
        
        function log( message ) {
          $( "<div>" ).text( message ).prependTo( "#log" );
          $( "#log" ).scrollTop( 0 );
        }

        $( "#input" ).autocomplete({
          source: function( request, response ) {
            $.ajax({
              url: "http://stockstats-env.us-west-2.elasticbeanstalk.com/stockstatsapi/json.php",
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
        
        $("#get-quote-button").click(function(evt) {
//            $("#inputForm")[0].checkValidity();
            evt.preventDefault();
            $.ajax({
              url: "http://stockstats-env.us-west-2.elasticbeanstalk.com/stockstatsapi/json.php",
              dataType: "json",
              type: 'GET',
              data: {
                symbol: $( "#input" ).val()
              },
              success: function( data ) {
                if (!(data["Error"])){ /* successful data retrieval */
                    $(".feedback-message").html('');                    
                    $("#stock-details-table-name").html(data["Name"]);
                    $("#stock-details-table-symbol").html(data["Symbol"]);
                    $("#stock-details-table-last-price").html(data["Last Price"]);
                    $("#stock-details-table-change").html(data["Change (Change Percent)"]);
                    $("#stock-details-table-timestamp").html(data["Time and Date"]);
                    $("#stock-details-table-marketcap").html(data["Market Cap"]);
                    $("#stock-details-table-volume").html(data["Volume"]);
                    $("#stock-details-table-ytd").html(data["Change YTD (Change Percent YTD)"]);
                    $("#stock-details-table-high-price").html(data["High"]);
                    $("#stock-details-table-low-price").html(data["Low"]);
                    $("#stock-details-table-opening-price").html(data["Open"]);
                    
                    /* enable show stock details button again */
                    enableStockDetailsButton();
                    
                    /* switch to Stock details slide automatically */
                    $("#myCarousel").carousel(1);
                    
                } else {
                    /* Error */
                    $(".feedback-message").html(
                        '<p class="red-letter text-left">Select a valid entry</p>'
                    );
                    /*alert("Error");*/
                    disableStockDetailsButton();
                    /* switch back to first slide */
                    $("#myCarousel").carousel(0);
                }  
              }
            });
        });        
        
        $("#clear-button").click(function(evt) {
            evt.preventDefault();
            $('#input').val("");
            $('#resultsArea').html("");
            
            /* disable button to show stock details and switch back to first slide */
            disableStockDetailsButton();
            $("#myCarousel").carousel(0);
        });

        $(".fb-icon").click(function(){
            FB.ui({
                method: 'feed',
                /*link: 'http://chart.finance.yahoo.com/t?s=AAPL&lang=en-US&width=600&height=500',*/
                picture: 'http://chart.finance.yahoo.com/t?s=' + $("#stock-details-table-symbol").html() + '&lang=en-US&width=900&height=1200',
                name: 'Current Stock Price of ' + $("#stock-details-table-name").html() + ' is ' + $("#stock-details-table-last-price").html(),
                caption: 'Stock Information of ' + $("#stock-details-table-name").html() + ' (' + $("#stock-details-table-symbol").html() + ')',
                description: 'LAST TRADE PRICE: ' + $("#stock-details-table-last-price").html() + ', CHANGE: ' + $("#stock-details-table-change").html()
            }, function(response){
                // Debug response (optional)
                /*console.log(response);*/
                if (response && !response.error_message) {
                  alert('Posted Successfully');
                } else {
                  alert('Not posted');
                }
            });
            
            /*FB.ui({
              method: 'share',
              href: 'http://chart.finance.yahoo.com/t?s=AAPL&lang=en-US&width=600&height=500'
            }, function(response){});*/
        });
        
        /* Init tooltips. For performance reasons, the Tooltip and Popover data-apis are opt-in, meaning you must initialize them yourself. */
        $('[data-toggle="tooltip"]').tooltip();
    });
    
    </script>
    <noscript>
</body>
</html>