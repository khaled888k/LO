<!DOCTYPE html>
<html>
 <head>
  <body dir="rtl">
<?php
  if (isset($_POST["reset-request-submit"])){
      
      $selector =bin2hex(random_bytes(8));
      $token = random_bytes(32);
      
      
      $url = "www.fwf.com/forgottenpwd/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
          $expires = date("U") + 1800;
      
      
          include 'conn.php';
      
     $u_Email = $_POST["email"];
      
      $sql = "DELETE FORM pwdRest WHERE pwdResetEmail=?";
      $stmt = mysqli_stmt_init($conn);
      if (imysqli_stmt_prepare($stmt, $sql)) {
          echo "يوجد مشكله!";
          exit();
          
      }else {
          
          mysqli_stmt_bind_parm($stmt, "s",$u_Email);
          mysqli_stmt_execute($stmt);
      }
      
      $sql = "INSERT INTO pwdRest (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
       $stmt = mysqli_stmt_init($conn);
      if (imysqli_stmt_prepare($stmt, $sql)) {
          echo "يوجد مشكله!";
          exit();
      }else {
          $hashedToken = password_hash($token, PASSWORD_DEFAULT);
          mysqli_stmt_bind_parm($stmt, "ssss",$u_Email, $selector, $hashedToken, $expires);
          mysqli_stmt_execute($stmt);
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      
      $to = $u_Email;
      
      $subject = 'Reset your password for wadf';
      
      $message = '<p>وصلنا طلب اعادة تعيين كلمة المرور .الرابط لأعادة كلمة المرور بالاسفل,</p>';
      $message .= '<p>رابط اعادة كلمة المرور:</br>';
      $message .= '<a href="' . $url .">' . $url . '</a></p>';
      
      
      $headers = "From: learning_courve <learningcourve@gmail.com>/r/n";
       $headers .= "Reply-To: Sami@g.com/r/n";
       $headers .= "Content-type: text/html/r/n";
       
       mail($to, $subject, $message,$headers);
       
       header("Location: ../reset-password.php?reset=success");
      }else{
      header("location: ../index.php")
      }
      ?>
   </body>
  </head>
 </html>