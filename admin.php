<?php
  include("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Email = $_POST['email']; // Assuming the email is used as the username
        $Password = $_POST['password'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $Email, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User is authenticated, you can redirect them to a secure page.
            header("Location: display.php");
            
        } else {
            die(mysqli_error($conn));
        }
    }        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library signup page</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function formValidation()
        {
            var password = document.myform.password.value.trim();
            //email validation
            var emailID = document.myform.email.value.trim();
            var atpos = emailID.indexOf("@");
            var dotpos = emailID.lastIndexOf(".");
        
            if (atpos < 1 || (dotpos - atpos < 2)) {
                alert("Please enter a correct email ID with the format, e.g., username@gmail.com to continue");
                document.myform.email.focus();
                return false;
            }
            if(password ==="")
            {
                alert("please enter password  to continue")
                document.myform.password.focus();
                return false;
            }
            return true;
        }       
        </script>

</head>
<body class="signup_body">
    <div class="signup">
        <form action="admin.php" method="post" name="myform" onsubmit="return formValidation()">
            <div class="head"><h2>Admin login</h2></div>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email address" autocomplete="off">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="">

             <input class="btnsignup" type="submit" name="btnsignup" value="Signup"  >
    
        </form>
    </div>
</body>
</html>