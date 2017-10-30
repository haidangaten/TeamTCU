<?php

if (isset($_POST["addroom"])){
 echo '   <h3 class="menuheader expandable">☆ Notification</h3>';
     include './database_connect/connect.php';
    echo '<div id="box1">';

		//nhap du lieu
		if(filter_input(INPUT_POST,'room_name')){
		
	
                
		//kiem tra thong tin
		$sql="SELECT ID FROM list_room WHERE  nameRoom = '".filter_input(INPUT_POST,'room_name')."' ";
		
                $result = mysql_query($sql); 
		
		if(mysql_num_rows($result) >1) echo "The name of room was created !!!";
		else {
                $sqlcmd="INSERT INTO `list_room`( `nameRoom`, `numOfSeats`, `numOfScreen`, `numOfTV`, `numOfBoard`, `airConditioner`, `soundSystem`) VALUES ('".filter_input(INPUT_POST,'room_name') ."',".filter_input(INPUT_POST,'numofseat').",".filter_input(INPUT_POST,'numofscreens').",".filter_input(INPUT_POST,'numoftv').",".filter_input(INPUT_POST,'numofboard').",".filter_input(INPUT_POST,'aircnditioner').",'".filter_input(INPUT_POST,'soundsys')."')";	
              
                   mysql_query($sqlcmd); 
                    $result = mysql_query($sql); 
		
		if(mysql_num_rows($result) ==1) echo "Add a room Complete !!!";
               
                }
	} mysql_close($con);
        echo '</div>';
}

?>