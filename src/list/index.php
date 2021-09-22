<?php

require_once "config.php";
require_once "list.php"; //ASK IYAD 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TO DO</title>
</head>
<body>
    <div class="row">
        <div id="order_form" class="column">
            TO DO: <input type="text" name="name"><br>
            <input type="submit" id="submit" name="submit" onclick="loadDoc()">            
        </div>
        <div id="text_output">
            List
        </div>
    </div>

    <script>
        function loadDoc() {

            var loader = '<div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';  
            document.getElementById("text_output").innerHTML = loader;

            var q_name = document.getElementById("name");

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("text_output").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "list.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("submit=true&text=" + q_name);
            }

    </script>

</body>
</html>