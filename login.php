<?php
    require_once('connection.php');

    if(isset($_POST['log-in'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $pswd = md5(mysqli_real_escape_string($connection, $_POST['pswd']));
        
        // echo $email . "<br>". $pswd;

        $query = "SELECT u_id, user_name, full_name FROM user WHERE email = '$email' AND password = '$pswd'";
        
        $result = mysqli_query($connection, $query) or die("Fetch Error");

        if(mysqli_num_rows($result) == 1){
            header('Location:home.php');
        }else{
            echo "<script>alert('Invalid Email or Password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/common.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body>
    <div class="wrapper">
        <div class="login_box">
            <div class="close icon">&#10006;</div>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="login_form">
                <div class="logo">
                    <img src="assets/logo.png" alt="">
                </div>

                <h2 class="title">Sign in to Pegion</h2>
                
                <div>
                    <a href="#" class="sign_btn">
                        <img src="assets/google-logo.png" alt="">
                        <span>Sign in with Google</span>
                    </a>
                </div>

                <div>
                    <a href="#" class="sign_btn">
                        <img src="assets/apple-logo.png" alt="">
                        <span>Sign in with Apple</span>
                    </a>
                </div>

                <div class="line"></div>

                <input type="text" name="email" class="input" placeholder="email" />
                <input type="password" name="pswd" class="input" placeholder="Password"/>

                <input type="submit" name="log-in" class="sign_btn sign_up" value="Sign in"/>

                <a href="" class="sign_btn sign_in">Forgot password ?</a>

                <div>Don't have an account? <a href="register.php">Sign up</a></div>
            </form>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>