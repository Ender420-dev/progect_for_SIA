<?php

 

include("connect.php");


if(isset($_POST['delete'])){
    $id=$_POST['delete_id'];
 

  $sql="DELETE FROM user_table WHERE user_id='$id'";
  $result=mysqli_query($connection , $sql);

  if($result){
      echo '<script> alert("Data Deleted");</script>';
      header("Location: experiment.php");
    }else{
      echo "failed: ". mysqli_error($connection);
    }
};









?>