<?php
  session_start();
  session_destroy();

  $_SESSION['UserID' == ""];
  
  echo "<meta http-equiv=\"refresh\"content=\"0;URL=login.php\">\n";
?>