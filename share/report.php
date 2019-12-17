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
         <?php 
      include("header.php");
if(@$_SESSION["type"] != "Admin"){
    exit();
}
      ?>

	<br><br>
    
     
    <br>
     <div class="container" >
        <style>
         background-image: url("img/header.jpg");
 background-color: #cccccc;
        </style>
            
     <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="img/download.png">

    <br><br> 
    
     
    
      
<select  class="btn btn-secondary my-2" onchange="location='?ce_id='+value">
            <option value="">اختر المركز</option>

    <?php
    
           $result = mysqli_query($conn, "SELECT  * FROM classes cl, courses co, center ce  WHERE  ce.ce_id = cl.ce_id AND co.co_id = cl.co_id AND ce.ce_manger=$_SESSION[id] ORDER BY ce_name DESC LIMIT 0, 1 ");

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

     <?php if(isset($_GET["ce_id"])){ ?>
         
<select  class="btn btn-secondary my-2" onchange="location='?ce_id=<?= $_GET["ce_id"] ?>&c_id='+value">
     <option value="">  اختر الدورات  </option>
    
    <?php
    
           $result = mysqli_query($conn, "SELECT * FROM classes c , center ce, courses co WHERE ce.ce_id=c.ce_id AND c.co_id = co.co_id AND c.ce_id = $_GET[ce_id]");
    while($row = mysqli_fetch_assoc($result)){
          $selected = "";
        if($row["c_id"] == @$_GET["c_id"]){
                $selected = "selected=selected";
        }
    ?>
         <option <?= $selected ?> value="<?= $row["c_id"] ?>"><?= $row["co_name"] ?></option>
    
    <?php
    }
    
    ?>
    
    

</select>
         
         <?php } ?>
         
          <?php if(isset($_GET["c_id"])){ ?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">اسم الطالبه</th>
								<th class="column2"> رقم السجل </th>
								<th class="column3"> التاريخ </th>
								<th class="column4">  الدورات </th>
								<th class="column5"> تعديل </th>
								<th class="column6"> الشهادات </th>
                                
							</tr>
						</thead>
						<tbody>
                            
                             
     <?php

    
       
       $result = mysqli_query($conn, "SELECT * FROM classes c , users u, rigster r  WHERE r.c_id = c.c_id AND u.u_id = r.u_id AND r.c_id = $_GET[c_id]");
      while($row = mysqli_fetch_array($result)){
       echo' 
        <tr> 
          <td> '.$row['u_fullname'] .'</td>
          <td> '.$row['u_id_number'].'</td>
          <td> '.$row['u_birthday'] .'</td>
          <td style="text-align:right;"> 
            <ul> ';
             $result = mysqli_query($conn, "select courses.co_name from courses , users , rigster where users.u_id = rigster.u_id and courses.co_id = rigster.c_id and users.u_id = ".$row["u_id"] ."");
             while($row2 = mysqli_fetch_array($result)){
             echo' 
                <li>'.$row2["co_name"].'</li>
            ';
             }
           echo '</ul>
          </td>          
          <td class="column5"><a class="btn btn-md btn-outline-success"  target="_blank" href="update.php?id='.$row["u_id"].'"> تعديل</a></td>
          <td class="column6" ><a class="btn btn-md btn-outline-success"  target="_blank" href="sertif.php?id='.$row['u_id'].'"> طباعه الشهادة</a></td>
         </tr>
         ';
         ?>
  <?php  }
    
        ?>                    
								 
                       <?php } ?>     
                            
                            
                            
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
 
    </div>
	 
</body>
</html>