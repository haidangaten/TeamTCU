<?php



    echo '<li class="top_menu">
            <a href="#">Choose Duration</a>';
    echo "<ul><div id='box1'>";
    $result = mysql_query("SELECT * FROM meetingroom_duration WHERE  Issue = 1 ORDER BY ID");
    while ($row = mysql_fetch_array($result)) {
        echo "<li><a href='index.php?page=_list_registed&content=ID&date=".filter_input(INPUT_GET, 'date') . "&room=" . filter_input(INPUT_GET, 'room') . "&timestart=" . filter_input(INPUT_GET, 'timestart') . "&duration=" . $row['ID'] . "'> " . $row['NameMD'] . "</a></li>";
    }
    echo "</div></ul> </li> ";
    

    