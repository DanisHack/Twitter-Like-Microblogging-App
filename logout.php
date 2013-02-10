<?php
  session_start();
  session_destroy();

   include("top.txt");
   echo "Thank you for using Danish Microblog.  You may ";?>
   
   <a href=index.php>log in again</a>.;
<?php
   include("bottom.txt");
?>
