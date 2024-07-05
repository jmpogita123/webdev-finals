<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym_reservation";
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);



}else{
    echo "";
    }
    



    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];


    
        $sql = "SELECT * FROM  users WHERE username = '$username' AND password ='$password' ";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        
            if($result->num_rows ==1){
                echo "<script>alert('Login Successful!'); </script>";
            
            
    
        }else{
            echo '<script> alert("login failed")</script>';
    
        }

        if(is_array($row)){
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];

        }else{
            echo '<script type= "text/javascript">';
            echo 'alert(Invalid username or password)';
            echo 'window.location.href = "login.php"';
            echo "</script>";
        }
        if($row['usertype'] == "admin"){
            header("location:adminpage.php");
        }else{
            header("location:welcome.php");
        }

    
    }

    


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <title>Login</title>

<link rel="stylesheet" href="login.css">

</head>
<body>
<div class = "login_form">

<h1>LOG IN</h1>


<form method = "post" action='login.php' >
<span>Username</span>
<input type="text" name="username" value="" placeholder= "username">

<span>Password</span>
<input type="password" name="password" value="" placeholder= "password">

<input class="mama" type="submit" name = 'submit'  value = "Login"><br>




<a style= "text-decoration:none; "class="mama" href="register.php">Register</a>
</form>
</div>    


    
</body>
</html>