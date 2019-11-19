<?php include("header.php");?>
<?php include("conn.php");?>

<!DOCTYPE html>
<html>
<head>
    <title> الحي المتعلم </title>

    <meta charset="UTF-8">
</head>
<body>
    <br>
    <br>
    <br>
     <?php
    
    if(isset($_POST["u_fullname"])){
        
        mysqli_query($conn, "UPDATE users SET u_fullname='$_POST[name]' WHERE u_id='$_POST[id]'");
        echo mysqli_error($conn);
    }
    ?>
     <?php

    if(isset($_GET["id"])){
       
       $result = mysqli_query($conn, "SELECT * FROM users WHERE u_id=$_GET[id]");
    $row = mysqli_fetch_array($result);
    }
       ?>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px;ادارة المركز font-weight:bold">شهادة  دورة</span>
       <br><br>
       <span style="font-size:25px"><i>تشهد ادارة الحي المتعلم بأن الطالبة</i></span>
       <br><br>
       <span style="font-size:30px"><b> اسم الطالبة:</b><?=$row['u_fullname']?></span><br/><br/>
       <span style="font-size:25px"><i>قد حضرت دورة بعنوان</i></span> 
       <span style="font-size:30px">عنوان الدورة</span> <br/><br/>
       <span style="font-size:20px">وبناء على ذلك منحت هذه الشهاده </span>
        <span style="font-size:25px"><i>الختم</i></span><br> <br>  <br> <br>  
     
      <span style="font-size:30px">ادارة الحي المتعلم</span>
</div>
</div>
</body>
</html>