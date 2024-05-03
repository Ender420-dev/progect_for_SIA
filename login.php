<?php
  require'connect.php';

  session_start();


$email=$password="";
$emailErr=$passwordErr="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
     
    
    
        if(empty($_POST["email"])){
        $emailErr="Email is required!";
    }else{
        $email = $_POST["email"];
    }

    if(empty($_POST["password"])){
        $passwordErr="Password is required!";
    } else{
        $password = $_POST["password"];
    }

   
    if ($email && $password){
        include("connect.php");
       

    
        
        $check_email=mysqli_query($connection, "SELECT * FROM login_tbl WHERE email='$email'");
        
        $check_email_row=mysqli_num_rows($check_email);
        
        if($check_email_row > 0){
            
            while($row = mysqli_fetch_assoc($check_email)){
                
                $db_password=$row["password"];
                
                $db_account_type=$row["account_type"];
                
                if($db_account_type=="1"){
                    
                    // echo "<script> window.location.href='admin.php'</script>;";
                    header("Location: admin.php");
                    exit();
    
                }else{
                    header("Location: user.php");
                    // echo  "<script> window.location.href='user.php'</script>;";
                    exit();
                }if($password==$db_password){

            } else{
                $passwordErr="Password is incorrect";
            }
            } 
            
        }else{
            $emailErr="email is not registered";
        }
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="style.css">


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
</head>





<body class="grey   ">
<br><br><br><br><br>
<div class="row">
    <div class="col l6 offset-l3">
        <div class="card white darken-2" >
            <div class="container">
                <br><br><br>
                <div class="">
                    <a href="login3.php"  class="btn left blue">Login</a>
                    <a href="registration.php"  class="btn right blue">Register</a>
                    <br><br><br>
                    <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
                        <!-- Login form fields -->
                        <h3 class="black-text center">Login</h3>


                        <input type="email" name="email"  placeholder="Email">
                        <label for="email">Email</label>
                        <br>
                        <span class="red-text"><?php echo $emailErr ?></span>
                        <input type="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                        <br>
                        <span class="red-text"><?php echo $passwordErr ?></span>

                    <br><br>
                        <button class="btn blue">Login</button>
                        <a href="otp.php"  class="blue-text">Forgot Password?</a>
                    </form>
                    
                </div>
                <br><br><br><br>
            </div>
        </div>
    </div>
</div>












    
    


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="js/materialize.min.js "></script>
    


    <script>
        document.getElementById('showLogin').addEventListener('click', function() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('FPform').style.display = 'none';

});

document.getElementById('showRegister').addEventListener('click', function() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
    document.getElementById('FPform').style.display = 'none';
});

document.getElementById('showFP').addEventListener('click', function() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('FPform').style.display = 'block';
    
});
       

const  showpasschecker= document.getElementById('showPass');

const passfield=document.getElementById('passwordSign');
const passConfirmfield=document.getElementById('passwordConfirm');

showpasschecker.addEventListener('change', function(){

    if(showpasschecker.checked){
        passfield.type='text';
        confirm_password.type='text';

    }else{
        passfield.type='password';
        confirm_password.type='password';
    }
});

        $(window).scroll(function() {
            
        })


        function checkForm(){
            const form=document.getElementById('Signup');
            const inputs=form.querySelectorAll("input[required]");
            let allFilled=true;

            inputs.forEach(function(input){


                if(input.value===""){
                    allFilled=false;
                }
            });
            return allFilled;
        }

        function passMatchChecker(){
            const pass=document.getElementById('passwordSign').value;
            const passConfirm=document.getElementById('passwordConfirm').value;
            const passMatchConfirm=document.getElementById('passMatch');
            const btnSignUp=document.getElementById('registerbtn');

            if(pass===passConfirm && pass.length>0&&checkForm()){
                passMatchConfirm.innerHTML=" Password Match";
                passMatchConfirm.style.color="green"
                btnSignUp.disabled=false;
            } else{
                passMatchConfirm.innerHTML=" Password do not Match";
                passMatchConfirm.style.color="red"
                btnSignUp.disabled=true;
            }
        }




        $('.fadein').hide();
        setTimeout(() => {

            $(document).ready(function() {
                $('.fadein').fadeIn();
                $('.fadeout').fadeOut();
                $('.parallax').parallax({
                    fullWidth: true
                });
                // Init Sidenav
                $('.count').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
                $('select').material_select();


                $('.button-collapse').sideNav();
                $('.dropdown-button').dropdown({
                    constrainWidth: false,
                    hover: true,
                    belowOrigin: true,
                    alignment: 'left'
                });
                $('.scrollspy').scrollSpy();
            });
            $('.slider').slider({
                indicators: true,
                height: 400,
                transition: 2000,
                interval: 3000
            });
            $('.modal').modal({
                dismissible: true,
                inDuration: 300,
                outDuration: 200,
                ready: function(modal, trigger) {
                    console.log('Modal Open', modal, trigger);
                }
            });

        });
    </script>
</body>

</html>