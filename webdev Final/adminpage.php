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
    if(!isset($_SESSION['username'])){ //if login in session is not set
        header("Location:login.php");
    }



    
    

?>
<html lang="en">
        <link rel="stylesheet" href="welcome.css">
        <link rel="shortcut icon" type="x-icon" href="logo.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
<div class="container">

    <h1>  Welcome <?php echo $_SESSION['username']; ?></h1>

    <a style = " text-decoration: none;" href="logout.php">log out</a>

    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">

    <div>
    <h3>Booked trainees</h3>



    <?php

    $unamestring = $_SESSION['username'];

    $res=mysqli_query($link, "select * from users where instructor = '$unamestring'");
    echo "<table border=1>";

    echo "<tr>";
    echo "<th>"; echo "ID"; echo "</th>";
    echo "<th>"; echo "STATUS"; echo "</th>";         
        echo "<th>"; echo "FIRST NAME"; echo "</th>";   
        echo "<th>"; echo "LAST NAME"; echo "</th>";
        echo "<th>"; echo "CONTACT NUMBER"; echo "</th>";   
            echo "<th>"; echo "PROGRAM"; echo "</th>";   
            echo "<th>"; echo "START DATE"; echo "</th>";
            echo "<th>"; echo "END DATE"; echo "</th>";

            echo "<th>"; echo "WEIGHT"; echo "</th>";
            echo "<th>"; echo "HEIGHT"; echo "</th>";
            echo "<th>"; echo "AFTER WEIGHT"; echo "</th>";
            echo "<th>"; echo "AFTER HEIGHT"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_array ($res))
            {
        echo "<tr>";
        echo "<td>"; echo $row["status"]; echo "</td>";
        echo "<td>"; echo $row["id"]; echo "</td>";
        echo "<td>"; echo $row["name"]; echo "</td>";
        echo "<td>"; echo $row["lname"]; echo "</td>";
        echo "<td>"; echo $row["contactnumber"]; echo "</td>";
        echo "<td>"; echo $row["program"]; echo "</td>";
            echo "<td>"; echo $row["start_date"]; echo "</td>";
            echo "<td>"; echo $row["end_date"]; echo "</td>";

            echo "<td>"; echo $row["before_weightkg"]; echo "</td>";
            echo "<td>"; echo $row["before_heightkg"]; echo "</td>";
            echo "<td>"; echo $row["after_weightkg"]; echo "</td>";
            echo "<td>"; echo $row["after_heightkg"]; echo "</td>";

            echo "</tr>";
            }
            echo "</table>";
    ?>


    <br>
    <form action = "remove_reservation_admin.php" method = "POST">
    Input id for approval:<input type="number" name = "idongoing" value = "">

    <input  type="submit" name = "approve_reservation" value = "Approve" >
    </form>

    <form action = "remove_reservation_admin.php" method = "POST">
    Input id for Rejection:<input type="number" name = "idreject" value = "">

    <input  type="submit" name = "remove_reservation" value = "Reject" >
    </form>
    
    <form action = "remove_reservation_admin.php" method = "POST">
    Input id for completion:<input type="number" name = "idfinished" value = "">

    <input  type="submit" name = "complete_workout" value = "Complete" >
    </form>


    <form action="remove_reservation_admin.php" method = "POST">
    <h4>Input after values</h4>

    id: <input type="number" name = 'id' value = "">
    weight KG: <input type="number" name = 'after_weightkg' value = "">
    height CM: <input type="number" name = 'after_heightkg' value = "">
    <input type="submit" name = 'After_weight_height_INPUT' value = 'upload'>
    </form>




    </div>

</div>
