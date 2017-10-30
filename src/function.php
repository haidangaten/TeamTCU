<?php
function chuanhoa($str){
     
    $daypair = split("/", trim($str));
        $daychuan = $daypair[2] . "-" . $daypair[0] . "-" . $daypair[1];
        return $daychuan;
}
 function test_dangky($date, $room, $tstart, $dura) {

        $result = mysql_query("SELECT ID ,MeetingDate ,MeetingTimeID, MeetingDurationID ,RoomID FROM meetingroom_history_detail where MeetingDate='" . $date . "' and RoomID ='" . $room . "'");
        while ($database = mysql_fetch_array($result)) {
            if ((int) $tstart < (int) $database['MeetingTimeID'] && (int) $database['MeetingTimeID'] < (int) $tstart + (int) $dura) {
                return false;
            }
            if ((int) $tstart >= (int) $database['MeetingTimeID'] && (int) $tstart < (int) $database['MeetingTimeID'] + (int) $database['MeetingDurationID']) {
                return FALSE;
            }
        } return true;
    }

    function writetodb($date, $room, $userID, $timestart, $duration, $createddate) {
        $sqlcmd = "INSERT INTO `meetingroom_history_detail`( `MeetingDate`, `MeetingTimeID`, `MeetingDurationID`, `RoomID`, `UserID`, `DateCreated` , Statuss) VALUES ('" . $date . "', " . $timestart . ", " . $duration . ", " . $room . ", " . $userID . ", '" . $createddate . "',1)";
        mysql_query($sqlcmd);
    }

    function check($date, $room, $userID, $timestart, $duration, $createddate) {
        $sqlcmd = "SELECT ID FROM meetingroom_history_detail  WHERE  MeetingDate= '" . $date . "' and  MeetingTimeID=" . $timestart . " and MeetingDurationID=" . $duration . " and RoomID=" . $room . " and UserID=" . $userID . " and DateCreated='" . $createddate . "'";

        $result = mysql_query($sqlcmd);
        $row = mysql_fetch_array($result);
        if (!empty($row['ID'])) {
            return true;
        }
        return false;
    }

    function getuser() {
        $sqlcmd = "SELECT `ID` FROM `meetingroom_user` WHERE username ='" . $_SESSION['username'] . " '";
        $result = mysql_query($sqlcmd);
        $row = mysql_fetch_array($result);
        return $row['ID'];
    }