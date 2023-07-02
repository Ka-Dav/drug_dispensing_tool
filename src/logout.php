<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../public/auth/login.php");
   }
?>