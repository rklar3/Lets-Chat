<?php

include 'connection.php';

      try {   

         $count = 1;   
        if(isset($_POST['login'])){

          @$username = $_POST['username']; 
          @$password = md5($_POST['password']);

          $_SESSION["username"] = $_POST['username'];        
            
          $result=("SELECT * FROM users Where password = '$password' and username = '$username' ");
          $result1 = mysqli_query($connection,$result) or die(mysql_error());

          while ($row = mysqli_fetch_assoc($result1)) {
              $a = $row['username'];
              $b = $row['password'];
              $userid = $row['userID'];
              $admin = $row['admin'];
              $disabled = $row['disabled'];
              $count = $count +1;
          }
          @$_SESSION["userid"] = $userid;

        if(( (!empty($username) and !empty($password)) and $count != 0)&&(strcmp($username, @$a) == 0) && (strcmp($password, @$b) == 0) && ($admin == 1) && ($disabled ==0))
          {
              $_SESSION['admin']=true;              
              $_SESSION['new']=true;
              echo "<style>#login{display:none;}</style>";
              echo "<style>#abc{display:block;}</style>";
              echo "<style>#admin{display:block;}</style>";

          }


          elseif(( (!empty($username) and !empty($password)) and $count != 0)&&(strcmp($username, @$a) == 0) && (strcmp($password, @$b) == 0) && ($disabled ==0))
          {
              $_SESSION['loggedin']=true;
              $_SESSION['new']=true;
              echo "<style>#login{display:none;}</style>";
              echo "<style>#abc{display:block;}</style>";              
              echo "<style>#admin{display:none;}</style>";


          }elseif (( $count == 0)) 
          {
              echo "<script>alert('invalid username or password');</script>";
              echo "<style>#login{display:block;}</style>";
              echo "<style>#abc{display:none;}</style>";
              echo "<style>#admin{display:none;}</style>";

          } 
        }
      }catch (PDOException $e) {
      die(mysql_error()); 
        mysqli_close($connection);
      }
      // Close connection
      mysqli_close($connection);
      ?>

           <?php
         if(isset($_POST['logout'])){
           header('Location: php/logout.php');
         }
         if (isset($_POST['myprofile'])){
            header('Location: php/user.php');
         }
         if (isset($_POST['admin'])){
            header('Location: php/admin.php');
         }
       ?>