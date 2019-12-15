<?php

if (isset($_POST['signup-submit'])) {

  
  require 'dbh.inc.php';

  
  $username = $_POST['uid'];
  $userid = $_POST['u_id_number'];
  $neighborhood = $_POST['u_neighborhood'];
  $mobile = $_POST['u_mobile'];
  $education = $_POST['u_education'];
  $birthday = $_POST['u_birthday'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];


 
  if (empty($username) || empty($userid) || empty($neighborhood) || empty($mobile) || empty($education) || empty($birthday) ||empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
 
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }
 
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
 
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }

  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {

   
    $sql = "SELECT u_fullname FROM users WHERE u_fullname=?;";
  
    $stmt = mysqli_stmt_init($conn);
   
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
     
      mysqli_stmt_bind_param($stmt, "s", $username);
   
      mysqli_stmt_execute($stmt);
    
      mysqli_stmt_store_result($stmt);

      $resultCount = mysqli_stmt_num_rows($stmt);
     
      mysqli_stmt_close($stmt);
      
      if ($resultCount > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
       
        $sql = "INSERT INTO users (u_fullname,u_id_number,u_neighborhood,u_mobile,u_education,u_birthday, u_email, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
      
        $stmt = mysqli_stmt_init($conn);
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

       
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          
          mysqli_stmt_bind_param($stmt, "ssssssss", $username, $userid, $neighborhood, $mobile, $education, $birthday, $email, $hashedPwd);
         
         
          mysqli_stmt_execute($stmt);
          
          header("Location: ../signup.php?signup=success");
          exit();

        }
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {

  header("Location: ../signup.php");
  exit();
}
