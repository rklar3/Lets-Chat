
<?php
session_start();
$_SESSION['id'] = $_GET['id'];

if(! isset($_SESSION['new'])){ header('Location: logout.php');}
?>

<!DOCTYPE html>
<html>
   <head lang="en">
      <meta charset="utf-8">
      <title>Posts</title>
      <link rel="stylesheet" type="text/css" href="../style/project.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   </head>
   <header class="head">
   </header> 
   
   <body>
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

    <div id="postspage">

             <div id="leftpage"></div>
             <script>
               $(document).ready(function(){
                var callAjax = function(){
                  $.ajax({
                    method:'get',cache: false,
                    url:'showcomments.php',
                    success:function(data){
                      $("#leftpage").html(data);
                    }
                  });
                }
                setInterval(callAjax,100);
              });
              </script>



    
<article id="comments">
    <div id="result"> </div>

        Comment: <br>
              <textarea style="resize: none; width: 30em; height:8em;" name=comment class="" id="comment" ></textarea><br>
              <input type="submit" name="submit" value="Post" class="button" id="comment-submit" style="width: 300px">
<script>
    $('input#comment-submit').on('click', function(){
            var comment = $('#comment').val();

                $.post('postscomment.php', {comment: comment}, function(data){
                    $('#result').html(data);
                });
        });


</script>

    </article> 
    </body>    
    </div> 
        <footer>
        <div class="footer">
        <div id="terms">
          <p>Created by Ravan Klar 2017</p>

        </div>
        </div>
        </footer>
      </html>


