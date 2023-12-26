<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mysql database</title>
</head>
<body>
    <?php
        // database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "softLibrary";

        // make a connection
        $conn = new mysqli($servername, $username, $password);
        // check connection
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }

        // create database
        $sql = "CREATE DATABASE IF NOT EXISTS $database";
        if($conn->query($sql) === TRUE){
            echo "Database created successfully\n";
        } else {
            echo "Error creating database:".$conn->error;
        }

        // connecting to database
        $conn = new mysqli($servername, $username, $password, $database);
        // check connection
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }

        // creating table
        $tables = [
            "registration" => "CREATE TABLE IF NOT EXISTS registration(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstName VARCHAR(20) NOT NULL,
                lastName VARCHAR(20) NOT NULL,
                id_no INT(10) NOT NULL UNIQUE,
                email VARCHAR(30) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL UNIQUE, -- 255 is used to store hashed password
                contact VARCHAR(15) NOT NULL UNIQUE
            )",
            "books" => "CREATE TABLE IF NOT EXISTS books(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(30) NOT NULL,
                ISBN INT(4) NOT NULL UNIQUE,
                author VARCHAR(30) NOT NULL,
                publication_year INT(4) NOT NULL,
                description VARCHAR(250) NOT NULL,
                content VARCHAR(100) NOT NULL UNIQUE
            )",
            "admin" => "CREATE TABLE IF NOT EXISTS admin(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(20) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL UNIQUE -- 255 is used to store hashed password
            )"
        ];

        foreach($tables as $tableName => $tablesql){
            if($conn->query($tablesql) === TRUE){
                echo "Table $tableName created successfully\n";
            } else {
                echo "Error creating table $tableName:".$conn->error;
            }
        }

    ?>
</body>
</html>
