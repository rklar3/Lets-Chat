<?php
    
    @session_start();

    include 'connection.php';
    $id = $_SESSION['id'];
  
    $post=("SELECT * FROM topics WHERE postID = '$id' ");
        $post2 = mysqli_query($connection,$post) or die(mysql_error());
           if ($row = mysqli_fetch_assoc($post2)) {
            $tname = $row['tname'];
            $tcontent = $row['tcontent'];
            $userID = $row['userID'];
            $date = $row['date'];
            $username = $row['username'];
            $postID = $row['postID'];
         ?>
         
         <table class="info4">
          <tr>
              <th style="font-size: 3em;"> <?php echo "".$tname; ?></th>
          </tr>
          <tr>
              <td><?php echo $tcontent; ?>
                <p> Posted By.  <?php echo $username; ?>
                <br>Posted On.  <?php echo $date; ?>
                </p>
              </td>
          </tr>
          </table>
      <?php
       }
      ?>
          <br><br><h2>Comments</h2>

    <?php
          include 'connection.php';

          @$comment=("SELECT * FROM comments WHERE postID = '$postID' ");
          @$comment2 = mysqli_query($connection,$comment) or die(mysql_error());
           while ($row = mysqli_fetch_assoc($comment2)) {
            @$comments = $row['comments'];
            @$commentby = $row['commentby'];           
            @$date1 = $row['date'];                
       ?> 
       <br><br><br>
       <table class="info5">
          <tr>
              <td> 
              <?php echo "".$comments; ?>
              </td>
          </tr>
          <tr>    
              <td>
              <p> Commented By.  <?php echo $commentby; ?>
              <br>Commented On.  <?php echo $date1; ?></p>
              </td> 
          </tr>
          </table>
      <?php
       }
      ?>

      </article>

      
