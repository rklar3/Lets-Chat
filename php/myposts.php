
<?php

        include 'connection.php';


        $count = 0;     
        
        $username1 = $_SESSION["username"];
        $userid = $_SESSION["userid"];


        $newsfeed=("SELECT * FROM topics WHERE userID = '$userid' ORDER BY date desc");
        $newsfeed1 = mysqli_query($connection,$newsfeed) or die(mysql_error());
        while ($row = mysqli_fetch_assoc($newsfeed1)) {
        $v = $row['tname'];
        $w = $row['tcontent'];
        $z = $row['date'];

        $count = $count +1;     
      
        if($count == 0){
          echo "<br>empty newsfeed or search not found.";
          echo "<br>an empty search will return all results.";

        }else{
?>

        <table class="info2">
          <tr>
              <th align="left"> 
              <?php echo "".$v; ?>
              </th>
          </tr>
              <td align="right">
                <center>
               <span class="text"><?php echo $w; ?></span>
                </center> 
              </td>
          <tr>
              <td>
              <p align="right"> Posted On.  <?php echo $z; ?></p>
              <br><br>
              </td>
          </tr> 
          </table>
          
    
        <?php
        } }

        ?>