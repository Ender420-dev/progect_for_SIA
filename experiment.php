<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--Import Google Icon Font-->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  />
    <link type="text/css" rel="stylesheet" href="css/main.css" /> -->
    


    <script src="https://kit.fontawesome.com/6b32a7d243.js" crossorigin="anonymous"></script>
    <!-- update existing v5 CSS to use v6 icons and assets -->
    
    <link href="css/bootstrap/css/bootstrap.css" rel="stylesheet" />

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="Icon" href="img/logo school project.jpg">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet"  href="css/main.css" type="text/css">
        <script defer src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <link href="css/css/all.css" rel="stylesheet" />
    <title>Nutri Plan</title>
</head>





<body class="  green ">
<nav style="background-color: white;" class="navbar navbar-expand-md   ">
    <div class="container-fluid">
        
        <a href="#!" class="navbar-brand">
            <img src="img/logo school project.jpg" width="24" height="30" alt="" class="d-inline-block align-text-top">
            Nutri Plan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse justify-content-end navbar-collapse" id="navbarNav">

               

                </ul>

            </div>
        
        
        
    </div>
</nav>

<section>
    <br><br><br>
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-body">
                <div class="container">

                <button type="button" class="btn white-text btn-green" data-bs-toggle="modal" data-bs-target="#addForm" style="">Add</button>


                <?php
                
                include("connect.php");

                $query="SELECT * FROM user_table";
                $query_run=mysqli_query($connection, $query);

