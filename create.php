<?php
    include_once "db-config.php";
    $con = connection();


    if(isset($_POST['post'])){
        $message = test_input($_POST['createPostMsg']);
        $message = str_replace("  ", "&nbsp;", $message); // replace all inputted spaces with output spaces (&nbsp;)


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
