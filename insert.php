<?php

include("connect.php");


if(isset($_POST['submit'])){
  $fullName=$_POST['fullName'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];

  $sql="INSERT INTO `testingdb`(`ID`, `fullName`, `email`, `pass`, `gender`, `age`) VALUES (NULL,'$fullName','$email','$password',' $gender','$age')";

  $result=mysqli_query($connection , $sql);

  if($result){
      echo '<script> alert("Data Saved");</script>';
      header("Location: experiment.php");
    }else{
      echo "failed: ". mysqli_error($connection);
    }
};
?>