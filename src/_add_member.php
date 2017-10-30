<?php

include './database_connect/connect.php';
if (isset($_POST["submit_name"])) {
    echo '   <h3 class="menuheader expandable">☆ Notification</h3>';

    echo'<div id="box1">';
    if (!empty($_FILES['image'])) {
        
        $tmp_name = $_FILES['image']['tmp_name'];
	if(!empty($tmp_name))
        $image = addslashes(file_get_contents($tmp_name));
        else $image='0';
                                
    }
    
 
    if (filter_input(INPUT_POST, 'fullname')) {



        //kiem tra thong tin
        $sql = "SELECT ID FROM `meetingroom_user` where username = '" . filter_input(INPUT_POST, 'username') . "' ";

        $result = mysql_query($sql);

        if (mysql_num_rows($result) > 1) {
            echo "The username was created! please enter again!!!";
        } else {
            $sqlcmd = "INSERT INTO `meetingroom_user`( `fullName`, `username`, `password`, `admin`, `sodienthoai`, `Email`,avata) VALUES ('" . filter_input(INPUT_POST, 'fullname') . "','" . filter_input(INPUT_POST, 'username') . "','" . md5("#$%" . filter_input(INPUT_POST, 'password')) . "'," . filter_input(INPUT_POST, 'authority') . ",'" . filter_input(INPUT_POST, 'phonenum') . "','" . filter_input(INPUT_POST, 'email') . "','" . $image . "')";

            mysql_query($sqlcmd);
            $result = mysql_query($sql);

            if (mysql_num_rows($result) == 1)
                echo "Add a member Complete !!!";
            else
                echo "Add a member fail !!!";
        }
    }
    mysql_close($con);
    echo"</div>";
}
?>