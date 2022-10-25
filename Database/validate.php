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
        function no_entry($var, $text, $location, $ms, $data){
            if (empty($var)) {
                 # Error message
                 $em = "The ".$text." is required";
                 header("Location: $location?$ms=$em&$data");
                 exit;
            }
            return 0;
         }
    ?>
</body>
</html>