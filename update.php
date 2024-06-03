<?php

include("connect.php");

if(isset($_POST['update'])){
    $id = $_POST['update_id'];
    $email = $_POST['edit_email'];
    $userName = $_POST['edit_userName'];
    $password = $_POST['edit_password'];
    $birthdate = $_POST['edit_birthdate']; // New field for birthdate
    $gender = $_POST['edit_gender'];
    $weight = $_POST['edit_weight'];
    $height = $_POST['edit_height'];
    $activity_level = $_POST['edit_activity_level'];
    $target_weight = $_POST['edit_target_weight'];

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
    $sql = "UPDATE user_table SET 
            email='$email', 
            userName='$userName', 
            password='$password', 
            birthdate='$birthdate', 
            age='$age', 
            gender='$gender', 
            weight='$weight', 
            height='$height', 
            activity_level='$activity_level', 
            target_weight='$target_weight', 
            bmi='$bmi', 
            bmi_categories='$bmi_category' 
            WHERE user_id='$id'";

    $result = mysqli_query($connection, $sql);

    if($result){
        echo '<script> alert("Data updated");</script>';
        header("Location: experiment.php");
    }else{
        echo "Failed: ". mysqli_error($connection);
    }
}
?>
