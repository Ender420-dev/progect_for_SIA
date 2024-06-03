<?php

include("connect.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate']; // New field for birthdate
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $activity_level = $_POST['activity_level'];
    $target_weight = $_POST['target_weight'];

    // Calculate age from birthdate
    $today = new DateTime();
    $birthdateObj = new DateTime($birthdate);
    $age = $birthdateObj->diff($today)->y;

    // Calculate BMI
    // Formula: BMI = weight (kg) / (height (m) * height (m))
    $bmi = $weight / (($height / 100) * ($height / 100));

    // Define BMI categories
    $bmi_categories = array(
        "Underweight" => "Less than 18.5",
        "Normal weight" => "18.5–24.9",
        "Overweight" => "25–29.9",
        "Obesity class I" => "30–34.9",
        "Obesity class II" => "35–39.9",
        "Obesity class III" => "40 or greater"
    );

    // Determine BMI category based on BMI value
    $bmi_category = "";
    if ($bmi < 18.5) {
        $bmi_category = "Underweight";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        $bmi_category = "Normal weight";
    } elseif ($bmi >= 25 && $bmi < 30) {
        $bmi_category = "Overweight";
    } elseif ($bmi >= 30 && $bmi < 35) {
        $bmi_category = "Obesity class I";
    } elseif ($bmi >= 35 && $bmi < 40) {
        $bmi_category = "Obesity class II";
    } else {
        $bmi_category = "Obesity class III";
    }

    // Update the SQL query to include BMI, BMI category, and birthdate
    $sql = "INSERT INTO `user_table` (`email`, `userName`, `password`, `birthdate`, `age`, `gender`, `weight`, `height`, `activity_level`, `target_weight`, `bmi`, `bmi_categories`) 
            VALUES ('$email', '$userName', '$password', '$birthdate', $age, '$gender', $weight, $height, '$activity_level', $target_weight, $bmi, '$bmi_category')";

    $result = mysqli_query($connection, $sql);

    if($result){
        echo '<script> alert("Data Saved");</script>';
        header("Location: experiment.php");
    }else{
        echo "failed: ". mysqli_error($connection);
    }
}
?>
