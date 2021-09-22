<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains The Database Connection.
    */

    //Initialize session
    session_start();

    //Requires files
    require_once "config.php";

    $todo = "";

    if (isset($_POST['submit'])){

    // Escape user inputs for security
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

    }

    $sql = "SELECT todo, date_time FROM list";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
        echo "to do: " . $row["todo"]. "<br>";
    }
    } else {
    echo "0 results";
    }
    $link->close();

    
?>