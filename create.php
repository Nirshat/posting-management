<?php
    include_once "../Connection/connection.php";
    $con = connection();


    if(isset($_POST['post'])){
        $message = test_input($_POST['createPostMsg']); // clone message
        $message = str_replace("  ", "&nbsp;", $message); // replace all 'sp' with space


        $sql = "INSERT INTO `announcements`(`message`, `posted_time`) 
        VALUES ('$message', NOW())";
        $config = $con->query($sql) or die ($con->error);

        echo header("Location: index.php");
    }



    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
