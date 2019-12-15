<?php
  
  require "header.php";
       

?>
<link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css.map">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css.map">
    <main class="rtl">
      <div class="wrapper-main">
        <section class="section-default">
          <h1>تسجيل</h1>
          <?php
          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="signuperror">املاء جميع الخانات!</p>';
            }
            else if ($_GET["error"] == "invaliduidmail") {
              echo '<p class="signuperror">اسم المستخدم و كلمة المرور خطاء!</p>';
            }
            else if ($_GET["error"] == "invaliduid") {
              echo '<p class="signuperror">اسم المستخدم خطاء!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="signuperror">الايميل خطاء!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="signuperror">كلمة المرور لا تتطابق!</p>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<p class="signuperror">اسم المستخدم موجود مسبقا!</p>';
            }
          }
          // Here we create a success message if the new user was created.
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">تم التسجيل بنجاح!</p>';
            }
          }
          ?>
          <form class="form-signup" action="includes/signup.inc.php" method="post"> 
            <?php
            // Here we check if the user already tried submitting data.

            // We check username.
            if (!empty($_GET["uid"])) {
              echo '<input    maxlength="50" minlength="4" name="uid" pattern="^[a-zA-Z0-9]*$" placeholder="اسم المستخدم" required="" type="text" value="'.$_GET["uid"].'"/>';
                
            }
            else {
              echo '<input maxlength="50" minlength="4" name="uid" pattern="^[a-zA-Z0-9]*$" placeholder="اسم المستخدم" required="" type="text">';
            }
              
               if (!empty($_GET["u_id_number"])) {
              echo '<input    maxlength="10" minlength="10" name="u_id_number"   placeholder="رقم السجل المدني	" required="" type="text" value="'.$_GET["u_id_number"].'"/>';
                
            }
            else {
              echo '<input maxlength="10" minlength="10" name="u_id_number"   placeholder="رقم السجل المدني	" required="" type="text">';
            }
              
              
              if (!empty($_GET["u_neighborhood"])) {
              echo '<input      minlength="4" name="u_neighborhood"  placeholder="الحي" required="" type="text" value="'.$_GET["u_neighborhood"].'"/>';
                
            }
            else {
              echo '<input   minlength="4" name="u_neighborhood"  placeholder="الحي" required="" type="text">';
            }
              
                  if (!empty($_GET["u_mobile"])) {
                  echo '<input    maxlength="14" minlength="10" name="u_mobile"   placeholder="الرقم الجوال" required="" type="tel" value="'.$_GET["u_mobile"].'"/>';

                }
                else {
                  echo '<input maxlength="14" minlength="10" name="u_mobile"   placeholder="الرقم الجوال" required="" type="tel">';
                }
              
              
                  if (!empty($_GET["u_education"])) {
                  echo '<input      name="u_education"   placeholder="المستوى التعليمي	" required="" type="text" value="'.$_GET["u_education"].'"/>';
                      
                }
                else {
                  echo '<input   name="u_education"   placeholder="المستوى التعليمي	" required="" type="text">';
                }
              
                  if (!empty($_GET["u_birthday"])) {
                  echo '<input      name="u_birthday"   placeholder="تاريخ الميلاد	" required="" type="date" value="'.$_GET["u_birthday"].'"/>';

                }
                else {
                  echo '<input   name="u_birthday"   placeholder="تاريخ الميلاد" required="" type="date">';
                }
              

            // We check e-mail.
            if (!empty($_GET["mail"])) {
              echo '<input type="text" name="mail" placeholder="الايميل"  required="" value="'.$_GET["mail"].'">';
            }
            else {
              echo '<input type="text" name="mail"  required="" placeholder="الايميل">';
            }
            ?>
            <input type="password" name="pwd" placeholder="كلمة مرور"  minlength="6">
            <input type="password" name="pwd-repeat" placeholder="اعادة كلمة مرور"  minlength="6">
            <button type="submit" name="signup-submit">تسجيل</button>
          </form>
            
        </section>
      </div>
    </main>

<?php
  // And just like we include the header from a separate file, we do the same with the footer.
  require "footer.php";
?>
