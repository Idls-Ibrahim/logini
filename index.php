<?php
    @include('connect.php');
    session_start();
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $pass = md5($_POST['password']);
        $select = "SELECT * FROM `user_form` WHERE `email`='$email' && `password`='$pass' ";
        $result = mysqli_query($connect, $select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
                $_SESSION['user_name'] = $row['name'];
                header("location:page.php");
        }
        else{
            $error[] = 'incorrect email or password';
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
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Login Now</h3>
            <?php 
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="email" name="email" placeholder="enter your email" required>
            <input type="password" name="password" placeholder="enter your password" required>
            <input type="submit" value="login" name="submit" class="form-btn">
            <p>dont' have an account? <a href="regester.php">Regester Now</a></p>
        </form>
    </div>  
</body>
</html>
