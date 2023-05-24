<?php
    @include('connect.php');
    session_start();
    if(!isset($_SESSION['user_name'])){
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>hi <span><?php echo $_SESSION['user_name']; ?></span></h3>
            <h1>welcome back <span></span></h1>
            <p>this is your page mr : <?php echo $_SESSION['user_name']; ?></p>
            <a href="index.php" class="btn">logout</a>
            <a href="regester.php" class="btn">Regester</a>
        </div>
    </div>
</body>
</html>