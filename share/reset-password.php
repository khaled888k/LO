<!DOCTYPE html>
<html>
 <head>
  <body dir="rtl">
   <main>
     <div class="wrapper-main">
    
    <section class="section-defult">
            <h1>اعادة تعيين كلمة المرور</h1>
            <p>سيتم ارسال ايميل اليك مع كيفيه اعادة كلمة المرور قريبا</p>
            <form action="includes/reset-request.php" method="post">
        <input type="text" name="email" placeholder="ادخل ايميلك هنا... ">
         <button type="submit" name="reset-request-submit">ارسال كلمة المرور الجديده على اليميل</button>       
        </form> 
        <?php
        if (isset($_GET["reset"])){
            if($_GET["reset"] == "success"){
                echo '<p class="signupsuccess">Check yout e-mail</p>';
            }
        }
        ?>
        
    </section>
    </div>
    </main>
   </body>
  </head>
 </html>