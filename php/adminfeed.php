

<?php

#if(! isset($_SESSION['admin'])){ header('Location: ../home.php');}

    include 'connection.php';

        $count = 0;     
        
        $newsfeed=("SELECT * FROM topics ORDER BY date desc");
        $newsfeed1 = mysqli_query($connection,$newsfeed) or die(mysql_error());
        while ($row = mysqli_fetch_assoc($newsfeed1)) {
        $v = $row['tname'];
        $w = $row['tcontent'];
        $y = $row['userID'];
        $z = $row['date'];
        $zz = $row['postID'];
        $username = $row['username'];
        $count = $count +1;     
      
        if($count == 0){
          echo "<br>empty newsfeed or search not found.";

        }else{
?>

        <table id="adminfeed">
          <tr>
              <th style="color: white;"> <?php echo "".$v; ?></th>
          </tr>
          <tr>
              <td style="color: white;"><?php echo $w; ?> 
              <p> Date posted:  <?php echo $z; ?>
              <br> Postby:  <?php echo $username; ?>
              <br> PostID:  <?php echo $zz; ?></p>

              <br>
              </td>
          </tr> 
          </table>
          
    
<?php
        } }

?>
