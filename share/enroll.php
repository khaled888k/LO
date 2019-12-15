 <?php 
include("conn.php");?>
 <html>

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

     <?php include("header.php");?>

     <br><br>


     <br>
     <div class="container">
         <style>
             background-image: url("img/header.jpg");
             background-color: #cccccc;

         </style>

         <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="img/download.png">

         <br><br>





         <main role="main">



             <div class="album py-5 bg-light">
                 <div class="container">

                     <div class="row" dir="rtl">
<?php
                             if(isset($_GET["cid"]) AND isset($_SESSION["id"])){
                        $result2 = mysqli_query($conn, "SELECT * FROM rigster WHERE u_id = $_SESSION[id] AND c_id=$_GET[cid]");
                         if(mysqli_num_rows($result2) > 0){
                             
                          
                 ?>            // رسالة تم التسجيل مسبقا
<script>
    
    alert("تم االتسجيل  بالدورة بنجاح")
    </script>
    <?php
    }
    
    
                        
                         }else{
                             
 $q = "INSERT INTO rigster (u_id, c_id ) VALUES ( '$_SESSION[id]', '$_GET[cid]' )";
      $result = mysqli_query( $conn,$q );
                                 ?>
                                  <script>
                                      alert("تم التسجيل مسبقا") 
                                      </script>
          <?php
                         }
?>
                     </div></div></div></main></div></body></html>