 <?php

    if (!empty(filter_input(INPUT_POST, 'username')) and ! empty(filter_input(INPUT_POST, 'password'))) {
        $myusername = filter_input(INPUT_POST, 'username');
        $mypassword = filter_input(INPUT_POST, 'password');
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);
        $hashpass = md5("#$%".$mypassword);
        $tbl_name = 'meetingroom_user';
        
        $sql= "SELECT admin FROM ". $tbl_name ." Where password='". $hashpass  .  " 'and username='". $myusername."'" ;
        $result= mysql_query($sql);
       
        $count = mysql_num_rows($result);
        if ($count == 1) {
            $row = mysql_fetch_array( $result);
            $authority = $row['admin'];
// Register $myusername, $mypassword and redirect to file "login_success.php"
          
            $_SESSION['username'] = $myusername;
            if($authority==1)
            $_SESSION['authority'] = 'admin';
        else { 
             $_SESSION['authority'] = 'member';
        }
          header("location:../index.php?page=_home") ;

        } else {
            echo "<script> alert('Wrong Username or Password')</script>";
        }
    }


