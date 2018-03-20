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
<script>

function checkPasswordMatch(e){
    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("password-check").value;
    var email1 = document.getElementById("email1").value;
    var email2 = document.getElementById("email2").value;
    var username = document.getElementById("username").value;

    var requiredInputs = document.querySelectorAll(".required");

    if(username.length >= 8){
      document.getElementById("msg").innerHTML ="username has to be less than 8 chars";
            e.preventDefault();
    }
    if(password1.length >= 8){
      document.getElementById("msg").innerHTML ="password has to be less than 8 chars";
            e.preventDefault();
    }
    if(email1!=email2){
      document.getElementById("msg").innerHTML ="Emails dont match";
       makeRed(requiredInputs[1]);
       makeRed(requiredInputs[2]);
       e.preventDefault();
    }else if (password1!=password2){
      document.getElementById("msg").innerHTML ="Passwords dont match";       
       makeRed(requiredInputs[3]);
       makeRed(requiredInputs[4]);
       e.preventDefault();
     }else{
      return true;
    }
}



</script>
   </head>
   <body>
      <header class="head">
         <h1><?php echo @$_SESSION['message']; ?></h1>
      </header>
     
          <article id="feed2">
            <h1>Create new account</h1>
            <div class="signin2">      
              <form method="post" action="createnew1.php" id="mainForm" enctype="multipart/form-data" >
              Username:<br>
              <input type="text" name="username" id="username" class="required">
              <br>
              email:<br>
              <input type="email" name="email" id="email1" class="required"><br/>
              verify Email:<br>
              <input type="email" name="email2" id="email2" class="required"><br/>
              Password:<br>
              <input type="password" name="password" id="password" class="required">
              <br>
              Re-enter Password:<br>
              <input type="password" name="password-check" id="password-check" class="required">
              <br><br>
              <br><br>Upload photo <br>
              <input type="file" name="fileToUpload" id="fileToUpload" class="required"><br><br>
              <br/><br/>
              <input type="submit" name="create" value="Create Account" class="button"><br/><br>
              <label class="button"><a href="../home.php">Go home</a></label><br/>
              <br><br><div style="color: red; size: 20px;" id="msg"></div>
              <br/>
              <br/>
            </form>
            </div>
         </article>
      </div>
      <footer>
        <article>
         <div class="footer">
            <h1>Footer</h1>
         </div>
       </article>
      </footer>
   </body>
</html>






