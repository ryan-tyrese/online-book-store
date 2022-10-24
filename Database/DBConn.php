<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    # Server connection
        $serverName = "localhost";
        $userName = "root";
        $serverPwd = "";
    
    # Database connection
        $db_name = "bookstore";
    # SQLi Connection
        $conn = new mysqli($serverName, $userName, $serverPwd);
    #Check Connection
        if ($conn->connect_error){
            die("Connection Failed: ". $conn->connect_error);
        }
        echo "Connected Successfully";
    ?>
</body>
</html>