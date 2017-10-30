<?php

include './database_connect/connect.php';
if (isset($_POST["change"])) {
            echo '   <h3 class="menuheader expandable">☆ Notification</h3>';


    echo'<div id="box1">';
    $hashpass = md5("#$%" . filter_input(INPUT_POST, 'adminpassword'));
    $sql = "SELECT ID FROM meetingroom_user  Where password='" . $hashpass . " 'and username='" . $_SESSION['username'] . "'";
    $result = mysql_query($sql);

    $count = mysql_num_rows($result);
    if ($count == 1) {
    
    
   if ($_FILES['image']) {
        $tmp_name = $_FILES['image']['tmp_name'];
        if(!empty($tmp_name))
	$image = addslashes(file_get_contents($tmp_name));
        if(!empty($image)){
                     $sqlcmd = "UPDATE meetingroom_user SET avata='".$image."' WHERE ID='" . $_GET['ID'] . "'";
        mysql_query($sqlcmd);}
    }

    //nhap du lieu
            
    if (strcmp(filter_input(INPUT_POST, 'password'),filter_input(INPUT_POST, 'confirmpassword'))==0) { 
            
        $sql = "SELECT password FROM `meetingroom_user` where username = '" . filter_input(INPUT_POST, 'username') . "' ";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if (strcmp(filter_input(INPUT_POST, 'password'), $row['password'])==0) { 
            $sqlcmd = "UPDATE meetingroom_user SET fullName='" . filter_input(INPUT_POST, 'fullname') . "',username='" . filter_input(INPUT_POST, 'username') . "',sodienthoai='" . filter_input(INPUT_POST, 'phonenum') . "',Email='" . filter_input(INPUT_POST, 'email') . "' WHERE ID=".$_GET['ID'];
        } else {
            $sqlcmd = "UPDATE meetingroom_user SET fullName='" . filter_input(INPUT_POST, 'fullname') . "',username='" . filter_input(INPUT_POST, 'username') . "',password='" . md5("#$%" . filter_input(INPUT_POST, 'password')) . "',sodienthoai='" . filter_input(INPUT_POST, 'phonenum') . "',Email='" . filter_input(INPUT_POST, 'email') . "' WHERE ID=".$_GET['ID'];
        }
        mysql_query($sqlcmd);
            echo "Change complete the member  !!!";
    }else {
    echo "Password not same!!! ";    
    }
    mysql_close($con);
}else echo "Password do not match!!!";echo"</div>";
}



?>