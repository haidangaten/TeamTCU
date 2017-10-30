<?php

if (isset($_POST["changeroom"])) {
    echo '   <h3 class="menuheader expandable">☆ Notification</h3>';
    include './database_connect/connect.php';
    echo '<div id="box1">';

    //nhap du lieu
    if (filter_input(INPUT_POST, 'room_name')) {



        //kiem tra thong tin
        $sql = "SELECT ID FROM list_room WHERE  nameRoom = '" . filter_input(INPUT_POST, 'room_name') . "' and ID<> " . $_GET['ID'] . " ";
        $result = mysql_query($sql);

        if (mysql_num_rows($result) >= 1) {
            echo "The name of room was created !!!";
        } else {
            $sqlcmd = "UPDATE `list_room` SET `nameRoom`='" . filter_input(INPUT_POST, 'room_name') . "',`numOfSeats`=" . filter_input(INPUT_POST, 'numofseat') . ",`numOfScreen`=" . filter_input(INPUT_POST, 'numofscreens') . ",`numOfTV`=" . filter_input(INPUT_POST, 'numoftv') . ",`numOfBoard`=" . filter_input(INPUT_POST, 'numofboard') . ",`airConditioner`=" . filter_input(INPUT_POST, 'aircnditioner') . ",`soundSystem`='" . filter_input(INPUT_POST, 'soundsys') . "',`Issue`=" . filter_input(INPUT_POST, 'issue') . " WHERE ID =" . $_GET['ID'];
            mysql_query($sqlcmd);
            $sql = "SELECT ID FROM list_room WHERE  nameRoom = '" . filter_input(INPUT_POST, 'room_name') . "'  ";

            $result = mysql_query($sql);

            if (mysql_num_rows($result) == 1)
                echo "Change the room Complete !!!";
        }
    } mysql_close($con);
    echo '</div>';
}
?>