<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['email'];
    $EnteredPassword = $_POST['password'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve hashed password from the database based on the entered email
    $sql = "SELECT password FROM registration WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify entered password against the stored hashed password
        if (password_verify($EnteredPassword, $hashedPassword)) {
            // Password is correct, proceed with login
            header("Location:BILL CLINTON\search.html");  // Redirect to the welcome page or wherever you want to go after login
            exit;
        } else {
            // Password is incorrect
            die(mysqli_error($conn));
        }
    } else {
        // User not found
        echo "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="login_body">
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="" method="POST" >
                <div class="input-box">
                    <input type="email"  name="email" required autocomplete="off">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required autocomplete="off">
                    <label>password</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">login</button>
                <div class="Login-register">
                    <p>Don't have an account?<a href="signup.php" class="register-link">register</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>