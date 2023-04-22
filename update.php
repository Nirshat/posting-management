<?php
include_once "db-config.php";
$con = connection();

if(isset($_POST['update'])){
    $postCode = $_POST['postCode'];
    $message = test_input($_POST['updatePostMsg']);
    $message = str_replace("  ", "&nbsp;", $message); // replace all inputted spaces with output spaces

    $sql = "UPDATE `announcements` SET `message`='$message', `posted_time`= NOW() WHERE `annc_code` = '$postCode' ";
    $config = $con->query($sql) or die ($con->error);

    echo header("Location: index.php");
}



function tripInp($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