?>
           

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">EMAIL</th>
                            
                            <th scope="col">USER NAME</th>
                            <th scope="col" style="display:none;">PASSWORD</th>
                            <th scope="col" style="display:none;">AGE</th>
                            <th scope="col" style="display:none;">Birth Date</th>
                            <th scope="col" style="display:none;">GENDER</th>
                            <th scope="col" style="display:none;">WEIGHT</th>
                            <th scope="col" style="display:none;">HEIGHT</th>
                            <th scope="col" style="display:none;">ACTIVITY LEVEL</th>
                            <th scope="col" style="display:none;">TARGET WEIGHT</th>
                            <th scope="col" style="display:none;">BMI</th>
                            <th scope="col" style="display:none;">BMI CATEGORIES</th>


                            
                           
                            <th scope="col">ACTION</th>
                            
                        </tr>
                    </thead>

                    
                <?php
                
                
                if($query_run){
                    foreach($query_run as $row){
                        ?>
                        <tbody>
                        <tr>
                            <td> <?php echo $row['user_id'];          ?></td>
                            <td> <?php echo $row['email'];    ?></td>
                            <td > <?php echo $row['userName'];    ?></td>

                            <td style="display:none;"> <?php echo $row['password'];       ?></td>
                            <td style="display:none;"> <?php echo $row['age'];    ?></td>
                            <td style="display:none;"> <?php echo $row['birthdate'];      ?></td>
                            <td style="display:none;"> <?php echo $row['gender'];      ?></td>
                            <td style="display:none;"> <?php echo $row['weight'];         ?></td>
                            <td style="display:none;"> <?php echo $row['height'];         ?></td>
                            <td style="display:none;"> <?php echo $row['activity_level'];         ?></td>
                            <td style="display:none;"> <?php echo $row['target_weight'];         ?></td>
                            <td style="display:none;"> <?php echo $row['bmi'];         ?></td>
                            <td style="display:none;"> <?php echo $row['bmi_categories'];         ?></td>
                            <td> 
                            <button type="button" class="viewForm white-text btn btn-green">View</button>  
                            <button type="button" class="btn editForm  btn-primary" data-id="<?= $row['user_id']?>" >Edit</button> 
                            <button class="btn deletebtn btn-danger">Delete</button>
                        
                        </td>
                        </tr>
                    </tbody>

                       
                        <?php
                    }
                } 
                
                else{
                    echo"No record found";
                }
                ?>
                
                
            




                    
                </table>

                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-title"></div>
                
                <div class="modal-header"><h3>View Form</h3></div>
                   <div class="modal-body">
                    
                   
                   <div class="form-group">
                    <label for="">ID: </label>
                    <span id="viewID"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Email: </label>
                    <span id="viewEmail"></span>
                    </div>
                    <div class="form-group">
                    <label for="">User Name: </label>
                    <span id="viewUsername"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Password: </label>
                    <span id="viewpassword"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Age: </label>
                    <span id="viewage"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Birth Date: </label>
                    <span id="viewbirthdate"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Gender: </label>
                    <span id="viewgender"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Weight: </label>
                    <span id="viewweight"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Height: </label>
                    <span id="viewheight"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Activity Level: </label>
                    <span id="viewactivity_level"></span>
                    </div>
                    <div class="form-group">
                    <label for="">Target Weight: </label>
                    <span id="viewtarget"></span>
                    </div>
                    <div class="form-group">
                    <label for="">BMI: </label>
                    <span id="viewbmi"></span>
                    </div>
                    <div class="form-group">
                    <label for="">BMI Categories: </label>
                    <span id="viewbmi_categories"></span>
                    </div>


                    

                   </div>
                   
   </div>
    
   <div class="modal-footer">
  
   <button type="button" class="btn btn-green white-text" data-dismiss="modal">Exit</button>




    </div>
                  
            </div>
        </div>
    </div>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Delete form</h3>
            </div>
            <form action="delete.php" method="POST">
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <input type="text" name="delete_id" id="delete_id">
                    <button type="submit" name="delete" class="btn btn-danger white-text">Yes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- add modal form -->
    <div class="modal fade" id="addForm" tabindex="1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> <h3>Add form</h3></div>
                <div class="container">
                   <form action="insert.php" method="POST">
                   <div class="row"><div class="col ">

                   <div class="form-group floating-label"> 
                
                   <input type="email" name="email" id="email" class="form-control"><label for="email">Email</label></input></div>

                    <div class="form-group floating-label">
                    <input class="form-control" type="text" name="userName" id="userName">
                    <label for="">User Name</label>  </input></div>

            <div class="form-group floating-label">
            <input class="form-control" type="password" name="password" id="password">
            <label for="">Password</label>

            
           <div class="form-group">

             <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="male" required class="form-input-label" value="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" required class="form-input-label" value="female">
            <label for="female">Female</label>
            </div>
   

        <div class="form-group floating-label"><input type="number" name="weight" id="weight" class="form-control"> <label for="weight">Weight</label></div>
        <div class="form-group floating-label"><input type="number" name="height" id="height" class="form-control"> <label for="height">Height</label></div>
        <div class="form-group floating-label">
                                <select name="activity_level" id="activity_level" required class="form-control">
                                    <option value="" selected disabled>Select Select Activity Level</option>
                                    <option value="Bed rest (Bed ridden - Unconscious)">Bed rest (Bed ridden - Unconscious)</option>
                                    <option value="Sedentary (Little to no exercise )">Sedentary (Little to no exercise )</option>
                                    <option value="Light exercise (1-3 days per week)">Light exercise (1-3 days per week)</option>
                                    <option value="Moderate exercise (3-5 days per week)">Moderate exercise (3-5 days per week)</option>
                                    <option value="Heavy exercise (6-7 days per week)">Heavy exercise (6-7 days per week)</option>
                                    <option value="Very heavy exercise (twice per day, extra heavy workouts)">Very heavy exercise (twice per day, extra heavy workouts)</option>
                                
                                
                                
                                </select>

                                <label for="activity_level">Activity Level</label>
                            </div>
                            <div class="form-group floating-label"><input type="number" name="target_weight" id="target_weight" class="form-control"> <label for="target_weight">Target Weight</label></div>
                            <div class="form-group floating-label"><input type="date" name="birthdate" id="birthdate" class="form-control"> <label for="target_weight">Birth Date</label></div>

   <div class="modal-footer">
   <button type="submit" name="submit" class="btn btn-green white-text ">Add</button>
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
   </div>
    </div>
                   </div>
                   </form></div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- edit modal form edit -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Form</h3>
            </div>
            <form action="update.php" method="post">
                <input type="hidden" name="update_id" id="update_id">
                <div class="row">
                    <div class="col">
                  
                        <div class="form-group floating-label"> 
                            <input type="email" name="edit_email" id="edit_email" class="form-control">
                            <label for="edit_email">Email</label>
                        </div>

                        <div class="form-group floating-label">
                            <input class="form-control" type="text" name="edit_userName" id="edit_userName">
                            <label for="edit_userName">User Name</label>
                        </div>

                        <div class="form-group floating-label">
                            <input class="form-control" type="password" name="edit_password" id="edit_password">
                            <label for="edit_password">Password</label>
                        </div>

                        <div class="form-group floating-label">
                                <input type="date" name="edit_birthdate" id="edit_birthdate" class="form-control" >
                                <label for="edit_birthdate">birthdate</label>
                            </div>

                       
                        <div class="form-group">
                                <label for="edit_gender">Gender:</label>
                                <input type="radio" name="edit_gender" id="edit_male"  class="form-input-label" value="male" >
                                <label for="">Male</label>
                                <input type="radio" name="edit_gender" id="edit_female" class="form-input-label" value="female" >
                                <label for="">Female</label>
                            </div>

                        <div class="form-group floating-label">
                            <input type="number" name="edit_weight" id="edit_weight" class="form-control">
                            <label for="edit_weight">Weight</label>
                        </div>

                        <div class="form-group floating-label">
                            <input type="text" name="edit_height" id="edit_height" class="form-control">
                            <label for="edit_height">Height</label>
                        </div>

                        <div class="form-group floating-label">
                            <select name="edit_activity_level" id="edit_activity_level" required class="form-control">
                                <option value="" selected disabled>Select Activity Level</option>
                                <option value="Bed rest (Bed ridden - Unconscious)">Bed rest (Bed ridden - Unconscious)</option>
                                <option value="Sedentary (Little to no exercise)">Sedentary (Little to no exercise)</option>
                                <option value="Light exercise (1-3 days per week)">Light exercise (1-3 days per week)</option>
                                <option value="Moderate exercise (3-5 days per week)">Moderate exercise (3-5 days per week)</option>
                                <option value="Heavy exercise (6-7 days per week)">Heavy exercise (6-7 days per week)</option>
                                <option value="Very heavy exercise (twice per day, extra heavy workouts)">Very heavy exercise (twice per day, extra heavy workouts)</option>
                            </select>
                            <label for="edit_activity_level">Activity Level</label>
                        </div>

                        <div class="form-group floating-label">
                            <input type="number" name="edit_target_weight" id="edit_target_weight" class="form-control">
                            <label for="edit_target_weight">Target Weight</label>
                        </div>

                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-green white-text">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </form>
        </div>
    </div>
