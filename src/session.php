<?php
   session_start();
   $login_session;

   if(!$_SESSION['loggedin']){
      header("location:login.php");
      die();
   }

   function checkRoute($route){
      // Route Protection
      if($_SESSION['role'] !== $route){
         header("location:login.php");
         die();
      }
   }

   $login_session = array("fname"=>$_SESSION['fname'], "lname"=>$_SESSION['lname']);
?>