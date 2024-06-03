<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomNumber = $_POST['room_number'];
    $roomFacility = $_POST['room_facility'];
    $roomName = $_POST['room_name'];
    $patientName = $_POST['patient'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $roomStatus = $_POST['room_status'];
}
?>

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
    <title>Pador</title>
</head>

<body class="">

<section>
    <br><br><br>
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="container">

                        <button type="button" class="btn white-text btn-green" data-bs-toggle="modal" data-bs-target="#addForm" style="">Add</button>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Room Number</th>
                                    <th scope="col">Room Facility</th>
                                    <th scope="col">Room Name</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col" class="hide">Gender</th>
                                    <th scope="col" class="hide">Age</th>
                                    <th scope="col">Room Status</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
        <?php
            include("connect.php");
            $query = "SELECT * FROM wart_management";
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
                echo "
                    <tr>
                        <td>{$row['room_number']}</td>
                        <td>{$row['room_facility']}</td>
                        <td>{$row['room_name']}</td>
                        <td>{$row['patient']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['room_status']}</td>
                        <td>
                            <button data-bs-toggle='modal' data-bs-target='#viewmodal' type='button' class='viewForm white-text btn btn-green'>View</button>
                            <button data-bs-toggle='modal' data-bs-target='#editmodal' type='button' data-id='{$row["room_number"]}' class='btn editForm btn-primary'>Edit</button>
                            <button data-bs-toggle='modal' data-bs-target='#deletemodal' class='btn deletebtn btn-danger' data-room-number='{$row["room_number"]}'>Delete</button>
                        </td>
                    </tr>
                ";
            }
       ?>
    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- add modal form -->
