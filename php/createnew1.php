<!--  need to create db for users-->
<?php
include 'connection.php';
session_start();
try{
   @$dt = new DateTime("now", new DateTimeZone('America/Vancouver')); 
   @$date = $dt->format('Y-m-d H:i:s');
     @$username = mysqli_real_escape_string($connection, $_POST['username']); 
     @$email = mysqli_real_escape_string($connection, $_POST['email']); 
     @$password = mysqli_real_escape_string($connection, md5($_POST['password'])); 
     $count = 0;      
     $result=("SELECT username,email FROM users Where username = '$username' or email ='$email' ");
     $result1 = mysqli_query($connection,$result) or die(mysql_error());

     while ($row = mysqli_fetch_assoc($result1)) {
          $a = $row['username'];
          $b = $row['email'];
          $count = $count +1;
      }     
      if(($count!=0) && ((strcmp($username,@$a)==0)&& (strcmp($email, @$b) == 0))){
          $_SESSION['message'] = 'Use a different email/password';
          header('Location: createnew.php');
      }else{
          $r = "INSERT INTO users (username, email, password, date) VALUES ('$username', '$email', '$password','$date')";
           if(mysqli_query($connection, $r)){
              $_SESSION['message'] = 'Thanks for registering';
              // inserts user picture in database  
              #check image type
              @$target_dir = "uploads/";
              @$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
              @$uploadOk = 1;
              @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

              // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                      if($check !== false) {
                            echo "file is an image" . $check["mime"] . ".";
                            $uploadOk = 1;
                       } else {
                            echo "file is not an image<br>";
                            $uploadOk = 0;
                       }
                }
                if (@$_FILES["fileToUpload"]["size"] > 1000000000) {
                    echo "File is to large<br>";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                    echo "<br> sorry, only jpg,png and gif files are allowed.<br>";
                    $uploadOk = 0;
                }
                $result3=("SELECT * FROM users Where password = '$password' and username = '$username' ");
                $result4 = mysqli_query($connection,$result3) or die(mysql_error());
                   while ($row = mysqli_fetch_assoc($result4)) {
                    $userID =$row['userID'];  
                  }
                #insert image by user id
                $imagedata = file_get_contents($_FILES['fileToUpload']['tmp_name']);
                $sql = "INSERT INTO userImages (userID, contentType, image) VALUES(?,?,?)";
                $stmt = mysqli_stmt_init($connection); //init prepared statement object
                mysqli_stmt_prepare($stmt, $sql); // register the query
                $null = NULL;
                mysqli_stmt_bind_param($stmt, "isb", $userID, $imageFileType, $null);
                mysqli_stmt_send_long_data($stmt, 2, $imagedata);
                // This sends the binary data to the third variable location in the
                // prepared statement (starting from 0).
                $result3 = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
                // run the statement 
                header('Location: ../home.php');
                  session_start();
                  // Delete certain session
                  unset($_SESSION['message']);
                  // Delete all session variables
                  session_destroy();
               }else{
                 header('Location: createnew.php');
                 $_SESSION['message'] = 'Error'.mysql_error($r);
           }    
      }
   }catch (PDOException $e) {
      die(mysql_error()); 
      mysqli_close($connection);
   }
  mysqli_close($connection);   
        

    
?>     
 