<?php include("header.php");?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">

    <style>
        tr{
            width:80%;
        }
    </style>
</head>
<body dir="rtl">

<div class="container-fluide" style="margin-top:50px;">

     <?php

    if(isset($_GET["co_id"])){
       
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE co_id= $_GET[co_id]");
    $row = mysqli_fetch_array($result);
    echo'
    <br><br>
    <div style="width:100% ; height:50px; background-color:#EEE; border-radius:5px 5px 0px 0px; text-align:center; margin:10px;" >
     معلومات الدورة
    </div>
    <form method="post" role="form">
    
        <div style="float:left; margin-left:10%;" >
          <img src="img/'.$row["course_image"].'">
        </div>
        <div style="float:right; margin-right:10%;" >
        <table style="margin-right:10px;">
        <tr>
        <td> <label for="fullname" style="text-align:right;">اسم الدورة 	 :</label></td><td><input  class="form-control" type="text" name="fullname" required value="'.$row["co_name"].'"></td>
        </tr>       
        
            
        <tr>
        <td> <label for="cmail" style="text-align:right;">تفاصيل الدورة :</label ></td><td><input class="form-control" name="cmail" type="email" value="'.$row["co_details"].'"></td>
        </tr>
        

        <tr>
        <td> <label for="neighborhood" style="text-align:right;">عدد الساعات :</label></td><td><input  class="form-control"name="neighborhood" type="text" value="'.$row["co_hours"].'"></td>
        </tr>
            
        <tr>
        <td><label for="mobile">إسم المدرب/ه</label><br></td><td> <input  class="form-control" name="mobile" type="text" value="'.$row["lecturer_name"].'"></td>
        </tr> 
        
       

</table>
        </div>

    </form>

    '; 
        }

    ?>

     
    
    </div>
</body>
</html>