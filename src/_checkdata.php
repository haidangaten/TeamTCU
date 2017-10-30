<?php

if (isset($_POST["dangky"])) {
    echo '   <h3 class="menuheader expandable">☆ Notification</h3>';

    include './database_connect/connect.php';
 
    include './src/function.php';

   

//-----------------------------------------------------------
    $date = trim(filter_input(INPUT_GET, 'date'));
    $userID = getuser();
    $room = filter_input(INPUT_GET, 'room');
    $timestart = filter_input(INPUT_GET, 'timestart');
    $duration = filter_input(INPUT_GET, 'duration');



    if (strlen($date) < 1 || strlen($room) < 1 || strlen($timestart) < 1 || strlen($duration) < 1) {
        $statuts[] = "You must enter all of infomation!!!";
    } else {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $datacreated = date('Y/m/d H:i:s');
        $today = date('Y/m/d');
        $daychuan = chuanhoa($date);
        if (strtotime($today) > strtotime($daychuan)) {
            $statuts[] = "You must choose a day  of future. ";
        }
        
        $timenow=date('H:i:s');
        $sqlcmd="SELECT * FROM `meetingroom_time_start` WHERE ID = ".$timestart;
        $result =mysql_query($sqlcmd);
        $row= mysql_fetch_array($result);
        if(strtotime($today)==strtotime($daychuan))
        if (strtotime($timenow) > strtotime($row['TimeStart'])) {
            $statuts[] =  "You must choose  a time  of the future!";
        }

        if ($timestart + $duration > 25) {
            $statuts[] = "The duration is too long!!!";
        }
        if(empty($statuts)){
        if (test_dangky($daychuan, $room, $timestart, $duration) == true) {
            writetodb($daychuan, $room, $userID, $timestart, $duration, $datacreated);
            if (check($daychuan, $room, $userID, $timestart, $duration, $datacreated) == true) {
                    $statuts[] = "You have successfully registered";
                    mysql_close($con);
                } else {
                    $statuts[] = 'Registered fail!!!';
                }
            } else {
            $statuts[] = "The room was registered!!!";
            mysql_close($con);
        }
        }
    }
    echo"<div id='box1'style='height=40px' >";
    if (!empty($statuts)) {
        for ($i = 0; $i < count($statuts); $i++) {
            echo "<p> $statuts[$i]</p>";
        }
    }
    echo"</div >";
}