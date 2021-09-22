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
    $date = "";

    //$todo = (htmlspecialchars($_POST['text']));

    $errors = Array();

    //Escape user inputs for security
    //$todo= mysqli_real_escape_string(
    //$link, $_REQUEST['todo']);
    //date_default_timezone_set('America/Toronto');
    //$date=date('y-m-d h:ia');

    $query = "SELECT * FROM list ORDER BY date_time DESC LIMIT 100";
    $exec = $link->query($query);

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

            $number_or_errors = count($errors);
            if ($number_or_errors > 0) {
                //show the errors
                for ($i = 0; $i < $number_or_errors; $i++) {
                    echo $errors[$i] . "<br>";
                }
            } else {
                //show details
                echo "Todo : " . $todo . "$<br>";

               /* $output = "";
                while ($row = $exec->fetch_array()) {
                    
                    $text = $row['text'];
                    $time = $row['date_time'];
                    $output .= "<br><div class='todo'>[" . $time . "] " . $text . "</div>";*/
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