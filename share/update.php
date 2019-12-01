s<?php include("conn.php");?>

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

<div class="container-fluide" >
    <?php
    
    if(isset($_POST['update'])){
        
        $q = "UPDATE users SET u_fullname = '".$_POST['fullname']."', u_email= '".$_POST['cmail']."' , u_neighborhood= '".$_POST['neighborhood']."', u_birthday= '".$_POST['birthday']."', u_mobile= '".$_POST['mobile']."', u_education='".$_POST['education']."' WHERE u_id= '".$_POST['id']."'";
        mysqli_query($conn, $q);
        echo mysqli_error($conn);
    }
    ?>

     <?php

    if(isset($_GET["id"])){
       
    $result = mysqli_query($conn, "SELECT * FROM users WHERE u_id= $_GET[id]");
    $row = mysqli_fetch_array($result);
    echo'
    <br><br><br><br>
    <form method="post" role="form">
    

        <input class="form-control" type="hidden" name="id" value="'.$row["u_id"].'" >

        
        <table style="margin-right:10px;">
            <tr>
            <td> <label for="fullname" style="text-align:right;">اسم الطالبه	 :</label></td><td><input  class="form-control" type="text" name="fullname" required value="'.$row["u_fullname"].'"><br></td>
            </tr>       
            
                
            <tr>
            <td> <label for="cmail" style="text-align:right;">الايميل :</label ></td><td><input class="form-control" name="cmail" type="email" value="'.$row["u_email"].'"></td>
            </tr>
            

            <tr>
            <td> <label for="neighborhood" style="text-align:right;">الحي :</label></td><td><input  class="form-control"name="neighborhood" type="text" value="'.$row["u_neighborhood"].'"></td>
            </tr>
                
                
            <tr>
            <td> <label for="birthday">تاريخ الميلاد :</label></td><td> <input  name="birthday" class="form-control" type="text" value="'.$row["u_birthday"].'"></td>
            </tr> 
        
            
        
        
            <tr>
            <td><label for="mobile">الرقم الجوال :</label><br></td><td> <input  class="form-control" name="mobile" type="text" value="'.$row["u_mobile"].'"></td>
            </tr> 

            <tr>
            <td><label for="education"> الموهل العلمي :</label><br></td><td> <input  class="form-control" name="education" type="text" value="'.$row["u_education"].'"></td>
            </tr> 
            
            
            
            <tr>
             
            ';
             $result = mysqli_query($conn, "select courses.co_name from courses , users , rigster where users.u_id = rigster.u_id and courses.co_id = rigster.c_id and users.u_id = ".$row["u_id"] ."");
             while($row2 = mysqli_fetch_array($result)){
             echo' 
                 
                 <td><label for="education"> الدورات :</label><br></td><td> <input  class="form-control" name="education" type="text" value="'.$row2["co_name"].'"></td>
            ';
             }
           echo '
                    
            </tr>
            
            
           

    </table>
    <div style="background-color:#eee; padding:10px; margin-top:150px;">
     <center>
        <input class="btn btn-md btn-outline-success" type="submit" class="form-control" name="update" value="تعديل">
         
        <a class="btn btn-md btn-outline-success" href="del.php?id='.$row["u_id"].'" style="color:red" onclick="return confirm(' .$row["u_fullname"].')">حذف</a>
        
        
         

         
    </center>
    </div>
    </form>

    '; 
        }

    ?>

     
    
    </div>
</body>
</html>