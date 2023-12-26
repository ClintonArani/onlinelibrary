<?php
// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softlibrary";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Sanitize the input to prevent SQL injection
    $search_query = $conn->real_escape_string($query);
    
    // Replace 'books' with your actual table name
    $sql = "SELECT * FROM books WHERE title LIKE ? ";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind the search_query as a parameter
    $stmt->bind_param("s", $search_query);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Create a link to the content with the book title
            echo '<a href="' . $row['content'] . '" target="_blank">Title: ' . $row['title'] . '</a><br>';
        }
    } else {
        echo "No results found.";
    }

    // Close the prepared statement
    $stmt->close();
    
    $conn->close();
}
?>
