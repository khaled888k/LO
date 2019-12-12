<?php 
include("conn.php");
//require("includes\login.inc.php");
?>

<html lang="en" dir="rtl">

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

    </style>

</head>

<body class="rtl">
    <?php 
      include("header.php");
if(@$_SESSION["type"] != "Admin"){
    exit();
}
      ?>
     

    <br>
     <div class="container" >
        <style>
         background-image: url("img/header.jpg");
 background-color: #cccccc;
        </style>
            
     <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="img/download.png">

    <br><br> 
    
     
    
                        <a   class="btn btn-md btn-outline-success"  target="_blank" href="add2.php?course_id='.$row['co_id'].'">اضافة الدوارت او المركز</a>

                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row" dir="rtl">



                            <?php
      $q = "SELECT * FROM classes cl, courses co, center ce WHERE  ce.ce_id = cl.ce_id AND co.co_id = cl.co_id AND ce.ce_manger=$_SESSION[id]";
      $result = mysqli_query($conn, $q)or die(mysqli_error($conn));;

      while($row = mysqli_fetch_array($result)){
        echo ' 
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="img/'.$row["course_image"].'" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">'.$row["co_name"].'</text>
                  <div class="card-body">
                    <div class="navbar-nav mr-auto">
                      <div class="btn-group">
                        <a   class="btn btn-sm btn-outline-secondary" href="attendence.php?course_id='.$row['co_id'].'">تحضير</a>
                        <a   class="btn btn-sm btn-outline-secondary" href="report.php?course_id='.$row['co_id'].'"> تقارير شامله</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        ';
      }


    ?>


                        </div>
                    </div>
                </div>
           
    </div>

    <footer class="text-muted">
        <div class="container">
            <div class="smallfont" align="center">
                <a href="#top" onclick="self.scrollTo(0, 0); return false;" style=""><br> الأعلى <br></a>
            </div>
        </div>
    </footer>
    <br><br><br><br><br><br>
</body>

</html>
