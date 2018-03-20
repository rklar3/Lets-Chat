

<?php 
    include 'php/connection.php';
    session_start();

# When user is not logged in display login form
# Hide when user is logged in
    if (isset($_SESSION['loggedin'])){
        echo "<style>#login{display:none;}</style>";
        echo "<style>#abc{display:block;}</style>";
        echo "<style>#newpost{display:block;}</style>";
        echo "<style>#admin{display:none;}</style>";

    }elseif (isset($_SESSION['admin'])) {
        echo "<style>#login{display:none;}</style>";
        echo "<style>#abc{display:block;}</style>";
        echo "<style>#newpost{display:block;}</style>";
        echo "<style>#admin{display:block;}</style>";

    }else{
      echo "<style>#login{display:block;}</style>";
      echo "<style>#abc{display:none;}</style>";
      echo "<style>#newpost{display:none;}</style>";
      echo "<style>#admin{display:none;}</style>";

    }
?>

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src='scripts/global.js'></script>


   <head lang="en">
      <meta charset="utf-8">
      <title>Project</title>
      <link rel="stylesheet" type="text/css" href="style/project.css">
   </head>
   <header class="head">
<!-- Write users name in header if signed in-->         
    <h1>Welcome<?php @$username = $_POST['username']; if (empty($username)){}else{echo ", $username<br> "; }?></h1>
   Search:<label class="search1"></label> <input type="text"  class="s"  placeholder="ex. topic" id="search" >
 <!--   <input type="submit" value="Search" class="button" id="search-submit" ><br/><br/>-->
   <script>

   // search bar results
    $('input#search-submit').on('click', function(){
      var search = $('input#search').val();
        $.post('php/newsfeed.php', {search: search}, function(data){
          $('div#info').html(data);
        });
    });

    function sett(){
    var search = $('input#search').val();
      $.post('php/newsfeed.php', {search: search}, function(data){
        $('div#info').html(data);
      });
  
    }
    setInterval(sett,1000);

   </script>

    </header> 
    <div id="main">

    <body>     
    <article id="login">
      <div class="signin">      
        <form action="home.php" method="post" id="mainForm">
          Username:<br>
          <input type="text" id="username" name="username" class="required" class="text1" ><br/>
          Password:<br/>
          <input type="password" id=password name="password" class="required" class="text1"><br/><br/>
          <input type="submit" name="login" value="Login" class="button"><br/><br/>
          <a href="php/createnew.php">new account</a>
          <a href="php/passwordrecovery.php">Forgot password?</a>
        </form>
      </div>
    </article>

<!--Logout and myprofile buttons -->
 <?php include 'php/login.php';?>
      <article id="logout">
      <script src='scripts/Validate.js'></script>

        <form action="home.php" method="post">
          <input type="submit" name="logout" value="Logout" class="button2" id="abc">
          <input type="submit" name="myprofile" value="Myprofile" class="button3" id="abc">
          <input type="submit" name="admin" value="admin" class="button3" id="admin">
        </form>
      </article>


<!-- User posts --> 
        <br><br>
        <div id="top">
          <div id="abc">
            <div id="post">
              Topic name: <input type="text" name="topic_name" id="topic-name" class="text1" style="width: 300px;"><br>
              Content: <br>
              <textarea style="resize: none; width: 600px; height:50px;" name=content class="text1" id="content" ></textarea><br>
            <input type="submit" name="posting" value="Post" class="button" id="content-submit" style="width: 300px">
            </div>
          </div>
          <div id="info2">         
          </div>
          <script>
            $('input#content-submit').on('click', function(){
              var topic = $('input#topic-name').val();
              var content = $('textarea#content').val();
              //if($.trim(topic) != '' && $.trim(content) != '' ((topic.length)<70)){
                $.post('php/newpost.php', {topic: topic, content: content}, function(data){
                  $('div#info').html(data);
                });
              //}
            });

          </script>
        <div id="admin">
          <div id="admin2"></div>           
            <script>
          $(document).ready(function(){
                var callAjax = function(){
                  $.ajax({
                    method:'get',cache: false,
                    url:'php/numberofposts.php',
                    success:function(data){
                      $("#admin2").html(data);
                    }
                  });
                }
                setInterval(callAjax,100);
              });
              </script>
        </div>
        </div>
        <br><br><br>
        <h1></h1>
         <article id="feed"> 
           <div id="info">
           </div>
         </article>

    </div>
    </body>     
      <div id="homefoot">
        <footer>Created by Ravan Klar 2017</footer> 
      </div>
</html>




