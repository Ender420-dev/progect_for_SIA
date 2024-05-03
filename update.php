<?php

include("connect.php");


if(isset($_POST['update'])){
    $id=$_POST['id'];
  $fullName=$_POST['fullName'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];

  $sql="UPDATE testingdb SET fullName='$fullName', email='$email', pass ='$password', gender='$gender', age='$age' WHERE ID='$id' ";
  $result=mysqli_query($connection , $sql);

  if($result){
      echo '<script> alert("Data updated");</script>';
      header("Location: experiment.php");
    }else{
      echo "failed: ". mysqli_error($connection);
    }
};
?>