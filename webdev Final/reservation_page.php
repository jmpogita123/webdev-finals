
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
    


    if(!isset($_SESSION['username'])){ //if login in session is not set
        header("Location:login.php");
    }


?>




<html lang="en">
    <link rel="stylesheet" href="reservation.css">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resevation</title>
</head>
<body>

<form action="reservationconfirm.php" method = "POST">
    <h1>BOOK YOUR TRAINER</h1>
    <br><br>
    <div>
    <span>Choose your work out plan</span>
    <br><br>
        <input type="radio" name = 'program' value = "Upper Body">
        <span>Upper Body</span>
        <input type="radio" name = 'program' value = "Lower Body">
        <span>Lower Body</span>
        <input type="radio" name = 'program' value = "Full Body">
        <span>Full Body</span>      
        <input type="radio" name = 'program' value = "Yoga">
        <span>Yoga</span>
    </div>
    <br>
    <span>Weight KG</span>
    <input type="number" name ="before_weightkg">
    <span>Height CM</span>
    <input type="number" name ="before_heightkg">


    <span>Program start</span>
        <input type="date" name = 'start_date' id = "start_date">

    <span>Program end</span>
        <input type="date" name = 'end_date' id = "end_date">
        <br>
<br>
<br>
    <input type="submit" name = "submit" value = "next" >
    <a style="font-size=15px; font-weight:100" href="welcome.php">home</a>



</form>






</body>
</html>