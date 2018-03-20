<?php 

session_start();



if(! isset($_SESSION['new'])){ header('Location: logout.php');}
?>

<!DOCTYPE html>
<html>
   <head lang="en">
      <meta charset="utf-8">
      <title>Project</title>
      <link rel="stylesheet" type="text/css" href="../style/project.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="../scripts/Validate.js"></script>

<script>

function checkPasswordMatch(e){
    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("password-check").value;
    var requiredInputs = document.querySelectorAll(".required");

    if(password1!=password2){
       alert("passwords dont match");
       makeRed(requiredInputs[1]);
       makeRed(requiredInputs[2]);
       e.preventDefault();
     }else{
      return true;
    }
}

</script>
   </head>
   <body>
      <header class="head">
         <h1>Users profile</h1>
      </header>
      <article id="logout">
        <form action="#" method="post">
            <input type="submit" name="logout" value="Logout" class="button2">
            <input type="submit" name="home" value="Home" class="button3">
            <?php
            if (isset($_POST['logout'])){
                 header('Location: logout.php');
            }
            if (isset($_POST['home'])){
             header('Location: ../home.php');
            }
          ?>
        </form>
      </article>
      <div id="main2">    
 <!-- Will be able to look at user posts -->
       <article id="mypost">   
              <div id="pic">


                <?php
                  include 'connection.php';

                  $userid = $_SESSION["userid"];


                  $result=("SELECT * FROM userImages Where userID='$userid' ");
                  $result1 = mysqli_query($connection,$result) or die(mysql_error());

                   while ($row = mysqli_fetch_assoc($result1)) {
                    @$img = $row['image'];
                    @$id = $row['userID'];
                    @$type = $row['contentType'];
                    }
                 if(empty($img)){
                  echo "sorry account had no picture";
                 }else{
                    echo '<img src="data:image/'.@$type.';base64,'.base64_encode(@$img).'"/>';
                 }

                 
                ?>
              <div>
              <div>
                <h3>My posts</h3>
                <?php include 'myposts.php';  ?>
              </div>
       </article>

 <!-- Can edit info -->
      <article id="login2">
      <h1>Edit profile</h1>  
        <div  class="signin3">  
          <form action="user.php" method="post" id="mainForm">
             <h4>Change password </h4><br/>
             Enter username<br><br/>
             <input type="text" id="userid" name="username" class="required" ><br/><br/>
             Enter new password<br><br/>
             <input type="password" id="userid" name="newpassword" class="required" ><br/><br/>
             Enter current password<br><br/>
             <input type="password" id="userid" name="password1" id ="password" class="required" ><br/><br/>
             Re enter current password<br><br/>
             <input type="password" id="userid" name="password2" id ="password-check" class="required" ><br/><br/>
             <input type="submit" name="save" value="save" class="button">
          </form> 
          <br/><br/>
            
             <h4>Delete account</h4><br/>
             Enter password to delete<br><br/>
          <div>
          <center>
             <input type="text" id="deleteaccount" class="" ><br/><br/>
             <input type="submit" id="deleteaccount1"  value="deleteaccount" class="button">
          </center>
          <div>
            
        </div>
        <br/><br/><br/><br/><br/>
        <div id="delete"><center></center></div>

          <script>
                  $('input#deleteaccount1').on('click', function(){
                      if (confirm('Are you sure you want to delete you account!!!')) {
                         var deleteaccount = $('input#deleteaccount').val();
                          $.post('deleteuser.php', {deleteaccount: deleteaccount}, function(data){
                         $('div#delete').html(data);
                });
                      } else {
                          // Do nothing!
                      }
                     
            });
         </script>

           
      </article>
      </div>
      <footer>
        <article>
         <div class="footer">
        <p>Created by Ravan Klar 2017</p>
         </div>
       </article>
      </footer>
   </body>


<!-- updates password -->
<?php

try {   

include 'connection.php';
  
  @$username = ($_POST['username']); 
  @$newpassword = md5($_POST['newpassword']); 
  @$password1 = md5($_POST['password1']); 
  @$password2 = md5($_POST['password2']); 



  $count = 0;      
     $result=("SELECT * FROM users Where username = '$username' and password = '$password1' ");
     $result1 = mysqli_query($connection,$result) or die(mysql_error());

     while ($row = mysqli_fetch_assoc($result1)) {
     $a = $row['username'];
     $b = $row['password'];
      $count = $count +1;
      }

     if(( $count != 0)&&(strcmp($username, @$a) == 0) && (strcmp($password1, @$b) == 0))
     {

     $result=("UPDATE users Set password = '$newpassword' Where username = '$a' ");


      if (mysqli_query($connection, $result)) {
          echo "<script>alert('password updated successfully');</script>";
      }else {
          echo "<script>alert('update failed');</script>";
      }
      }



}catch (PDOException $e) {
die(mysql_error()); 
  mysqli_close($connection);

}

// Close connection
  mysqli_close($connection);

?>







