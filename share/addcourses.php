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
<body class="rtl">
    <?php include("header.php");?>

<div class="container-fluide" >
    <form method="post" role="form">
    <?php
    
    if(isset($_POST['submit'])){
        
        
            $q = "INSERT INTO courses(co_name,co_details,course_image,co_hours,lecturer_name) VALUES('$_POST[co_name]','$_POST[co_details]','$_POST[course_image]','$_POST[co_hours]','$_POST[lecturer_name]')";
    
        mysqli_query($conn, $q);
        echo mysqli_error($conn);
          
      ?>
    <script>
    
    alert("تم اضافة دورة  بنجاح")
         
    </script>
         
    <?php
        
    }
    
    ?> 
    <br><br><br><br>
    
    
        <table style="margin-right:10px;">
            <tr>
            <td> <label for="co_name" style="text-align:right;">اسم 	 :</label></td><td><input  class="form-control" type="text" name="co_name" required ><br></td>
            </tr>       
                
            <tr>
            <td> <label for="co_details" style="text-align:right;">دوره :</label ></td><td><input class="form-control" name="co_details" type="text"  ></td>
            </tr>
            
         <tr>
            <td><label for="course_image">اضافة الصوره :</label><br></td><td> <input  class="form-control" name="course_image" type="file"  ></td>
            </tr> 
               <tr>
            <td> <label for="co_hours">الساعات :</label></td><td> <input  name="co_hours" class="form-control" type="number"  ></td>
            </tr> 
        
            <tr>
            <td><label for="lecturer_name"> اسم المدربه :</label><br></td><td> <input  class="form-control" name="lecturer_name" type="text"  ></td>
            </tr> 
            
            <tr>
                   
            </tr>
            
    </table>
    <div style="background-color:#eee; padding:10px; margin-top:150px;">
     <center>
        <input class="btn btn-md btn-outline-success" type="submit" class="form-control" name="submit" value="اضافه">
         
         
        
    </center>
    </div>
    

        
        
 </form>
     </div>
</body>
</html>