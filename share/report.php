<?php include("header.php");?>
<?php include("conn.php");?>
<!DOCTYPE html>
<html >
<head>
	 <title> الحي المتعلم </title>
	 
    
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
    
<body  dir="rtl">
    
	<br><br>
    
     
    <br>
     <div class="container" >
        <style>
         background-image: url("img/header.jpg");
 background-color: #cccccc;
        </style>
            
     <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="download.png">

    <br><br> 
    
     
    
      
<select  class="btn btn-secondary my-2">
     <option    value="   ">    المركز 1  </option>
     <option    value="   ">       المركز 2   </option>
</select>

     <?php

    if(isset($_GET["id"])){
       
       $result = mysqli_query($conn, "SELECT * FROM users WHERE u_id=$_GET[id] ");
    $row = mysqli_fetch_array($result);
    }
       ?>
         
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
								<tr>
									<td class="column1">ريم علي جعفر</td>
									<td class="column2">1234567890</td>
									<td class="column3">2019/9/20</td>
									<td class="column4">طبخ</td>
									<td class="column5"> <button > <a href="update.php?id=<?=$row["u_id"]?>"> تعديل</a></button></td>
									<td class="column6" > <a href="sertif.html" target="_blank"> طباعه الشهادة</a></td>
                                   
								</tr>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
 
    </div>
	 
</body>
</html>