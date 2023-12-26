<?php
include('connect.php');

if(isset($_POST['submit'])){
    // Get data from the form fields
    $title = $_POST['title'];
    $ISBN = $_POST['isbn'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    // Corrected SQL query
    $sql = "INSERT INTO books (title, ISBN, author, publication_year, description, content) VALUES ('$title', '$ISBN', '$author', '$publication_year', '$description', '$content')";

    // Method to execute the query
    $result = mysqli_query($conn, $sql);

    if($result) {
        // Data inserted successfully
        header("Location: display.php");
    } else {
        // Display an error message
        die(mysqli_error($conn));
    }
    //selecting all
       // Select and display all records from the "books" table
       $selectSql = "SELECT * FROM books";
       $result = $conn->query($selectSql);
   
       if ($result->num_rows > 0) {
           echo "<h2>Books List:</h2>";
           echo "<ul>";
   
           while ($row = $result->fetch_assoc()) {
               echo "<li>Title: " . $row["title"] . ", ISBN: " . $row["ISBN"] . ", Author: " . $row["author"] . "</li>";
               // Add more fields as needed
           }
   
           echo "</ul>";
       } else {
           echo "No records found.";
       }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter book's title" autocomplete="off">
            </div>
            <div class="form-group">
                <label>ISBN:</label>
                <input type="number" class="form-control" id="isbn" name="isbn" placeholder="Enter isbn of the book" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Author:</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author of the book" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Publication year:</label>
                <input type="number" class="form-control" id="publication_year" name="publication_year" placeholder="Enter bpublication year of the book" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" id="decription" name="description" placeholder="Enter description of the book" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Content:</label>
                <input type="text" class="form-control" id="content" name="content" placeholder="Enter content of the book" autocomplete="off">
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>