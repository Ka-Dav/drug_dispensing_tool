<?php
   session_start();
   $login_session = [];
   
   function checkRoute($route){
      // Route Protection
      
      if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){
         header("../public/auth/login.php");
      }

      if($_SESSION['role'] !== $route){
         header("../public/auth/login.php");
         die();
      }
   }
   if(isset($_SESSION['loggedin'])){
      $login_session = array("SSN"=>$_SESSION["ssn"], "fname"=>$_SESSION['fname'], "lname"=>$_SESSION['lname'], "role"=>$_SESSION["role"]);
   }
   else{
      $login_session = [];
   }
   
   
?>