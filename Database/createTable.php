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
        include 'DBConn.php';
        $drop_query = 'DROP TABLE IF EXISTS `bookstore`.`tblUser`';
        $create_query = 'CREATE TABLE `bookstore`.`tblUser` ( `user_id` int(10) PRIMARY KEY  AUTO_INCREMENT NOT NULL, `userName` varchar(128) NOT NULL, `userSTNumber` varchar(128) NOT NULL, `userPass` varchar(128) NOT NULL) ';
        $field_separator = '\'\t\''; //character which seperates the fields in csv file it can other than \t
        $line_separator = '\'\n\''; //character which seperates the records in csv file it can other than \n
        $csv_file = 'userData.csv';
        $import_query = ' LOAD DATA LOCAL INFILE \''.$csv_file.'\' INTO TABLE `bookstore`.`tblUser` FIELDS TERMINATED BY '.$field_separator.' LINES TERMINATED BY '.$line_separator;
        // the import query should look like LOAD DATA LOCAL INFILE 'test.csv' INTO TABLE `test`.`tbl_user` FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
        if(!file_exists($csv_file)) {
        die("File not found. Make sure you specified the correct path.");
        }
        mysqli_query($conn,$drop_query); // drop the table if it exists
        mysqli_query($conn,$create_query); //create the table
        mysqli_query($conn,$import_query); // import the csv file
        $rows_imported = mysqli_affected_rows($conn); // returns how many rows are affected/inserted
        echo $rows_imported.' row(s)affected';
    ?>
</body>
</html>