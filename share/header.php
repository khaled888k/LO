<?php
 
  session_start();
 
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

   
    <header>
      <nav class="nav-header-main">
       
        <ul>
          <li  >
                        <a class="nav-link" href="index.php">الرئيسية  </a>
                    </li>
          <li> <a class="nav-link" href="hawl.php" target="_blank">حول</a></li>
          <li><a class="nav-link" href="contac-%20us.php" target="_blank">اتصل بي</a></li>
          
        </ul>
           
      </nav>
      <div class="header-login">
       
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username" required="">
            <input type="password" name="pwd" placeholder="Password" required="">
            <button type="submit" name="login-submit">تسجيل دخول</button>
          </form>
          <a href="signup.php" class="header-signup">تسجبل</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">تسجيل خروج</button>
          </form>';
        }
        ?>
          <br>
      </div>
    </header>
