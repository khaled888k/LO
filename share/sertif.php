
<?php include("conn.php");?>

<!DOCTYPE html>
<html>
<head>
    <title> الحي المتعلم </title>

    <meta charset="UTF-8">
</head>
<body class="rtl">
    
    <div class="container"> 
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
       
       $q = "SELECT * FROM users WHERE u_id = ".$_GET["id"]."";
       $result = mysqli_query($conn, $q);
       $row = mysqli_fetch_array($result);
    
       echo'
       <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
       <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px;ادارة المركز font-weight:bold">شهادة  دورة</span>
       <br><br>
       <span style="font-size:25px"><i>تشهد ادارة الحي المتعلم بأن الطالبة</i></span>
       <br><br>
       <span style="font-size:30px ;"><b style="color:red;">'.$row['u_fullname'].'</b> اسم الطالبة:</span><br/><br/>
       <span style="font-size:25px"><i>قد حضرت دورة/دورات بعنوان</i>';
            $result = mysqli_query($conn, "select courses.co_name from courses , users , rigster where users.u_id = rigster.u_id and courses.co_id = rigster.c_id and users.u_id = ".$row["u_id"] ."");
            while($row = mysqli_fetch_array($result)){
            echo' 
                <li style="color:red; text-decoration:none;">'.$row["co_name"].'</li>
            ';
            }
        echo '
       </span> 
       <span style="font-size:20px">وبناء على ذلك منحت هذه الشهاده </span>
       <span style="font-size:25px"><i>الختم</i></span><br> <br>  <br> <br>  
     
      <span style="font-size:30px">ادارة الحي المتعلم</span>
      ';
    }
      ?>
</div>
</body>
</html>