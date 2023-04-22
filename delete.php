<?php
    include_once "db-config.php";
    $con = connection();


    if(isset($_POST['terminate'])){
        $anccode = $_POST['anccode'];
        $query = $con->query("DELETE FROM `announcements` WHERE `annc_code` = '$anccode'") or die ($con->error);

        echo header("Location: index.php");
    }

?>
