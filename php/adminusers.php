<?php

	     include 'connection.php';


$count = 0;     
        $newsfeed=("SELECT * FROM users WHERE admin = '0'");
        $newsfeed1 = mysqli_query($connection,$newsfeed) or die(mysql_error());
?>      
        <table class="admin">   
        <tr>
            <td style="width: 7em;"> Username </td>
            <td style="width: 7em;"> Email </td>
            <td style="width: 2em;"> UserID </td>
            <td style="width: 2em;"> Enabled </td>
        </tr>
<?php
        while ($row = mysqli_fetch_assoc($newsfeed1)) {
        $v = $row['username'];
        $w = $row['email'];
        $y = $row['userID'];
        $z = $row['disabled'];
        $count = $count +1;     
        if($z == 0){
          $r = 'Yes';
        }else{
          $r = 'N0';
        }

        if($count == 0){
          echo "<br>No users found in database.";

        }else{
?>

               
        <center>
        <tr>
        <td style="width: 7em;"><?php echo $v; ?></td>
        <td style="width: 8em;"><?php echo $w  ; ?></td>
        <td style="width: 2em;"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$y; ?></td>
        <td style="width: 2em;"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$r; ?></td>
        </tr>
        </center>
          
          
        <?php
        } }
        
        ?>
      
       </table>
