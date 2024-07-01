<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gym_reservation";
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$nameErr = $lnameErr = $genderErr = $usernameErr = $passwordErr = $conf_password = $emailErr = $contactnumberErr = "";

$name = $lname = $gender = $username = $password = $conf_password = $email = $contactnumber = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "First name is required";
    }else{
        $name = input_data($_POST['name']);
        if(!preg_match("/^[a-zA-Z]*$/",$name))
            $nameErr = "Only Alphabets and white spaces are allowed";
    }

    if(empty($_POST["lname"])){
        $lnameErr = "Last name is required";
    }else{
        $lname = input_data($_POST['lname']);
        if(!preg_match("/^[a-zA-Z]*$/",$lname))
            $lnameErr = "Only Alphabets and white spaces are allowed";
    }

    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    }else{
        $email = input_data($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid Email format";
        }
    }

    if(empty($_POST["contactnumber"])){
        $contactnumberErr = "Contact number is required";
    }else{
        $contactnumber = input_data($_POST['contactnumber']);
        if(!preg_match("/^[0-9]*$/",$contactnumber)){
            $contactnumberErr = "Only digits are allowed";
        }
        if(strlen($contactnumber) != 11){
            $contactnumberErr = "Contact number must contain 11 digits";
        }
    }

    if(empty($_POST["gender"])){
        $genderErr = "Gender is required";
    }else{
        $gender = input_data($_POST["gender"]);
    }
    
    if(empty($_POST['username'])){
        $usernameErr = "Username is required";
    }else{
        $username = input_data($_POST['username']);
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
            $usernameErr = "Special characters are not allowed";
    }

    if(empty($_POST["password"])){
        $passwordErr = "Password is required";
    }else if($_POST["password"] != $_POST['conf_password']){
        $passwordErr = "Passwords do not match";
    }else{
        $password = input_data($_POST["password"]);
    }

    if(isset($_POST['submit'])){
        if($nameErr == "" && $lnameErr == "" && $genderErr == "" && $usernameErr == "" && $passwordErr == "" && $emailErr == "" && $contactnumberErr == ""){
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (name, lname, gender, username, password, email, contactnumber) VALUES ('$name','$lname','$gender','$username','$hashed_password','$email','$contactnumber')";
            
            if(mysqli_query($conn, $sql)){
                echo "Registered successfully";
                header("location: login.php");
                exit();
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
            }
        }
    }
}

function input_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<html lang="en">
<head>
    <link rel="stylesheet" href="register.css">
    <style>
        .error {
            color: red;
        }
        .labeltxt {
            font-weight: bold;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <title>Register</title>
</head>
<body>
    <div class="register_form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <span class="labeltxt">First Name:</span>
            <input type="text" name="name" value="" placeholder="First name">
            <span class="error"><?php echo $nameErr; ?></span>
            <br><br>
            <span class="labeltxt">Last Name:</span>
            <input type="text" name="lname" value="" placeholder="Last name">
            <span class="error"><?php echo $lnameErr; ?></span>
            <br><br>
            <span class="labeltxt">Gender:</span>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Other
            <span class="error"><?php echo $genderErr; ?></span>
            <br><br>
            <span class="labeltxt">Username:</span>
            <input type="text" name="username" value="" placeholder="username">
            <span class="error"><?php echo $usernameErr; ?></span>
            <br><br>
            <span class="labeltxt">Password:</span>
            <input type="password" name="password" value="" placeholder="password">
            <span class="error"><?php echo $passwordErr; ?></span>
            <br><br>
            <span class="labeltxt">Confirm password:</span>
            <input type="password" name="conf_password" value="" placeholder="confirm password">
            <span class="error"><?php echo $passwordErr; ?></span>
            <br><br>
            <span class="labeltxt">Email</span>
            <input type="text" name="email" value="" placeholder="email">
            <span class="error"><?php echo $emailErr; ?></span>
            <br><br>
            <span class="labeltxt">Contact number</span>
            <input type="number" name="contactnumber" value="" placeholder="contactnumber">
            <span class="error"><?php echo $contactnumberErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit"><br><br><br>
            <a style = " text-decoration: none;"class= "vv" href="login.php">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>
