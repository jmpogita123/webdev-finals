<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym_reservation";
$conn = new mysqli($servername, $username, $password, $database);
$link = mysqli_connect($servername, $username, $password, $database);





if($conn->connect_error){
    
    die("Connection failed: ". $conn->connect_error);




}else{
    echo "";
    }
    


    $unamestring = $_SESSION['username'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $program =  $_POST['program'];
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $end_date = date('Y-m-d', strtotime($_POST['end_date']));
    $before_weightkg = $_POST['before_weightkg'];
    $before_heightkg = $_POST['before_heightkg'];
    //$sql = "INSERT INTO users(program, start_date, end_date) VALUES ('$program','$start_date','$end_date')";

    $sql = "UPDATE users SET program = '$program' ,start_date = '$start_date', end_date = '$end_date',before_weightkg = '$before_weightkg',before_heightkg = '$before_heightkg', status = 'pending' where username = '$unamestring'";


    if($conn->query($sql) == true){
        echo "Reserved!";
        echo '<script>alert("RESERVATION MADE SUCCESSFULLY")';
        echo '</script>';
        header("location:instructorlist.php");

    }else{
        echo "error";
        echo "$start_date, $end_date";
    }






}











?>