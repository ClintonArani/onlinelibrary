<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql = "SELECT* from books WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$ISBN = $row['ISBN'];
$author = $row['author'];
$publication_year = $row['publication_year'];
$description = $row['description'];
$content = $row['content'];

if(isset($_POST['submit'])){
    //get data from the form field
    $title = $_POST['title'];
    $ISBN = $_POST['isbn'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    $sql = "UPDATE books SET id=$id, title='$title', ISBN='$ISBN', author='$author', publication_year='$publication_year', description='$description', content='$content' WHERE id = $id" ;
    //method to execute the query
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        //echo "updated successfully";
        header("Location:display.php");
    }else{
        die(mysqli_error($conn));
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter book's title" autocomplete="off" value=<?php echo $title;?>>
            </div>
            <div class="form-group">
                <label>ISBN:</label>
                <input type="number" class="form-control" id="isbn" name="isbn" placeholder="Enter isbn of the book" autocomplete="off" value=<?php echo $ISBN;?>>
            </div>
            <div class="form-group">
                <label>Author:</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author of the book" autocomplete="off" value=<?php echo $author;?>>
            </div>
            <div class="form-group">
                <label>Publication year:</label>
                <input type="number" class="form-control" id="publication_year" name="publication_year" placeholder="Enter bpublication year of the book" autocomplete="off" value=<?php echo $publication_year;?>>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <input type="text" class="form-control" id="decription" name="description" placeholder="Enter description of the book" autocomplete="off" value=<?php echo $description;?>>
            </div>
            <div class="form-group">
                <label>Content:</label>
                <input type="text" class="form-control" id="content" name="content" placeholder="Enter content of the book" autocomplete="off" value=<?php echo $content;?>>
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>