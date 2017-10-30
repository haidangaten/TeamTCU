<?php

    
if (isset($_POST["regisrer_detail"])) {
    include './database_connect/connect.php';
 include './src/function.php';
    echo '   <h3 class="menuheader expandable">☆ Notification</h3>';
echo '<div box1>';

    $userID = getuser();
    $datefrom = chuanhoa(filter_input(INPUT_POST, 'datefrom'));
    
    if (empty(filter_input(INPUT_POST, 'dateover'))) {
        $dateover = $datefrom;
    }else $dateover = chuanhoa(filter_input(INPUT_POST, 'dateover'));
    $timestart = filter_input(INPUT_POST, 'timestart');
    $duration = filter_input(INPUT_POST, 'duration');
    $room = filter_input(INPUT_POST, 'room');
    if (strlen($datefrom) < 1 || strlen($room) < 1 || strlen($timestart) < 1 || strlen($duration) < 1) {
        $status[] = "You must enter all of infomation!!!";
    } else {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $datacreated = date('Y/m/d H:i:s');
        $today = date('Y-m-d');
        if (strtotime($today) > strtotime($datefrom)) {
            $status[] = "You must choose the time  of future. ";
        }
        if (strtotime($datefrom) > strtotime($dateover)) {
            $status[] = "You must choose the start time before the end time ";
        }
    }
    if (empty($status)) {

        $query = "SELECT * FROM meetingroom_history_detail  WHERE MeetingDate >= '" . $datefrom . " ' AND MeetingDate <= '" . $dateover . "'";
        $dem = 0;
        $result = mysql_query($query);
        $numofID = mysql_num_rows($result);
        while ($database = mysql_fetch_array($result)) {
            if (test_dangky($database['MeetingDate'], $room, $timestart, $duration) != true) {
            
                $registed[] = $database['MeetingDate'];
        }}
        if ( empty($registed)) {
             unset($status);
                    $status[] = "You have successfully registered!!!<br/>";
                    $days = 1;
            while (strtotime($datefrom) <= strtotime($dateover)) {
                writetodb($datefrom, $room, $userID, $timestart, $duration, $datacreated);
                $status[] = $datefrom;
                $datefrom =  date("Y-m-d", strtotime("$datefrom +1 day"));
            }
        } else {
            echo  "The room was registered at:<br/>";
            for($i=0;$i<count($registed);$i++)
            {
                echo $registed[$i]."<br/>";
            }
            mysql_close($con);
        }
}
if(!empty($status))
for($i=0;$i<count($status);$i++)
            {
                echo $status[$i]."<br/>";
            }

echo '</div>';
            }
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    