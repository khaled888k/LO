<?php include("conn.php");?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
</head>
<body dir="rtl">

    <?php
    
    if(isset($_POST["u_fullname"])){
        
        mysqli_query($conn, "UPDATE users SET u_fullname='$_POST[name]', u_email='$_POST[cmail]', u_neighborhood='$_POST[neighborhood]', u_birthday='$_POST[birthday]', u_mobile='$_POST[mobile]', u_education='$_POST[education]' WHERE u_id='$_POST[id]'");
        echo mysqli_error($conn);
    }
    ?>
     <?php

    if(isset($_GET["id"])){
       
       $result = mysqli_query($conn, "SELECT * FROM users WHERE u_id=$_GET[id]");
    $row = mysqli_fetch_array($result);
    }
       ?>
        
        
    <form method="post">
     اسم الطالبه	 :
        <input type="hidden" name="id" value="<?= $row["u_id"]?>" >
        <br>
        <input type="text" name="fullname" required value="<?= $row["u_fullname"]?>"><br>
                <hr>
    الايميل :
         <br>
        <input name="cmail" type="email" value="<?= $row["u_email"]?>">
        <hr>
         
        الحي
         <br>
        <input name="neighborhood	" type="text" value="<?= $row["u_neighborhood"]?>">
                <hr>
          
       تاريخ الميلاد
         <br>
        <input name="birthday" type="text" value="<?= $row["u_birthday"]?>">
                <hr>
          
       الرقم الجوال
         <br>
        <input name="mobile" type="text" value="<?= $row["u_mobile"]?>">
                <hr>
         
         الموهل العلمي
         <br>
        <input name="education" type="text" value="<?= $row["u_education"]?>">
                <hr>
         <br>
        
        <input type="submit" value="تعديل">
        
    
    </form>
     <input type="submit" value="تعديل">
     <hr>
    <a href="del.php?id=<?= $row["u_id"]?>" style="color:red" onclick="return confirm('هل انت متأكد من حذف  <?= $row["u_fullname"]?>؟ ')">حذف</a>
     
    
    
</body>
</html>