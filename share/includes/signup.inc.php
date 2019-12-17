<?php
// Here we check whether the user got to this page by clicking the proper signup button.

if (isset($_POST['signup-submit'])) {

  
  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';

  // We grab all the data which we passed from the signup form so we can use it later.
  $username = $_POST['uid'];
  $userid = $_POST['u_id_number'];
  $neighborhood = $_POST['u_neighborhood'];
  $mobile = $_POST['u_mobile'];
  $education = $_POST['u_education'];
  $birthday = $_POST['u_birthday'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

 // Then we perform a bit of error handling to make sure we catch any errors made by the user. Here you can add ANY error checks you might think of! I'm just checking for a few common errors in this tutorial so feel free to add more. If we do run into an error we need to stop the rest of the script from running, and take the user back to the signup page with an error message. As an additional feature we will also send all the data back to 

   // We check for any empty inputs.
  if (empty($username) || empty($userid) || empty($neighborhood) || empty($mobile) || empty($education) || empty($birthday) ||empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
   // We check for an invalid username AND invalid e-mail.

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }
   // We check for an invalid username. In this case ONLY letters and numbers.

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
   // We check for an invalid e-mail.

  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  // We check if the repeated password is NOT the same.
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {
   // We check if the repeated password is NOT the same.
    $sql = "SELECT u_fullname FROM users WHERE u_fullname=?;";
   // Then we prepare our SQL statement AND check if there are any errors with it.
    $stmt = mysqli_stmt_init($conn);
   // If there is an error we send the user back to the signup page.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
      // In case you need to know, "s" means "string", "i" means "integer", "b" means "blob", "d" means "double".
      mysqli_stmt_bind_param($stmt, "s", $username);
      // Then we execute the prepared statement and send it to the database!
      mysqli_stmt_execute($stmt);
      // Then we store the result from the statement.
      mysqli_stmt_store_result($stmt);
      // Then we get the number of result we received from our statement. This tells us whether the username already exists or not!
      $resultCount = mysqli_stmt_num_rows($stmt);
       // Then we close the prepared statement!
        mysqli_stmt_close($stmt);
         // Here we check if the username exists.
        if ($resultCount > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
       // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "INSERT INTO users (u_fullname,u_id_number,u_neighborhood,u_mobile,u_education,u_birthday, u_email, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
       // Here we initialize a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        // If there is an error we send the user back to the signup page.
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

       
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          
          mysqli_stmt_bind_param($stmt, "ssssssss", $username, $userid, $neighborhood, $mobile, $education, $birthday, $email, $hashedPwd);
         
         
          mysqli_stmt_execute($stmt);
           // Lastly we send the user back to the signup page with a success message!
          header("Location: ../signup.php?signup=success");
          exit();

        }
      }
    }
  }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../signup.php");
  exit();
}
