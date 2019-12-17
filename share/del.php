<?php include("conn.php");?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
</head>
<body class="rtl"> 
 
    
     <?php

    if(isset($_GET["id"])){
       
       $result = mysqli_query($conn, "DELETE  FROM users WHERE u_id=$_GET[id] ");
         
        ?>
         <script>
    
    alert("تم اضافة الحذف بنجاح")
    </script>
    <?php
     }
       ?>
        
     
</body>
</html>