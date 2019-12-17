<?php include("conn.php");?>
<!DOCTYPE html>
<html >
<head>
	 <title> الحي المتعلم </title>
	 
    <?php include("head.php");?>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     .limiter{
       
     }
     table {
  font-family: arial, sans-serif;
  border-collapse:  ;
  width: auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
     .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     
</head>
    
<body  class="rtl">
         <?php include("header.php");?>

	<br><br>
    
     
    <br>
     <div class="container" >
        <style>
         background-image: url("img/header.jpg");
 background-color: #cccccc;
        </style>
            
     <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="img/download.png">

    <br><br> 
    
     
    <a class="btn btn-md btn-outline-success"  target="_blank" href="addcenter.php"> اضافة المركز</a>
      
<select  class="btn btn-secondary my-2" onchange="location='?ce_id='+value">
            <option value="">اختر المركز</option>

    <?php
    
           $result = mysqli_query($conn, "SELECT * FROM center");

    while($row = mysqli_fetch_assoc($result)){
        $selected = "";
        if($row["ce_id"] == @$_GET["ce_id"]){
                $selected = "selected=selected";
        }
    ?>

         <option <?= $selected ?> value="<?= $row["ce_id"] ?>"><?= $row["ce_name"] ?></option>
    
    <?php
    }
    
    ?>
     

</select>
    

     
          <a class="btn btn-md btn-outline-success"  target="_blank" href="addcourses.php"> اضافة الدورات</a> 
         
          
                         
	</div>
 
     
	 
</body>
</html>