<?php 
// this is a pure php file so no closing tag. 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $favpet = htmlspecialchars($_POST["pet"]);

    if(empty($firstname)) {
        exit();
    }

    echo "This is the data that was submitted.....";
    echo "<br>";
    echo $firstname;
    echo "<br>";
    echo $lastname;
    echo "<br>";
    echo $favpet;

    header("Location: ../index.php");
}