</div>


    <!-- delete modal -->

   






<!-- view modal -->








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/bootstrap/js/bootstrap.bundle.js"></script>
   
    


    <script>


$(document).ready(function() {



    $('.editForm').on('click', function() {
    var data = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
    
    // Set values using IDs
    $('#update_id').val(data[0]);
    $('#edit_email').val(data[1]);
    $('#edit_userName').val(data[2]);
    $('#edit_password').val(data[3]);
    $('#edit_age').val(data[4]);
    $('#edit_birthdate').val(data[5]);
    
    // Set gender radio button
    var gender = data[6].toLowerCase();
    if (gender === 'male') {
        $('#edit_male').prop('checked', true);
    } else if (gender === 'female') {
        $('#edit_female').prop('checked', true);
    }
    
    $('#edit_weight').val(data[7]);
    $('#edit_height').val(data[8]);
    $('#edit_activity_level').val(data[9]);
    $('#edit_target_weight').val(data[10]);
    
    $('#editmodal').modal('show');
});
            // Delete button click event
            $('.deletebtn').on('click', function() {
                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.find("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
            });

            // View button click event
            $('.viewForm').on('click', function() {
                $('#viewmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.find("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#viewID').text(data[0]);
                $('#viewEmail').text(data[1]);
                $('#viewUsername').text(data[2]);
                $('#viewpassword').text(data[3]);
                $('#viewage').text(data[4]);
                $('#viewbirthdate').text(data[5]);
                $('#viewgender').text(data[6]);
                $('#viewweight').text(data[7]);
                $('#viewheight').text(data[8]);
                $('#viewactivity_level').text(data[9]);
                $('#viewtarget').text(data[10]);
                $('#viewbmi').text(data[11]);
                $('#viewbmi_categories').text(data[12]);
            });

            


        });
    </script>
  
</body>

</html>