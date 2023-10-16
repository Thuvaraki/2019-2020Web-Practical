<?php
    include 'config.php';
    session_start();
    if(isset($_POST['login'])){ 
        $email=mysqli_real_escape_string($conn,$_POST['email']); 
        $password=mysqli_real_escape_string($conn,$_POST['password']);

    $select_user=mysqli_query($conn,"SELECT * FROM `friends` WHERE friend_email='$email' AND password='$password'") or die('query failed');
    if(mysqli_num_rows($select_user)>0){ 
        $row = mysqli_fetch_assoc($select_user);  
        $_SESSION['name']= $row['profile_name'];
        $_SESSION['email']= $row['friend_email'];
        $_SESSION['id']= $row['friend_id'];
        header('location:friendList.php');
    }
    else{
        $message[]='Incorrect email or password!'; 
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="signIn">
        <div class="header"><b>My Friend System</b></div>
        <div class="content">
        <h3><b>Login Page</b></h3>
        <form action="" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="box" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="box" required>
            </div>
            <div class="button">
                <input type="submit" name="login" value="Login">
                <input type="reset" name="clear" value="clear"> 
                
            </div>
        </form>
       </div>
       <div class="footer">copyright &copy setu.kln.ac.lk</div>
       </div>
</body>
</html>