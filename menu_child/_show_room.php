<?php
function getarr()
{
    $str = "?date=".trim(filter_input(INPUT_GET,'date'))."&room=".filter_input(INPUT_GET,'room')."&timestart=".filter_input(INPUT_GET,'timestart')."&duration=".filter_input(INPUT_GET,'duration');
    return $str;
}
echo'
            </li>
            <li class="top_menu">
            <a href="#">Choose a room</a>';
            
   
     echo "<ul>";
      $result = mysql_query("SELECT ID ,nameRoom FROM list_room WHERE Issue = 1 order by nameRoom"); 
   echo  ' <div id="box1"';
while($row = mysql_fetch_array($result)) 
  { 
    echo "<li><a href='index.php?page=_list_registed&content=ID&date=".filter_input(INPUT_GET,'date')."&room=".$row['ID']."&timestart=".filter_input(INPUT_GET,'timestart')."&duration=".filter_input(INPUT_GET,'duration')."'> " . $row['nameRoom'] ."</a></li>";  
  }