
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
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>




    </head>
    <header>
        <nav>

                <a class="third" href="about.html" class="btn">About us</a>
                <a class="fourth" href="mission.html" class="btn">Our Mission</a>
                <a class="fifth" href="state.html" class="btn">State of the art Facilities</a>
                <a  class= "sixth"href="trainers.html" class="btn">Expert Trainers</a>
                <a class="seventh" href="diverse.html" class="btn">Diverse Classes</a>
                <a  class= "eight"href="community.html" class="btn">Community focus</a>
                <a class= "ninth"href="reservation_page.php" class="btn">Book your Workout</a>
        </nav>

    </header>


    <body>
        <br><br><br><br>
    <h1> Welcome <?php echo $_SESSION['username']; ?></h1>

    <div class="mamamo">
    <a type= "button" href="reservation_page.php">Get started!</a>

    click here to <a href="logout.php">log out</a>

    </div>
    

    <h2>Your reservations here:</h2>

    <p>NOTE: instructors will contact you from your registered mobile number.</p>
    <br><br>

    <?php

    $unamestring = $_SESSION['username'];

        $res=mysqli_query($link, "select * from users where username = '$unamestring'");
        echo "<table border=1>";

        echo "<tr>";
            echo "<th>"; echo "STATUS"; echo "</th>";   
            echo "<th>"; echo "PROGRAM"; echo "</th>";   
            echo "<th>"; echo "START DATE"; echo "</th>";
            echo "<th>"; echo "END DATE"; echo "</th>";
            echo "<th>"; echo "INSTRUCTOR"; echo "</th>";
            echo "<th>"; echo "WEIGHT"; echo "</th>";   
            echo "<th>"; echo "HEIGHT"; echo "</th>";   
            echo "<th>"; echo "AFTER WEIGHT"; echo "</th>";
            echo "<th>"; echo "AFTER HEIGHT"; echo "</th>";
            echo "</tr>";

            while($row=mysqli_fetch_array ($res))
            {
            echo "<tr>";
            echo "<td>"; echo $row["status"]; echo "</td>";
            echo "<td>"; echo $row["program"]; echo "</td>";
            echo "<td>"; echo $row["start_date"]; echo "</td>";
            echo "<td>"; echo $row["end_date"]; echo "</td>";
            echo "<td>"; echo $row["instructor"]; echo "</td>";
            echo "<td>"; echo $row["before_weightkg"]; echo "</td>";
            echo "<td>"; echo $row["before_heightkg"]; echo "</td>";
            echo "<td>"; echo $row["after_weightkg"]; echo "</td>";
            echo "<td>"; echo $row["after_heightkg"]; echo "</td>";

            echo "</tr>";
            }
            echo "</table>";





    ?>

    <?php



    if(isset($_POST['remove_reservation'])){
        $program =  '';
        $start_date = date('');
        $end_date = date('');
        $instructor = 
        $before_weightkg = '';
        $before_heightkg = '';

        //$sql = "INSERT INTO users(program, start_date, end_date) VALUES ('$program','$start_date','$end_date')";

        $sql = "UPDATE users SET program = '$program' ,start_date = '$start_date', end_date = '$end_date', instructor = '$instructor',before_weightkg = '$before_weightkg', before_heightkg = '$before_heightkg', status = '', after_weightkg = '', after_heightkg = '' where username = '$unamestring'";


        if($conn->query($sql) == true){
            echo "Reserved!";
            echo '<script>alert("RESERVATION CANCELLED")';
            echo '</script>';
            header("location:welcome.php");

        }else{
            echo "error";

        }

    }


    ?>
    <form method = "POST">
    <input type="submit" name = "remove_reservation" value = "Cancel">
    </form>

<?php







