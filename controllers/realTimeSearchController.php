<?php
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
$baseurl = new Baseurl;
define("LINK", "{$baseurl->url()}/serverit/");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["searchValue"])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        $searchValue = validate($_POST["searchValue"]);
        $searchValue = '%'.$searchValue.'%';

        include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";

        $sql = "select id,title from courses where title like ? or sub_title like ? or motivational_title like ? or motivational_des like ? or tags like ? limit 5";

        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, 'sssss', $search1, $search2, $search3, $search4, $search5);

        $search1 = $searchValue;
        $search2 = $searchValue;
        $search3 = $searchValue;
        $search4 = $searchValue;
        $search5 = $searchValue;

        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 0) {
            echo 'No match found!';
        } elseif (mysqli_stmt_num_rows($stmt) > 4) {
            mysqli_stmt_bind_result($stmt, $id, $title);
            while (mysqli_stmt_fetch($stmt)) {
                echo '<a href="course-details/'. $id .'"><i class="fas fa-search"></i> ' . $title . '</a><br/><br/>';
            }
            echo "more...";
        } else {
            mysqli_stmt_bind_result($stmt, $id, $title);
            while (mysqli_stmt_fetch($stmt)) {
                echo '<a href="course-details/'. $id .'"><i class="fas fa-search"></i> ' . $title . '</a><br/><br/>';
            }
        }
    }
}
?>