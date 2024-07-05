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



?>

<html lang="en">
    <link rel="stylesheet" href="instructor.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <title>Instructor</title>
</head>
<body>
    
<form action="instructorlist_choose.php" method = "POST">
    <h1>Select Your Prefered Instructor</h1>
    <div>

    <h4>Jacob Marino</h4>
    <p>is a meticulous trainer who approaches fitness with a scientific mindset. With a degree in exercise physiology,
         he specializes in personalized training programs based on detailed assessments and data analysis. Ethan is known for his focus on
         technique and efficiency, helping clients achieve optimal results through carefully structured workouts tailored to their specific goals and abilities.</p>
    <input type="radio" name = "instructor" value = "Jacob">
    </div>
    <div>

    <h4>Riley Tyler</h4>
    <p>is a disciplined and results-driven trainer with a focus on strength and conditioning. His military background reflects in
         his no-nonsense approach to fitness, emphasizing discipline, proper technique, and achieving peak physical performance.
         Marcus's dedication and expertise attract serious athletes and fitness enthusiasts seeking rigorous training programs.</p>
    <input type="radio" name = "instructor" value = "Riley">
    </div>
    <div>

    <h4>Nathan Gonzales</h4>
    <p>specializes in holistic wellness and mindfulness practices at the gym. With a background in yoga and meditation, 
        he promotes a balanced approach to fitness that integrates physical exercise with mental and emotional well-being.
         Ella's serene presence and gentle guidance create a supportive environment for
         clients seeking stress relief, relaxation, and overall wellness enhancement.</p>
    <input type="radio" name = "instructor" value = "Nathan">
    </div>

<input type="submit" name = "submit" value = "Reserve" >

</form>


















</body>
</html>