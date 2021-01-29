<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
</head>
<body>
 
<ul id="sortable" style="display:inline">
  <li > <button class="ui-state-default">Item 1</button> </li>
  <li class="ui-state-default"><button>Item 2</button> </li>
  <li class="ui-state-default"><button>Item 3</button> </li>
  <li class="ui-state-default"><button>Item 4</button> </li>
  <li class="ui-state-default"><button>Item 5</button> </li>
  <li class="ui-state-default"><button>Item 6</button> </li>
  <li class="ui-state-default"><button>Item 7</button> </li>
</ul>
 
 
</body>
</html>