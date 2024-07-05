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
    







if(isset($_POST['approve_reservation'])){
    $id = $_POST['idongoing'];


    //$sql = "INSERT INTO users(program, start_date, end_date) VALUES ('$program','$start_date','$end_date')";

    $sql = "UPDATE users SET instructor = '$instructor',status = 'ongoing' where id = '$id'";


    if($conn->query($sql) == true){

        echo '<script>alert("Complete")';
        echo '</script>';
        header("location:adminpage.php");


    }else{
        echo "error";

    }

}



if(isset($_POST['remove_reservation'])){
    $idreject = $_POST['idreject'];

    $instructor = '';


    //$sql = "INSERT INTO users(program, start_date, end_date) VALUES ('$program','$start_date','$end_date')";

    $sql = "UPDATE users SET instructor = '$instructor',status = 'rejected' where id = '$idreject'";


    if($conn->query($sql) == true){

        echo '<script>alert("rejected")';
        echo '</script>';
        header("location:adminpage.php");


    }else{
        echo "error";

    }

}


if(isset($_POST['complete_workout'])){
    $idfinished = $_POST['idfinished'];

    $instructor = '';


    //$sql = "INSERT INTO users(program, start_date, end_date) VALUES ('$program','$start_date','$end_date')";

    $sql = "UPDATE users SET instructor = '$instructor',status = 'complete' where id = '$idfinished'";


    if($conn->query($sql) == true){

        echo '<script>alert("complete")';
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

    $sql = "UPDATE users SET after_weightkg = '$after_weightkg', after_heightkg = '$after_heightkg', status = 'Declined' where id = '$id'";
    if($conn->query($sql) == true){

        echo '<script>alert("RESERVATION CANCELLED")';
        echo '</script>';
        header("location:adminpage.php");


    }else{
        echo "error";

    }
}





?>


