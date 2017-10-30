<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
     
     $result = mysql_query("SELECT * FROM meetingroom_time_start order by ID");
while($row = mysql_fetch_array($result)) 
  { 
    echo "<li><a href='index.php?page=_list_registed&content=ID&date=".filter_input(INPUT_GET,'date')."&room=".filter_input(INPUT_GET,'room')."&timestart=".$row['ID']."&duaration=".filter_input(INPUT_GET,'duration')."'> " . $row['TimeStart'] ."</a></li>";  
  }
  
 echo "</div></ul> </li> ";