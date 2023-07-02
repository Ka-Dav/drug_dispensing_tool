<?php
   session_start();
   $login_session;

   if(!$_SESSION['loggedin']){
      header("location:../public/auth/login.php");
      die();
   }

   function checkRoute($route){
      // Route Protection
      if($_SESSION['role'] !== $route){
         header("../public/auth/login.php");
         die();
      }
   }

   $login_session = array("SSN"=>$_SESSION["ssn"], "fname"=>$_SESSION['fname'], "lname"=>$_SESSION['lname'], "role"=>$_SESSION["role"]);
?>