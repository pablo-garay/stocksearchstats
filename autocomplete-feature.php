<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <style>
  .ui-autocomplete-loading {
    background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat; 
  }
  #input { width: 25em; }
  </style>
  <script>
  $(function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#input" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "http://dev.markitondemand.com/MODApis/Api/v2/lookup/jsonp",
          dataType: "jsonp",
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
            console.log(results);
            response( results );
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
        log( ui.item ?
          "Selected: " + ui.item.value:
          "Nothing selected, input was " + this.value);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
  });
  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="inputZ">Your input: </label>
  <input id="input">
</div>
 
<div class="ui-widget" style="margin-top:2em; font-family:Arial">
  Result:
  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>
 
 
</body>
</html>