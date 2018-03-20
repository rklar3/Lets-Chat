<?php session_start();

if(! isset($_SESSION['admin'])){ header('Location: ../home.php');}

?>
<!DOCTYPE html>
<html>
   <head lang="en">
      <meta charset="utf-8">
      <title>Project</title>
      <link rel="stylesheet" type="text/css" href="../style/project.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   </head>
   <body>
  <header class="head">
    <h1>Admin Settings</h1>
   </header>
    <article id="logout1">
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
<div id="main3">    
 <!-- User posts by postID number -->
    <article id="adminpost">
        <h1>Remove posts</h1>
            <center>
              <p style="color: white">Enter postID of post to delete it</p>
              <input type="text"  class="s" placeholder="ex. 1" id="search3" >
              <input type="submit" value="Delete" class="button" id="search33"  ><br/><br/>
            </center>
            <div id="adminleft"></div>
            <script>
          $(document).ready(function(){
                var callAjax = function(){
                  $.ajax({
                    method:'get',cache: false,
                    url:'adminfeed.php',
                    success:function(data){
                      $("#adminleft").html(data);
                    }
                  });
                }
                setInterval(callAjax,100);
              });
              </script>


    </article>

    <article id="login3">  
      <h1>Enable/Disable users</h1>   
        <center>
          <div id="post3"> 
            <center><?php 
            include 'adminpost.php' 
            ?></center>
          </div>
          <div id="admin123"></div>
            <script>
            $(document).ready(function(){
                var callAjax = function(){
                  $.ajax({
                    method:'get',cache: false,
                    url:'adminusers.php',
                    success:function(data){
                      $("#admin123").html(data);
                    }
                  });
                }
                setInterval(callAjax,100);
              });
              </script>


        <br><br><br><br>
            Input userId to disable user <input type="text"  class="s" placeholder="ex.4" id="search" >
            <input type="submit" value="Disable" class="button" id="search11"  ><br/><br/>
            Input userId to enable user <input type="text"  class="s" placeholder="ex.7" id="search2" >
            <input type="submit" value="Enable" class="button" id="search22"  ><br/><br/>
    </article>     
        </div>
      </center>

    
    </div>
    <footer>
      <article>
        <div class="footer">
                <p>Created by Ravan Klar 2017</p>

        </div>
      </article>
    </footer>

    <script src= 'https://code.jquery.com/jquery-1.8.0.min.js'></script>
        <script src='../scripts/admin.js'></script>
<br><br>
  </body>


</html>




