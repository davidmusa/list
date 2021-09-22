<?php
    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains The Database Connection.
    */
    
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'todo');
     
    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
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
