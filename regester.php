<?php
    @include('connect.php');
    session_start();
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $select = "SELECT * FROM `user_form` WHERE `email`='$email' && `password`='$pass' ";
        $result = mysqli_query($connect, $select);
        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!!';
        }else{
            if($pass != $cpass){
            $error[] = 'password not matched!';
            }else{
                $insert = "INSERT INTO `user_form`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
                mysqli_query($connect, $insert);
                header('location:index.php');
            }
        }
    };
    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regester</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Regester Now</h3>
            <?php 
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="text" name="name" placeholder="enter your name" required>
            <input type="email" name="email" placeholder="enter your email" required>
            <input type="password" name="password" placeholder="enter your password" required>
            <input type="password" name="cpassword" placeholder="confirm your password" required>
            <input type="submit" value="Regester Now" name="submit" class="form-btn">
            <p>alredy have an account? <a href="index.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>