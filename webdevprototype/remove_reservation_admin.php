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
    







if(isset($_POST['remove_reservation'])){
    $id = $_POST['iddelete'];
    $instructor = '';


    //$sql = "INSERT INTO users(program, start_date, end_date) VALUES ('$program','$start_date','$end_date')";

    $sql = "UPDATE users SET instructor = '$instructor' where id = '$id'";


    if($conn->query($sql) == true){

        echo '<script>alert("RESERVATION CANCELLED")';
        echo '</script>';
        header("location:adminpage.php");


    }else{
        echo "error";

    }

}


if(isset($_POST['After_weight_height_INPUT'])){
    $id = $_POST['id'];
    $after_weightkg = $_POST['after_weightkg'];
    $after_heightkg = $_POST['after_heightkg'];    

    $sql = "UPDATE users SET after_weightkg = '$after_weightkg', after_heightkg = '$after_heightkg' where id = '$id'";
    if($conn->query($sql) == true){

        echo '<script>alert("RESERVATION CANCELLED")';
        echo '</script>';
        header("location:adminpage.php");


    }else{
        echo "error";

    }
}





?>


