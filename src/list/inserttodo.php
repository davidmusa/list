<?php

    require_once "config.php";

    $todo = "";
    date_default_timezone_set('America/Toronto');
    $date = date('y-m-d h:ia');

    if (isset($_POST['submit'])){
        if(isset($_POST['text'])) {
            $todo = htmlspecialchars($_POST['text']);
            if (empty($todo)) {
            } else {
                $errors[] = "Please write your to do";
            } 
            } else {
                $errors [] = "You did not submit anything";
            }

        // Attempt insert query execution
            $sql = "INSERT INTO list (todo, date_time) VALUES ('$todo', '$date')";
            if(mysqli_query($link, $sql)){
            ;
            } else {
            echo "ERROR: Message not sent!!!";
            }
            // Close connection
            mysqli_close($link);

    }

?>