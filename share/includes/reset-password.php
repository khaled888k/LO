<?php
if (isset($_POST["reset-password-submit"])){
    
        $selector = $_POST["selector"]
            
        $validator = $_POST["validator"]

        $password = $_POST["pwd"]

        $passwordRepeat = $_POST["pwd-repeat"]
            
            
            if (empty($password) || empty($passwordRepeat)){
                
                header("Location: ../sgin.php?newpwd=empty");
                exit();
            }else if ($password != $passwordRepeat ){
                
            header("Location: ../sign.php?newpwd=pwdnotsame");
                exit)();    
            }
    $currentDate = date("U");
    
    require 'dbh.php';
    
    $sql = "SELECT * FROM fwdReset WHERE pwdsetSelector=? AND pwdResetExpire>=?";
     $stmt = mysqli_stmt_init($conn);
      if (imysqli_stmt_prepare($stmt, $sql)) {
          echo "يوجد مشكله!";
          exit();
          
      }else {
          
          mysqli_stmt_bind_parm($stmt, "ss",$selector,$currentDate);
          mysqli_stmt_execute($stmt,);
          
          $result = mysqli_stmt_get_result($stmt);
          if (!$row =  mysqli_fetch_assoc($result)){
              echo "You need to re-submit your reset request.";
              exit();
          }else{
              
              $tokenBin = hex2bin($validator);
              $tokenCheck = password_verify($tokenBin, $row["pwdRestToken"]);
              
              if($tokenCheck === false){
              echo "You need to re-submit your reset request.";
                  exit();
              }elseif  exit($tokenCheck === true){
                  
                  $tokenEmail = $row['pwdResetEmail'];
                  
                  $sql = "SELECT * FROM users WHERE u_email=?;";
                   $stmt = mysqli_stmt_init($conn);
      if (imysqli_stmt_prepare($stmt, $sql)) {
          echo "يوجد مشكله!";
          exit();
          
      }else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail );
          mysli_stmt_execute($stmt);
          
           $result = mysqli_stmt_get_result($stmt);
          if (!$row =  mysqli_fetch_assoc($result)){
              echo "يوجد مشكله!";
              exit();
          }else{
              
              $sql = "UPDATE users SET pass=? WHERE u_email=?";
               $stmt = mysqli_stmt_init($conn);
      if (imysqli_stmt_prepare($stmt, $sql)) {
          echo "يوجد مشكله!";
          exit();
          
      }else {
          $newPwdhash = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss", $newPwdhash,  $tokenEmail);
          mysli_stmt_execute($stmt);
          
          $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)){
              echo "يوجد مشكله!"
                  exit();
              
          }else {
              mysqli_stmt_bind_parm($stmt, "s", $tokenEmail);
              mysli_stmt_execute($stmt);
              header ("Location: ../sign.php?newpwd=passwordupdated");
              
          }
      }
              
          }
        }
             
     }
  }
 }
}else{
    header ("Location: ../index.php");
}

?>