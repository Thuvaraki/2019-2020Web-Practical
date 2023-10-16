
<?php
include 'config.php';
   session_start();
   if(isset($_POST['add-btn'])){
     $friendId = $_POST['friend-id'];
     $query="insert into myfriends(friend_id1,friend_id2) values('" . $_SESSION['id'] . "', '" . $friendId . "')";
     $result=mysqli_query($conn,$query);
     if ($result) {
        $updateQuery = "UPDATE friends SET num_of_friends = num_of_friends + 1 WHERE friend_id = '" . $_SESSION['id'] . "' OR friend_id = '" . $friendId . "'";
        $updateResult = mysqli_query($conn, $updateQuery);
    }
    }

    $query = "SELECT * FROM friends WHERE friend_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
       $row = mysqli_fetch_assoc($result);
       $_SESSION['no_of_friends'] = $row['num_of_friends'];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>friendadd</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="friendadd">
        <div class="content">
        <h3><b><span>
            <?php echo $_SESSION['name'] ?>'s</span> Add Friend Page</b></h3>
        <p><b>Total number of friends is <span>
            <?php 
               if(isset($_SESSION['no_of_friends']))
                 echo $_SESSION['no_of_friends'];
               else
                  echo '0';
            ?>
        </span></b></p>
        
    <div class="table">
        <table>
        <?php
           $query = "SELECT friend_id, profile_name 
           FROM friends 
           WHERE friend_email != '" . $_SESSION['email'] . "' 
           AND friend_id NOT IN (
             SELECT friend_id2 
             FROM myfriends 
             WHERE friend_id1 = '" . $_SESSION['id'] . "' )
            AND friend_id NOT IN (
                SELECT friend_id1 
                FROM myfriends 
                WHERE friend_id2 = '" . $_SESSION['id'] . "' )";
           $select_user = mysqli_query($conn, $query);

            if(mysqli_num_rows($select_user)>0){
                while($row = mysqli_fetch_assoc($select_user)){
                    echo' <tr><td>'.$row['profile_name'].'</td>
                         <td class="add-btn">
                          <form method="post">
                          <input type="hidden" name="friend-id" value="' . $row['friend_id'] . '">
                          <input type="submit" name="add-btn" class="add-btn" value="Add friend">
                          </form></td></tr>';
                }
            }
        ?>
        </table>
    </div>

        <div class="button">
           <a href="friendList.php" class="btn" id="friendList">Friend List</a>
           <a href="logout.php" class="btn" id="logout">Logout</a>
        </div>
       </div>
       <div class="footer">copyright &copy setu.kln.ac.lk</div>
    </div> 
</body>
</html>