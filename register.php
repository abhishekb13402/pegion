<?php
    require_once('connection.php');

    if(isset($_POST['register'])){
        $fullName = mysqli_real_escape_string($connection, $_POST['full-name']);
        $userName = mysqli_real_escape_string($connection, $_POST['user-name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $dob = mysqli_real_escape_string($connection, $_POST['dob']);
        $pswd = md5(mysqli_real_escape_string($connection, $_POST['pswd']));

        $query = "INSERT INTO user(user_name, full_name, dob, email, password, phone_number, user_img, bio, city, country)
            VALUES('$userName', '$fullName', '$dob', '$email', '$pswd', 1234567890, 'assets/icon/user.png', 'My Special Bio', 'Vadodara', 'India')";
        
        $result = mysqli_query($connection, $query) or die("Insert Error");
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
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

                <h2 class="title">Create your account</h2>
            
                <input type="text" name="full-name" class="input" placeholder="Full Name" />
                <input type="text" name="user-name" class="input" placeholder="User name" />
                <input type="text" name="email" class="input" placeholder="Email"/>
                <input type="date" name="dob" class="input" placeholder="Birth Date"/>
                <input type="password" name="pswd" class="input" placeholde="Password"/>    

                <input type="submit" name="register" class="sign_btn sign_up" value="Sign up"/>
            </form>
        </div>
    </div>
</body>

</html>