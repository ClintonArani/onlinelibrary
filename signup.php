<?php
include("connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform data validation and insertion into the database
    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $id_no = $_POST['id'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Contact = $_POST['contact'];

    // Hash the password
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO registration(firstName, lastName, id_no, email, password, contact) 
            VALUES('$FirstName', '$LastName', '$id_no', '$Email', '$hashedPassword', '$Contact')";

    if ($conn->query($sql) == TRUE) {
        // Registration successful, redirect to the login page
        header("Location: login.php");
    } else {
        die(mysqli_error($conn));
    }
    $conn->close();
}
?>

    ?>
    </body>
</html>
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
            var firstname = document.myform.firstname.value.trim();
            var lastname = document.myform.lastname.value.trim();
            var password = document.myform.password.value.trim();
            var id = document.myform.id.value.trim();
            //email validation
            var emailID = document.myform.email.value.trim();
            var atpos = emailID.indexOf("@");
            var dotpos = emailID.lastIndexOf(".");
        
            var contact= document.myform.contact.value.trim();
        
            if(firstname === "")
            {
                alert("Please enter the first name to continue");
                document.myform.firstname.focus();
                return false;
            }
            if(lastname ==="")
            {
                alert("please enter last name to continue");
                document.myform.lastname.focus();
                return false;
            }
            if(id ===""){
                alert("please enter id to continue");
                document.myform.id.focus();
                return false;
            }
            if (atpos < 1 || (dotpos - atpos < 2)) {
                alert("Please enter a correct email ID with the format, e.g., username@gmail.com to continue");
                document.myform.email.focus();
                return false;
            }
            if(password ==="")
            {
                alert("please enter password  to continue");
                document.myform.password.focus();
                return false;
            }
            if(contact ===""){
                alert("Enter your contact to continue")
                return false;
            }
            
           
            return true;
        }
        
        
        
                
        </script>

</head>
<body class="signup_body">
    <div class="signup">
        <form action="" method="post" name="myform" onsubmit="return formValidation()">
            <div class="head"><h2>Registration Form</h2></div>
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" autocomplete="off">

            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" autocomplete="off">

            <label for="id">ID:</label>
            <input type="number" name="id" id="id" placeholder="Enter your Id no." autocomplete="off">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email address" autocomplete="off">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off">

            <label for="contact">Contact</label>
            <input type="tel" name="contact" id="contact" placeholder="Enter your contact" autocomplete="off">

             <input class="btnsignup" type="submit" name="btnsignup" value="Signup"  >
             <div id="Login-register">
                <p class="account">Already have an account?<a href="login.php" class="register-link">Login</a></p>
            </div>
    
        </form>
    </div>
</body>
</html>