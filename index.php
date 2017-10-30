<?php include './src/_start_session.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="css/layout1.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu_register.css" rel="stylesheet" type="text/css"/>
        <link href="css/table.css" rel="stylesheet" type="text/css"/>
        <title>
            ADMIN CONTROLPANEL
        </title>
        <?php include './page/' . $_SESSION['authority'] . '/_header.php'; ?>

    </head>
    <body>
        <div id="container">
            <div id="wrapper" class="clearfix">

                <div id="content">

                    <?php
                    
                    if(!isset($_GET['page'])) $_GET['page']="_home";
                    
                    include './page/' . $_SESSION['authority'] . '/content/_register_bar.php'; ?>
                    <div>   <?php include './page/' . $_SESSION['authority'] . '/content/' . $_GET['page'] . '.php'; ?></div>

                   
                </div>
                <div id="extra">

                    <?php include './page/' . $_SESSION['authority'] . '/_extra.php'; 
                  
                    

                    ?>                    
                </div>
            </div>

        </div>
    </body>
    <footer>
        <div id="footer">
  
            <?php include './page/' . $_SESSION['authority'] . '/_footer.php'; ?>
        </div>
    </footer>
</html>
