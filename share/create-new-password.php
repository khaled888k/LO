<!DOCTYPE html>
<html>
 <head>
  <body dir="rtl">
   <main>
     <div class="wrapper-main">
    
    <section class="section-defult">
            <?php
        $selector = $_GET["selector"]
              $validator = $_GET["validator"]
            if (empty($selector) || empty($validator)){
                echo "Could not validate your request!";
            }else {
                if (ctype_xdigit($selector !== false && ctype_xdigit($validator !== false )){
                 ?>
                   <form action="includes/reset-password.php">
                       <input type="hidden" name="selector" value="<?php echo $selector?>">
                       <input type="hidden" name="validator" value="<?php echo validator?>">
                       <input type="password" name="pwd" placeholder="ادخل كلمه المرور الجديدة">
                       <input type="password" name="pwd-repeat" placeholder="اعد ادخال كلمه المرور الجديدة ">
                       <button type="submit" name="reset-password-submit">تاكيد</button>

        
        </form>
            
                  <?php  
                }
            }
        ?>
          
    </section>
    </div>
    </main>
   </body>
  </head>
 </html>