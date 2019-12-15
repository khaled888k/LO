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
            <td> <label for="co_name" style="text-align:right;">اسم الدوره :</label></td><td><input  class="form-control" type="text" name="co_name" required ><br></td>
            </tr>       
                
            <tr>
            <td> <label for="co_details" style="text-align:right;">تفاصيل الدوره :</label ></td><td><input class="form-control" name="co_details" type="text" required  ></td>
            </tr>
            
         <tr>
            <td><label for="course_image">اضافة الصوره :</label><br></td><td> <input  class="form-control" name="course_image" type="file" required ></td>
            </tr> 
               <tr>
            <td> <label for="co_hours">ساعات الدوره	 :</label></td><td> <input  name="co_hours" class="form-control" type="number"  required></td>
            </tr> 
        
            <tr>
            <td><label for="lecturer_name"> اسم المدربه :</label><br></td><td> <input  class="form-control" name="lecturer_name" type="text" required ></td>
            </tr> 
            
<?php
    
    if(isset($_POST['submit'])){
        
        
                   $qw = "INSERT INTO classes (c_start, c_end ) VALUES ( '$_POST[c_start]', '$_POST[c_end]' )";
        mysqli_query($conn, $qw);
        echo mysqli_error($conn);
          
       
        
    }
    
    ?> 
            <tr>
            <td><label for="c_start"> تاريخ البدايه :</label><br></td><td> <input  class="form-control" name="c_start" type="date" required ></td>
            </tr> 
            
            
            <tr>
            <td><label for="c_end"> تاريخ النهايه :</label><br></td><td> <input  class="form-control" name="c_end" type="date" required ></td>
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