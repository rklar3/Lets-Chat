<?php
    include 'connection.php';
    @session_start();
      @$dt = new DateTime("now", new DateTimeZone('America/Vancouver')); 
      @$date = $dt->format('Y-m-d H:i:s');
        @$username1 = $_SESSION["username"];
          @$count1 = 0;      
          @$result3=("SELECT * FROM users Where username = '$username1' ");
          @$result4 = mysqli_query($connection,$result3) or die(mysql_error());
          
          while ($row = mysqli_fetch_assoc($result4)) {
              @$a1 = $row['username'];
              @$b1 = $row['userID'];
              @$count1 = $count1 +1;
          }
        if(@$_POST['topic']){
           @$topic = mysqli_real_escape_string($connection, $_POST['topic']); 
           @$content = mysqli_real_escape_string($connection, $_POST['content']); 

        if($topic && $content){
                 @$n = "INSERT INTO topics (tname, tcontent, userID, date, username) VALUES ('$topic', '$content', '$b1', '$date', '$username1')";
              if(mysqli_query($connection, $n)){
                  echo "Thanks for posting";
                  include 'newsfeed.php';
           }else{
            #echo ".sql";
            echo "Sorry, Post resulted in error";
}
           }
         } 
?>
