<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type='text/javascript' src='https://code.jquery.com/jquery-1.5.js'></script>  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
  
<div class="demo">

<div class="ui-widget">
    <label for="tags">Recherche: </label>
    <input id="tags">
</div>

</div>
<script>
    $(function() {
    var availableTags = [
        "Mesut",
        "Laurie",
        "OSCAR",
        "LAURE",
        "BATISTE",
        "RACHID",
        "AURORE",
        "Jean",
        "Luc",
        "Eren",
        "Erlang",
        "MARIE",
        "Louis",
        
    ];
    $( "#tags" ).autocomplete({
        source: availableTags,
        minLength:0
    }).bind('focus', function(){ $(this).autocomplete("search"); } );
    $('#tags').trigger("focus"); 
});

</script> 
</body>
</html>