<?php 

session_start();
?>
<!DOCTYPE html>
<html>
   <head lang="en">
      <meta charset="utf-8">
      <title>Project</title>
      <link rel="stylesheet" type="text/css" href="../style/project.css">
      <script type="text/javascript" src="../scripts/Validate.js"></script>

   </head>
   <body>
      <header class="head">
         <h1></h1>
      </header>
     
          <article id="feed3">
          <br><br><br>
            <h1 id="pr" >Password Recovery</h1>
            <div class="signin2">      
              <form action="passwordrecovery.php" method="post">
              Enter E-mail Address: <br><br>
              <input type="text" name="email" size="20" > <br><br>
              <input type="submit" name="ForgotPassword" value="Request Reset" class="button" ><br><br>
              <label class="button"><a href="../home.php">Go home</a></label><br/>
              </form>
            </div>
         </article>
      <footer>
        <article>
         <div class="footer">
        <p>Created by Ravan Klar 2017</p>
         </div>
       </article>
      </footer>
   </body>
</html>





<?php

try{

include 'connection.php';
  
  if(@$_POST['email']){



  $email = ($_POST['email']); 
 
     $result=("SELECT * FROM user Where email = '$email' ");
     $result1 = mysqli_query($connection,$result);

     $count =0;
     while ($row = mysqli_fetch_assoc($result1)) {
     echo $row['username'];
     $p = $row['password'];
     $e =  $row['email'];
     $count = $count+1;
      }

     if( ( $count != 0) && (strcmp($email, @$e) == 0) )
    {
    }else{
      echo 'email not found';

    }
 
$password = $p;
$to = $e;
$subject = "Your Recovered Password";

$message = "Please use this password to login " . $password;
$headers = "From : user@ravanklar.com";
if(mail($to, $subject, $message, $headers)){
  echo 'Your Password has been sent to your email id';
}else{
  echo 'Failed to Recover your password, try again';
}



 }

}catch (PDOException $e) {
die(mysql_error()); 
  mysqli_close($connection);

}

// Close connection
  mysqli_close($connection);

?>


























