<?php include("conn.php");?>
<!DOCTYPE html>
<html>
<head>
    <title> الحي المتعلم </title>
	 
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
    <form method="post">
        
        <table style="margin-right:10px;">
            <tr>
            <td> <label for="ce_name" style="text-align:right;"> اسم المركز :</label></td><td><input  class="form-control" type="text" name="ce_name" required > </td>
            </tr>       
                
            <tr>
            <td> <label for="ce_location" style="text-align:right;">الحي :</label ></td><td><input class="form-control" name="ce_location" type="text"  ></td>
            </tr>
            
         <tr>
            <td><label for="ce_manger">اسم المديره :</label><br></td><td> <input  class="form-control" name="ce_manger" type="text"  ></td>
            </tr> 
            
            <tr>
                   
            </tr>
            
    </table>
    <div style="background-color:#eee; padding:10px; margin-top:150px;">
     <center>
        <input class="btn btn-md btn-outline-success" type="submit" class="form-control" name="submit" value="اضافه">
         
         
        
    </center>
    </div>
      
    <?php
        
     
        
    if(isset($_POST["submit"])){
        
        $fullname = $_POST["ce_name"];
        $ce_location = $_POST["ce_location"];
        $ce_manger = $_POST["ce_manger"];
        
                
         mysqli_query($conn,"INSERT INTO center (ce_name,ce_location,ce_manger) VALUES ('$_POST[ce_name]','$_POST[ce_location]','$_POST[ce_manger]')")
            or die(mysqli_error($conn));
        ?>
    <script>
    
    alert("تم اضافة  المركز بنجاح")
    </script>
    <?php
    }
    
    ?>
    </form>

    </div>
    
    
    
</body>
</html>