 <?php include("conn.php");?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include("head.php");?>

    <meta charset="UTF-8">

    <style>
        tr{
            width:80%;
        }
    </style>
</head>
<body dir="rtl">
     <?php include("header.php");?>

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
        <td> <label for="fullname" style="text-align:right;">اسم الدورة 	 :</label></td><td><text > '.$row["co_name"].' </text></td>
        </tr>       
        
            
        <tr>
        <td> <label for="cmail" style="text-align:right;">تفاصيل الدورة :</label ></td><td><text > '.$row["co_details"].' </text> </td>
        </tr>
        

        <tr>
        <td> <label for="neighborhood" style="text-align:right;">عدد الساعات :</label></td><td> <text > '.$row["co_hours"].' </text></td>
        </tr>
            
            <tr>
            <td><label for="mobile">إسم المدرب :</label><br></td><td> <text > '.$row["lecturer_name"].' </text> </td>
            </tr> 
            
             <ul> ';
             $result = mysqli_query($conn, "SELECT * FROM classes WHERE co_id= ".$row["co_id"] ."");
             while($row2 = mysqli_fetch_array($result)){
             echo' 
                 <tr>
                <td><label for="mobile">البدايه :</label><br></td><td> <text > '.$row2["c_start"].' </text> </td>
                </tr>
                <tr>
                <td><label for="mobile">النهايه :</label><br></td><td> <text > '.$row2["c_end"].' </text> </td>
                </tr> 
            ';
             }
           echo '</ul>
            
            
                 
        
       

</table>
        </div>

    </form>

    '; 
        }

    ?>

     
    
    </div>
</body>
</html>