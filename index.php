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
        div.layout 
        {
            padding-top: 1em;
            padding-left: 14em; padding-right: 14em;
        }

        h1 {
            margin: 0; padding: 0;
        }

        hr {
            background: white; 
            border:0; 
            height:1px;
            width:100%;
            margin: 0 auto; padding: 0;
        }

        .form-block{
            margin-top: 5px;
            padding: 0;
        }

        .box {
            display:inline-block;
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
            margin-left: 10px;
            height: 32px;
            width: 32px;
        }
        
        .bold-font,  .panel-font-title {
            font-weight: bold;
        }
        
        .red-letter {
            color: #ED001E;
        }
        
        .fb-icon {
            height: 38px;
            width: 38px;
        }
        
        .news-text {
            padding-bottom: 2em;
        }
        
        .star-font {
            font-size: 20px;
            text-shadow: -1px 0 #818081, 0 1px #818081, 1px 0 #818081, 0 -1px #818081;
        }
        
        .white-star {
            color: white;
        }
        
        .yellow-star {
            color: #FEFF40;
        }

        .well.well-lg {
            background: white;
        }
        
        .red {
            color: red;
        }
        
        .green {
            color: green;
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
    
    <div class="layout">
    	<div class="well well-lg">
			<h4 class="text-center bold-font">Stock Market Search</h4>
        
            <form class="form-horizontal" id="search-form">
                <div class="form-group">    
                    <label for="input" class="col-sm-3 control-label">
                        Enter the stock name or symbol:<span class="red-letter">*</span> 
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="input" name="input" placeholder="e.g. Apple Inc or AAPL"
                                required pattern="^[a-zA-Z0-9][a-zA-Z0-9 ]*$"> </input>
                    </div>
                    <div class="col-sm-3">
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
            <!-- Carousel
            ================================================== -->
            <div id="resultsAreaCarousel" class="carousel slide" data-ride="carousel" data-interval="false">             
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-left panel-font-title">Favorite List</p>                                    
                                </div>
                                <div class="col-md-4 text-right">
                                    Automatic Refresh:
                                    <input id="toggle-event" type="checkbox" data-toggle="toggle">
                                    <!-- left button -->
                                    <button type="button" class="btn btn-default" id="refresh-favorite-list-button" aria-label="Left Align"
                                            data-toggle="tooltip" data-placement="bottom" title="Refresh">
                                      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                    </button>
                                    <a class="btn btn-default" id="stock-details-button" href="#resultsAreaCarousel" role="button" data-slide="next" 
                                       disabled="disabled" data-toggle="tooltip" data-placement="bottom" title="Display Stock Information">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>                                    
                                </div>                          
                            </div>
                            
                        </div>
                        <div class="panel-body">
                            <table id="favorite-table-data" class="table table-striped">
                                <tr>
                                    <th>Symbol</th>
                                    <th>Company Name</th>
                                    <th>Stock Price</th>
                                    <th>Change (Change Percent)</th>
                                    <th>Market Cap</th>
                                    <th></th>                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        <div class="row">
                            <div class="col-md-1">
                                <a class="btn btn-default" href="#resultsAreaCarousel" role="button" data-slide="prev"
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
                                                    <img src="img/fb-icon.png" class="fb-icon" alt="Facebook Connect button"
                                                         data-toggle="tooltip" data-placement="bottom" title="Share in Facebook">
                                                    <button type="button" class="btn btn-default"  id="favorite-button" aria-label="Left Align"
                                                            data-toggle="tooltip" data-placement="bottom" title="Add to/Remove from Favorites List">
                                                        <span class="glyphicon glyphicon-star star-font white-star" aria-hidden="true"></span>
                                                    </button>
                                                </p>                                                  
                                            </div>
                                            <img id="yahoo-finance-stats-chart">
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="historicalcharts">
                                    <p class="text-center">Historical charts</p>
                                </div>
                                <div class="tab-pane fade" id="newsfeed">
                                    <p class="text-center">News Feed</p>
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
    
    <!--  load Highcharts scripts library  -->
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>  
    
    <!--  load JS code with configuration, options and functions to create Highcharts chart properly  -->
    <script src="MarkitTimeseriesService.js"></script>

    <script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        console.log( "ready!" );
        
        // disable button to show stock details
        disableStockDetailsButton();
         /* remove this later!!!!!!!!!!!! */ //enableStockDetailsButton();
        populateFavoriteList();

        $( "#input" ).autocomplete({
          source: function( request, response ) {
            $.ajax({
              url: "http://stockstats-1256.appspot.com/stockstatsapi/json",
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
        
        $("#stock-details-button").click(function(evt) {
            evt.preventDefault();

            if ($('#stock-details-button').prop('enabled')){ /* if button is enabled */
                /* switch to Stock details slide automatically */
                $("#resultsAreaCarousel").carousel(1);
            }
        });
        
        $("#favorite-button").click(function(evt) {
            // Check browser support
            if (typeof(Storage) !== "undefined") {
                // Retrieve
                var symbol_str = $("#stock-details-table-symbol").html().trim(); /*alert(symbol_str);*/
                
                if (/\S/.test(symbol_str)){
                    if (localStorage.getItem(symbol_str) == null){
                        /*alert("Symbol currently not in local storage");*/
                        localStorage.setItem(symbol_str, symbol_str);
                        /*alert(symbol_str);*/
                        $( ".star-font" ).addClass("yellow-star").removeClass("white-star");
                        /* add company to favorite table list accordingly */
                        addCompanyToFavoriteTable(symbol_str);                        
                        
                    } else {
                        /*alert("Symbol IS currently in local storage");*/
                        localStorage.removeItem(symbol_str);
                        $( ".star-font" ).addClass("white-star").removeClass("yellow-star");
                        /* remove company from favorite table list accordingly */
                        removeFavorite(symbol_str);                         
                    }
                }
                
            } else {
                alert("Sorry, your browser does not support Web Storage...");
            }
        });

        $("#search-form").submit(function(evt) {
            evt.preventDefault();
            showCompanyStockDetails($( "#input" ).val());
        });        
        
        $("#clear-button").click(function(evt) {
            evt.preventDefault();
            $('#input').val("");
            $('#resultsArea').html("");
            
            /* disable button to show stock details and switch back to first slide */
            disableStockDetailsButton();
            $("#resultsAreaCarousel").carousel(0);
        });
        
        $("#refresh-favorite-list-button").click(function(evt) {
            evt.preventDefault();
            refreshFavoriteListData();
        });

        $(".fb-icon").click(function(){
            FB.ui({
                method: 'feed',
                link:  'http://dev.markitondemand.com/',
                picture: 'http://chart.finance.yahoo.com/t?s=' + $("#stock-details-table-symbol").html() + '&lang=en-US&width=900&height=1200',
                name: 'Current Stock Price of ' + $("#stock-details-table-name").html() + ' is ' + $("#stock-details-table-last-price").html(),
                description: 'Stock Information of ' + $("#stock-details-table-name").html() + ' (' + $("#stock-details-table-symbol").html() + ')',
                caption: 'LAST TRADE PRICE: ' + $("#stock-details-table-last-price").html() + ', CHANGE: ' + $("#stock-details-table-change span").html()
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
        
        $('#toggle-event').change(function() {
            /*alert('Toggle: ' + $(this).prop('checked'));*/
            if ($(this).prop('checked')){ /* button is On, then refresh every 5 secs */
                refreshTimerVar = setInterval(refreshFavoriteListData, 5000);
            } else { /* button is Off */
                clearInterval(refreshTimerVar);
            }
        });
        
        /* Init tooltips. For performance reasons, the Tooltip and Popover data-apis are opt-in, meaning you must initialize them yourself. */
        $('[data-toggle="tooltip"]').tooltip();
    });
        
    function updateFavoriteColumn(companySymbol, marketData){
        table_row = $("#row" + companySymbol);
        var price_td = table_row.find(".price-table-data");
        var change_td = table_row.find(".change-table-data");

        price_td.html(marketData["Last Price"]);
        change_td.html(computeTableDataHtmlString(marketData["Change Indicator"], marketData["Change (Change Percent)"]));
    }

    function refreshCompanyStats(companySymbol){
        $.ajax({
          url: "http://stockstats-1256.appspot.com/stockstatsapi/json",
          dataType: "json",
          type: 'GET',
          data: {
            symbol: companySymbol
          },
          success: function( marketData ) {
            if (!(marketData["Error"])){ /* successful data retrieval */                    
                updateFavoriteColumn(companySymbol, marketData);
            } 
//                else {
//                    /* Error */
//                    alert("Error while trying to refresh Favorite List table");
//                }  
          }
        });         
    }

    function refreshFavoriteListData(){
        for (var companySymbol in localStorage){
            /*alert(companySymbol);*/
            refreshCompanyStats(companySymbol);
        }            
    }
        
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
        
    function addCompanyToFavoriteTable(companySymbol){
        $.ajax({
          url: "http://stockstats-1256.appspot.com/stockstatsapi/json",
          dataType: "json",
          type: 'GET',
          data: {
            symbol: companySymbol
          },
          success: function( marketData ) {
            if (!(marketData["Error"])){ /* successful data retrieval */
                /* populate or update table data */ 
                $('#favorite-table-data tr:last').after(
                    '<tr id="' + 'row' + marketData["Symbol"] + '">' +
                        '<td>' + '<a href="javascript:undefined" onclick="showCompanyStockDetails(\'' + marketData["Symbol"] + '\');">' + marketData["Symbol"] + 
                                 '</a>' + '</td>' +
                        '<td>' + marketData["Name"]   + '</td>' +
                        '<td class="price-table-data">' + marketData["Last Price"] + '</td>' +
                        '<td class="change-table-data">' + computeTableDataHtmlString(marketData["Change Indicator"], marketData["Change (Change Percent)"]) + '</td>' +
                        '<td>' + marketData["Market Cap"] + '</td>' +
                        '<td><button type="button" class="btn btn-default" aria-label="Left Align"' +
                              ' onclick="removeFavorite(\'' + marketData["Symbol"] + '\')" ' +
                              'data-toggle="tooltip" data-placement="bottom" title="Remove from Favorites">' +
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>' +
                    '</tr>'
                );                            

            } else {
                /* Error */
                alert("Error while trying to load company to Favorite List");
            }  
          }
        });         
    }
        
    function populateFavoriteList(){
        /* delete all rows in a table except the first (table header) */
        $("#favorite-table-data").find("tr:gt(0)").remove();

        for (var companySymbol in localStorage){
            /*alert(companySymbol);*/
            addCompanyToFavoriteTable(companySymbol);
        }
    }        
        
    function computeTableDataHtmlString(indicator, table_data_value){
        if (indicator > 0){
            return ('<span class="green">' + table_data_value + '</span>' + '<img src="img/up.png" class="marker-icon" alt="UP marker">');
        } else if (indicator < 0){
            return ('<span class="red">'   + table_data_value + '</span>' + '<img src="img/down.png" class="marker-icon" alt="DOWN marker">');
        } else {
            return (table_data_value);
        }            
    }
        
    function enableStockDetailsButton() {
        $('#stock-details-button').prop('disabled', false);
        $('#stock-details-button').removeAttr('disabled');
    }

    // disable button to show stock details
    function disableStockDetailsButton() {
        $('#stock-details-button').prop('disabled', true);
        $('#stock-details-button').attr('disabled', 'disabled');
    }        
        
    function showCompanyStockDetails(companySymbol) {
        $.ajax({
          url: "http://stockstats-1256.appspot.com/stockstatsapi/json",
          dataType: "json",
          type: 'GET',
          data: {
            symbol: companySymbol
          },
          success: function( marketData ) {
            if (!(marketData["Error"])){ /* successful data retrieval */
                $(".feedback-message").html('');
                /* populate or update table data */
                $("#stock-details-table-name").html(marketData["Name"]);
                $("#stock-details-table-symbol").html(marketData["Symbol"]);
                $("#stock-details-table-last-price").html(marketData["Last Price"]);                    
                $("#stock-details-table-change").html(computeTableDataHtmlString(marketData["Change Indicator"], marketData["Change (Change Percent)"]));
                $("#stock-details-table-timestamp").html(marketData["Time and Date"]);
                $("#stock-details-table-marketcap").html(marketData["Market Cap"]);
                $("#stock-details-table-volume").html(marketData["Volume"]);                    
                $("#stock-details-table-ytd").html(computeTableDataHtmlString(marketData["Change YTD Indicator"], marketData["Change YTD (Change Percent YTD)"]));
                $("#stock-details-table-high-price").html(marketData["High"]);
                $("#stock-details-table-low-price").html(marketData["Low"]);
                $("#stock-details-table-opening-price").html(marketData["Open"]);                    
                $("#yahoo-finance-stats-chart").attr("src", 'http://chart.finance.yahoo.com/t?s=' + companySymbol + '&lang=en-US&width=600&height=500');
                $("#yahoo-finance-stats-chart").attr("alt", 'Yahoo Finance chart');
                
                /* Update comapany's row in Favorite List if present */
                if (localStorage[marketData["Symbol"]]){ /* will update only if Symbol is in Favorite table - row selected by jquery selector */
                    updateFavoriteColumn(marketData["Symbol"], marketData);
                }

                /* Get news feed */
               /* $.getJSON('//api.ipify.org?format=jsonp&callback=?', function(ipresult) {
                    var ip = ipresult["ip"];
                    console.log(ip);                                                
                    $("#newsfeed").html(ip);
                }); */                        

                /* News Feeds Tab Content */
                $.getJSON("http://stockstats-1256.appspot.com/stockstatsapi/json",
                {
                    newsq: marketData["Symbol"]
                }) .done(function( json ) {
                        /*alert(typeof json["d"]["results"]);
                        alert(json["d"]["results"]);*/
                        var results = json["d"]["results"];
                        var result;
                        $("#newsfeed").html("");

                        for (var key in results){
                            /*console.log(JSON.stringify(results[result]));*/
                            result = results[key];
                            /*console.log(result["Url"]);
                            console.log(result["Title"]);
                            console.log(result["Description"]);
                            console.log(result["Source"]);
                            console.log(result["Date"]);
                            console.log("\n");*/

                            $("#newsfeed").append(
                                '<div class="well">' +
                                    '<span class="text-left"><a href="' + result["Url"] + '">' + result["Title"] + '</a></span>' +
                                    '<p class="text-left news-text">'   + result["Description"] + '</p>' +
                                    '<p class="bold-font text-left">'   + 'Publisher: ' + result["Source"] + '</p>' +
                                    '<p class="bold-font text-left">'   + 'Date: '      + result["Date"] + '</p>' +
                                '</div>'
                            );
                        }

                        /* the following code makes the SYMBOL word bold whenever it's found in the news text */
                        var html = $("#newsfeed .news-text:contains(" + marketData["Symbol"] + ")").html();
                        $("#newsfeed .news-text:contains(" + marketData["Symbol"] + ")").html(
                            html.replace(marketData["Symbol"], '<span class="bold-font">' + marketData["Symbol"] + '</span>'));
                        /*$("#newsfeed .news-text:contains(" + marketData["Symbol"] + ")").css( "font-weight", "bold" );*/

                   })
                   .fail(function( jqxhr, textStatus, error ) {
                        var err = textStatus + ", " + error;
                        alert( "Request for News Failed: " + err);
                   });

                /* Historical Charts Tab Content */
                $("#historicalcharts").html('<div id="stockValuesChartContainer" style="height: 400px; min-width: 310px"></div>');
                /* create chart */
                $(function(){
                    var sym = marketData["Symbol"];
                    var dur = Math.round(365 * 2.75);
                    var container = "#stockValuesChartContainer";
                    new Markit.InteractiveChartApi(sym, dur, container);
                });
                
                /* update button's star color */
                if (localStorage.getItem(marketData["Symbol"]) == null){
                    $( ".star-font" ).addClass("white-star").removeClass("yellow-star");                    
                } else {
                    $( ".star-font" ).addClass("yellow-star").removeClass("white-star");
                }
                
                /* enable show stock details button */
                enableStockDetailsButton();

                /* switch to Stock details slide automatically */
                $("#resultsAreaCarousel").carousel(1);

            } else {
                /* Error */
                var err_message;
                
                if (marketData["Error"] === "Message: There is no stock information available"){
                    err_message = "There is no stock information available";
                } else {
                    err_message = "Select a valid entry";
                }
                
                $(".feedback-message").html(
                    '<p class="red-letter text-left">' + err_message + '</p>'
                );                
                
                /*alert("Error");*/
                disableStockDetailsButton();
                /* switch back to first slide */
                $("#resultsAreaCarousel").carousel(0);
            }  
          }
        });
    }        
        
    function removeFavorite(symbol){
        localStorage.removeItem(symbol);
        var row_id = '#row' + symbol;
        $(row_id).remove();
    }
    
    </script>
    <noscript>
</body>
</html>