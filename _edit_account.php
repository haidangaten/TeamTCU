<?php

include './database_connect/connect.php';
if (isset($_POST["edit"])) {
    echo '   <h3 class="menuheader expandable">☆ Notification</h3>';

    if ($_FILES['image']) {
        $tmp_name = $_FILES['image']['tmp_name'];
        if(!empty($tmp_name))
	$image = addslashes(file_get_contents($tmp_name));
        if(!empty($image)){
                     $sqlcmd = "UPDATE meetingroom_user SET avata='".$image."' WHERE username='" . $_SESSION['username'] . "'";
        mysql_query($sqlcmd);}
    }

    echo'<div id="box1">';
    //nhap du lieu
    $hashpass = md5("#$%" . filter_input(INPUT_POST, 'password'));
    $sql = "SELECT ID FROM meetingroom_user  Where password='" . $hashpass . " 'and username='" . $_SESSION['username'] . "'";
    $result = mysql_query($sql);

    $count = mysql_num_rows($result);
    if ($count == 1) {
    $row = mysql_fetch_array($result);
    $ID =$row['ID'];
        $sql = "SELECT ID FROM meetingroom_user  Where username='" . filter_input(INPUT_POST, 'username') . "' and ID <> ".$ID;
        $result = mysql_query($sql);
        if (empty(mysql_num_rows($result))) {
            if (strcmp(filter_input(INPUT_POST, 'newpassword'), filter_input(INPUT_POST, 'confirmpassword')) == 0) {
                $sql = "SELECT password FROM `meetingroom_user` where username = '" . $_SESSION['username'] . "' ";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);
                if (strcmp(filter_input(INPUT_POST, 'newpassword'), $row['password']) == 0) {
                  
                    $sqlcmd = "UPDATE meetingroom_user SET fullName='" . filter_input(INPUT_POST, 'fullname') . "',username='" . filter_input(INPUT_POST, 'username') . "',sodienthoai='" . filter_input(INPUT_POST, 'phonenum') . "',Email='" . filter_input(INPUT_POST, 'email') . "' WHERE username='" . $_SESSION['username'] . "'";
                } else {
                    $sqlcmd = "UPDATE meetingroom_user SET fullName='" . filter_input(INPUT_POST, 'fullname') . "',username='" . filter_input(INPUT_POST, 'username') . "',password='" . md5("#$%" . filter_input(INPUT_POST, 'newpassword')) . "',sodienthoai='" . filter_input(INPUT_POST, 'phonenum') . "',Email='" . filter_input(INPUT_POST, 'email') . "' WHERE username='" . $_SESSION['username'] . "'";
                }

                mysql_query($sqlcmd);
                $sql = "SELECT ID FROM `meetingroom_user` where username = '" . filter_input(INPUT_POST, 'username') . "' ";
                $_SESSION['username'] = filter_input(INPUT_POST, 'username');
                $result = mysql_query($sql);

                if (mysql_num_rows($result) == 1)
                    echo "Edit a member Complete !!!";
            }
            echo"</div>";
            mysql_close($con);
        } else
          echo   "Username chosen has already been used!";
    }else {
        echo "Current password do not match";
    }
}