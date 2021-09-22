<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains The Database Connection.
    */

    //Initialize session
    session_start();

    sleep(1);

    //Requires files
    require_once "config.php";

    $todo = "";

    $todo = (htmlspecialchars($_POST['name']));

    $errors = Array();

    //Escape user inputs for security
    $todo= mysqli_real_escape_string(
    $link, $_REQUEST['todo']);
    date_default_timezone_set('America/Toronto');
    $date=date('y-m-d h:ia');

    // Attempt insert query execution
    $sql = "INSERT INTO list (todo, date_time) VALUES ('$todo', '$date')";
    if(mysqli_query($link, $sql)){
    ;
    } else {
    echo "ERROR: Message not sent!!!";
    }
    // Close connection
    mysqli_close($link);
    
    $query = "SELECT * FROM list ORDER BY date_time DESC LIMIT 100";
    $exec = $link->query($query);

    if (isset($_POST['submit'])){
        if(isset($_POST['name'])) {
            $todo = htmlspecialchars($_POST['name']);
            if (empty($todo)) {
            } else {
                $errors[] = "Please write your to do";
            } 
            } else {
                $errors [] = "You did not submit anything";
            }

            $number_or_errors = count($errors);
            if ($number_or_errors > 0) {
                //show the errors
                for ($i = 0; $i < $number_or_errors; $i++) {
                    echo $errors[$i] . "<br>";
                }
            } else {
                //show detailed receipt
                echo "Todo : " . $todo . "$<br>";

            }
    }

    /*$sql = "SELECT todo, date_time FROM list";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
     output data of each row
    while($row = $result->fetch_array()) {
        echo "to do: " . $row["todo"]. "<br>";
    }
    } else {
    echo "0 results";
    }
    $link->close();*/

    
?>