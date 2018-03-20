
<?php
        include 'connection.php';
        @session_start();
        $count = 0;     
        $newsfeed=("SELECT * FROM topics ORDER BY date desc");       
        if(@isset($_POST['search'])){
          $s = $_POST['search'];
          $search = '%'.$s.'%';
        }else{
          $search = '% %';
        }
        $newsfeed=("SELECT * FROM topics WHERE tname LIKE '$search' or tcontent LIKE '$search' ORDER BY date desc");
        $newsfeed1 = mysqli_query($connection,$newsfeed) or die(mysql_error());
        while ($row = mysqli_fetch_assoc($newsfeed1)) {
        $v = $row['tname'];
        $w = $row['tcontent'];
        $userID = $row['userID'];
        $postID = $row['postID'];
        $z = $row['date'];
        $ss = $row['username'];
        $count = $count +1;          
?>
        <table class="info">
          <tr>
              <th> <?php echo "<a href='php/posts.php?id=$postID'>".$row['tname']."</a><br>"; ?> </th>
              <td><?php echo $w; ?>
              <p> Posted By.  <?php echo $ss; ?>
              <br >Posted On.  <?php echo $z; ?></p>
              </td>
          </tr>
        </table>
        <?php        
    }   
?>
    










                 
