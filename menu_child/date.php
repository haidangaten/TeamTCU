
<?php
    echo'
        
<html>
<head>
<link rel="stylesheet" href="css/smoothness.css">
<script src="jquery/min.js"></script>
<script src="jquery/j_UI_min.js"></script>
  
    <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
function get_content()
      {
        s = document.getElementById("datepicker").value;
      
window.location.replace(\'index.php?page=_list_registed&content=ID&date=\'+ s +\' &room='.filter_input(INPUT_GET,'room').'&timestart='.filter_input(INPUT_GET,'timestart').'&duration='.filter_input(INPUT_GET,'duration').'\');
      }
</script>
<style>
#datepicker
{background-image: url("./icon/calendar.png");
background-repeat: no-repeat; 
background-position: 0px;
background-size: 13%;
 padding-left:27px;
width:135px;;
}
</style>
</head>
<body>
    <form>';
    if(!empty(filter_input(INPUT_GET,'date')))
        {
            echo "<input 
        id='datepicker' type='Text'
        name='date' value='".trim(filter_input(INPUT_GET,'date'))."'
        style='margin-top:5px;margin-bottom:-10px; height:25px' 
        placeholder='Choose a date'
        onchange='get_content()' />";
        }
    else 
        echo "<input 
        id='datepicker' type='Text'
        name='date' 
        style='margin-top:5px;margin-bottom:-10px; height:25px' 
        placeholder='Choose a date'
        onchange='get_content()' />
</form>
</body>
</html>";

