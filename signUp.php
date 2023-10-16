<?php
    include 'config.php';
    session_start();
    $message = array();
    if(isset($_POST['register'])){

        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $cPassword=mysqli_real_escape_string($conn,$_POST['confirm-password']);

        $select_user=mysqli_query($conn,"SELECT * FROM `friends` WHERE friend_email='$email'") or die('query failed');
        if(mysqli_num_rows($select_user)>0){
             $message[]='email already exists!';
        }
        if(empty($name)){
            $message[]='Profile name is required';
        }
        if (isset($password) && isset($cPassword)) {
                if($password!=$cPassword)
                  $message[]='Password confirmation is incorrect';
        }
        if(empty($message)){
                mysqli_query($conn,"insert into `friends`(friend_email,profile_name,password) values('$email','$name','$password')") or die('query failed');
                header('location:index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
       if(isset($message)){
          foreach($message as $msg){
            echo'
                <div class="message">
                   <span>'.$msg.'</span>  
                   <i class="fas fa-times" onclick="this.parentElement.remove()"></i>           
                </div>';
          }
    }
    ?>

    <div class="signUp">
        <div class="header"><b>My Friend System</b></div>
       <div class="content">
        <h3><b>Registration Page</b></h3>
        <form action="" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="box">
            </div> 
            <div class="input-group">
                <label for="name">Profile name</label>
                <input type="text" name="name" class="box">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="box">
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" class="box">
            </div>
            <div class="button">
                <input type="submit" name="register" value="Register">
                <input type="reset" name="clear" value="clear">
            </div>
        </form>
       </div>
    </div>
    <div class="footer">copyright &copy setu.kln.ac.lk</div>
</body>
</html>