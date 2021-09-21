<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
</head>
<body>
    <div id="demo">
        TO DO: <input type="text" name="name"><br>
        <input type="submit" onclick="loadDoc()">
    </div>

    <script>
        function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "list.php", true);
        xhttp.send();
        }
    </script>

</body>
</html>