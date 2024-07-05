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

}
    


$unamestring = $_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $instructor = $_POST['instructor'];
    $sql = "UPDATE users SET instructor = '$instructor' where username = '$unamestring'";


if($conn->query($sql) == true){
        echo "Reserved!";
        echo '<script>alert("RESERVATION MADE SUCCESSFULLY")';
        echo '</script>';
        header("location:welcome.php");
        echo $unamestring; 
    }else{
        echo "error";
    }
}


    
    
?>