<div class="modal fade" id="addForm" tabindex="1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add form</h3>
                <div class="container">
                    <form action="insert.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="form-group floating-label">
                                    <input type="number" name="room_number" id="room_number" required class="form-control">
                                    <label for="room_number">Room Number</label>
                                </div>
                                <div class="form-group floating-label">
                                    <select name="room_facility" class="form-control" required id="room_facility">
                                        <option value="" selected disabled></option>
                                        <option value="test1">test1</option>
                                        <option value="test2">test2</option>
                                        <option value="test3">test3</option>
                                        <option value="test4">test4</option>
                                        <option value="test5">test5</option>
                                    </select>
                                    <label for="room_facility">Room Facility</label>
                                </div>
                                <div class="form-group floating-label">
                                    <input type="text" name="room_name" id="room_name" required class="form-control">
                                    <label for="room_name">Room Name</label>
                                </div>
                                <div class="form-group floating-label">
                                    <input type="text" name="patient" id="patient"  class="form-control">
                                    <label for="patient">Patient Name</label>
                                </div>
                                <div class="form-group floating-label">
                                    <input type="number" name="age" id="age"  class="form-control">
                                    <label for="age">Age</label>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <input type="radio" name="gender" id="male"  class="form-input-label" value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" id="female"  class="form-input-label" value="female">
                                    <label for="female">Female</label>
                                </div>
                                <div class="form-group floating-label">
                                    <select name="room_status" id="room_status" required class="form-control">
                                        <option value="Available" selected>Available</option>
                                        <option value="Occupied">Occupied</option>
                                        <option value="Maintenance">Maintenance</option>
                                    </select>
                                    <label for="room_status">Room Status</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-green white-text">Add</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- edit modal form -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit form</h3>
            </div>
           
            <form action="update.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group floating-label">
                                <input type="number" name="edit_room_number" id="edit_room_number" class="form-control">
                                <label for="edit_room_number">Room Number</label>
                            </div>
                            <div class="form-group floating-label">
                                <select name="edit_room_facility" class="form-control" required id="edit_room_facility">
                                    <option value="" selected disabled>Select Facility</option>
                                    <option value="test1">test1</option>
                                    <option value="test2">test2</option>
                                    <option value="test3">test3</option>
                                    <option value="test4">test4</option>
                                    <option value="test5">test5</option>
                                </select>
                                <label for="edit_room_facility">Room Facility</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="text" name="edit_room_name" id="edit_room_name" class="form-control" required>
                                <label for="edit_room_name">Room Name</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="text" name="edit_patient" id="edit_patient" class="form-control" >
                                <label for="edit_patient">Patient Name</label>
                            </div>
                            <div class="form-group floating-label">
                                <input type="number" name="edit_age" id="edit_age" class="form-control" >
                                <label for="edit_age">Age</label>
                            </div>
                            <div class="form-group">
                                <label for="edit_gender">Gender:</label>
                                <input type="radio" name="edit_gender" id="edit_male" class="form-input-label" value="male" >
                                <label for="edit_male">Male</label>
                                <input type="radio" name="edit_gender" id="edit_female" class="form-input-label" value="female" >
                                <label for="edit_female">Female</label>
                            </div>
                            <div class="form-group floating-label">
                                <select name="edit_room_status" id="edit_room_status" class="form-control" required>
                                    <option value="Available" selected>Available</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                                <label for="edit_room_status">Room Status</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-green white-text">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete modal -->
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
                    <input type="hidden" name="delete_room_number" id="delete_room_number">
                    <button type="submit" name="delete" class="btn btn-danger white-text">Yes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- view modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>View form</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="view_room_number">Room Number:</label>
                    <span id="view_room_number"></span>
                </div>
                <div class="form-group">
                    <label for="view_room_facility">Room Facility:</label>
                    <span id="view_room_facility"></span>
                </div>
                <div class="form-group">
                    <label for="view_room_name">Room Name:</label>
                    <span id="view_room_name"></span>
                </div>
                <div class="form-group">
                    <label for="view_patient">Patient Name:</label>
                    <span id="view_patient"></span>
                </div>
                <div class="form-group">
                    <label for="view_gender">Gender:</label>
                    <span id="view_gender"></span>
                </div>
                <div class="form-group">
                    <label for="view_age">Age:</label>
                    <span id="view_age"></span>
                </div>
                <div class="form-group">
                    <label for="view_room_status">Room Status:</label>
                    <span id="view_room_status"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        // Add event listener for delete button
        $('.deletebtn').on('click', function() {
            // Get the room number from the delete button
            var roomNumber = $(this).data('room-number');
            // Set the value of the hidden input field in the delete modal
            $('#delete_room_number').val(roomNumber);
            // Show the delete modal
            $('#deletemodal').modal('show');
        });

        // Add event listener for view button
        $('.viewForm').on('click', function() {
            // Get the data from the row
            var data = $(this).closest('tr').find('td').map(function() {
                return $(this).text();
            }).get();
            // Set the values of the span elements in the view modal
            $('#view_room_number').text(data[0]);
            $('#view_room_facility').text(data[1]);
            $('#view_room_name').text(data[2]);
            $('#view_patient').text(data[3]);
            $('#view_gender').text(data[4]);
            $('#view_age').text(data[5]);
            $('#view_room_status').text(data[6]);
            // Show the view modal
            $('#viewmodal').modal('show');
        });

        // Add event listener for edit button
        $('.editForm').on('click', function() {
            // Get the data from the row
            var data = $(this).closest('tr').find('td').map(function() {
                return $(this).text();
            }).get();
            // Set the values of the input fields in the edit modal
            $('#edit_room_number').val(data[0]);
            $('#edit_room_facility').val(data[1]);
            $('#edit_room_name').val(data[2]);
            $('#edit_patient').val(data[3]);
            $('#edit_age').val(data[5]);
            // Set the value of the gender radio buttons in the edit modal
            var gender = data[4].toLowerCase();
            if (gender === 'male') {
                $('#edit_male').prop('checked', true);
            } else if (gender === 'female') {
                $('#edit_female').prop('checked', true);
            }
            // Set the value of the room status select in the edit modal
            $('#edit_room_status').val(data[6]);
            // Show the edit modal
            $('#editmodal').modal('show');
        });
    });
</script>