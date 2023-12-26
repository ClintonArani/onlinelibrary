<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button  class="btn btn-primary my-5" ><a href="insert.php" class="text-light">Add Book</a></button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">ISBN</th>
      <th scope="col">Author</th>
      <th scope="col">Publication</th>
      <th scope="col">Description</th>
      <th scope="col">Content</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php
  // Retrieve the list of books
$sql = "SELECT * FROM books";
    //executing the query
    $result = mysqli_query($conn,$sql);
    if($result){
       while( $row = mysqli_fetch_assoc($result))
       {
            $id = $row['id'];
            $title = $row['title'];
            $ISBN = $row['ISBN'];
            $author = $row['author'];
            $publication_year = $row['publication_year'];
            $description = $row['description'];
            $content = $row['content'];
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$title.'</td>
            <td>'.$ISBN.'</td>
            <td>'.$author.'</td>
            <td>'.$publication_year.'</td>
            <td>'.$description.'</td>
            <td>'.$content.'</td>
            <td>
            <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">update</a></button>
            &nbsp
            <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light">delete</a></button>
            </td>
            
        
          </tr>';
       }
    }
  ?>
  
   <button style="position:absolute; right: 50px" class="btn btn-danger my-5"><a href="Homepage.php" class="text-light">exit</a></button>
  </tbody>
</table>
    </div>
    
</body>
</html>