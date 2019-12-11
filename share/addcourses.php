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

<div class="container-fluide" >
    <?php
    
    if(isset($_POST['INSERT'])){
        
        
            $q = "INSERT INTO courses(co_name,co_details,co_hours,lecturer_name) VALUES('$_POST[co_name]','$_POST[co_details]','$_POST[co_hours]','$_POST[lecturer_name]')";
    
        mysqli_query($conn, $q);
        echo mysqli_error($conn);
         
    }
    ?>

     <?php
  
    $result = mysqli_query($conn, "SELECT * FROM courses");
    $row = mysqli_fetch_array($result);
    echo'
    <br><br><br><br>
    <form method="post" role="form">
    
        <table style="margin-right:10px;">
            <tr>
            <td> <label for="co_name" style="text-align:right;">اسم 	 :</label></td><td><input  class="form-control" type="text" name="co_name" required value="'.$row["co_name"].'"><br></td>
            </tr>       
                
            <tr>
            <td> <label for="co_details" style="text-align:right;">دوره :</label ></td><td><input class="form-control" name="co_details" type="text" value="'.$row["co_details"].'"></td>
            </tr>
            
         <tr>
            <td><label for="course_image">اضافة الصوره :</label><br></td><td> <input  class="form-control" name="image" type="imger" value="'.$row["course_image"].'"></td>
            </tr> 
            <tr>
            <td> <label for="co_hours">الساعات :</label></td><td> <input  name="co_hours" class="form-control" type="number" value="'.$row["co_hours"].'"></td>
            </tr> 
        
            <tr>
            <td><label for="lecturer_name"> اسم المدربه :</label><br></td><td> <input  class="form-control" name="lecturer_name" type="text" value="'.$row["lecturer_name"].'"></td>
            </tr> 
            
            <tr>
             
            ';
             $result = mysqli_query($conn, "select courses.co_name from courses , users , rigster where users.u_id = rigster.u_id and courses.co_id = rigster.c_id and users.u_id = ".$row["co_id"] ."");
             while($row2 = mysqli_fetch_array($result)){
             echo' 
                 
                 <td><label for="education">  الدورات  الحاليه:</label><br></td><td> <input  class="form-control" name="education" type="text" value="'.$row2["co_name"].'"></td>
            ';
             }
           echo '
                    
            </tr>
            
    </table>
    <div style="background-color:#eee; padding:10px; margin-top:150px;">
     <center>
        <input class="btn btn-md btn-outline-success" type="submit" class="form-control" name="INSERT" value="اضافه">
         
         
        
    </center>
    </div>
    </form>

    '; 
        

    ?>
 
     </div>
</body>
</html>