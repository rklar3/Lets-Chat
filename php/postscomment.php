<?php
    session_start();
       include 'connection.php';

    @$comment = $_POST['comment'];
    
       @$pid = mysqli_real_escape_string($connection, $_SESSION['id']); 
       @$username = mysqli_real_escape_string($connection, $_SESSION['username']); 

    if($_POST['comment']){
  
        @$dt = new DateTime("now", new DateTimeZone('America/Vancouver')); 
        @$date = $dt->format('Y-m-d H:i:s');
        $username = $_SESSION["username"];

        $pID = $_SESSION['id']; 


        if($_POST['comment']){
        $comment = $_POST['comment']; 

        $c = "INSERT INTO comments (postID, comments, commentby, date) VALUES ( '$pID', '$comment', '$username','$date')";
            
           if(mysqli_query($connection, $c)){

              echo "thanks for posting";

           }else{
            echo mysql_error($c);
           }

 }else{
  echo "sorry posting didnt work";
 }

    }

?>