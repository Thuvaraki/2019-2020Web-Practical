<?php
include 'config.php';
   session_start();
   if(isset($_POST['unfriend-btn'])){
     $friendId = $_POST['friend-id'];
     $sessionId = $_SESSION['id'];

     $query="delete from myfriends where (friend_id1 = $sessionId AND friend_id2 = $friendId) OR (friend_id1 = $friendId AND friend_id2 = $sessionId)";
     $result=mysqli_query($conn,$query);

     if ($result) {
        $updateQuery1 = "UPDATE friends SET num_of_friends = num_of_friends - 1 WHERE friend_id = '" . $sessionId . "'";
        $updateResult1 = mysqli_query($conn, $updateQuery1);
        $updateQuery2 = "UPDATE friends SET num_of_friends = num_of_friends - 1 WHERE friend_id = '" . $friendId . "'";
        $updateResult2 = mysqli_query($conn, $updateQuery2);
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
    <title>friendList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="friendList">
    <div class="header"><b>My Friend System</b></div>
        <div class="content">
        <h3><b><span><?php echo $_SESSION['name']?>'s</span> Friend List Page</b></h3> 
        <p><b>Total number of friends is <span>
            <?php
              if(isset($_SESSION['no_of_friends']))
                echo $_SESSION['no_of_friends'];
             else
                echo '0';
            ?></span></b></p>
 
    <div class="table">
        <table>
        <?php
            $query = "SELECT friend_id,profile_name FROM friends 
                     JOIN myfriends ON (friends.friend_id = myfriends.friend_id1 OR friends.friend_id = myfriends.friend_id2)
                     WHERE (myfriends.friend_id1 = " . $_SESSION['id'] . " OR myfriends.friend_id2 = " . $_SESSION['id'] . ")
                     AND friends.profile_name <> '" . $_SESSION['name'] . "'";

           $select_user = mysqli_query($conn,$query);

            if(mysqli_num_rows($select_user)>0){
                while($row = mysqli_fetch_assoc($select_user)){
                    echo' <tr><td>'.$row['profile_name'].'</td>
                          <td class="unfriend-btn">
                          <form method="post">
                          <input type="hidden" name="friend-id" value="' . $row['friend_id'] . '">
                          <input type="submit" name="unfriend-btn" class="unfriend-btn" value="Unfriend">
                          </form></td></tr>';
                }
            }
        ?>
        </table>
    </div>

        <div class="button">
           <a href="friendadd.php" class="btn" id="friendadd">Add friend</a>
           <a href="logout.php" class="btn" id="logout">Logout</a>
        </div>
       </div>
       <div class="footer">copyright &copy setu.kln.ac.lk</div>
    </div> 
</body>
</html>