<?php include("header.php");?>
<!DOCTYPE html>
<html>

<?php
if(isset($_GET["update_attendanse"])){
    echo 'alert("called")';
       if($_POST["state"] == true){
            $result = mysqli_query($conn, "update rigster set is_present = false WHERE u_id= $_POST[u_id]");
            echo 'alert("falsed")';
       }else{
            $result = mysqli_query($conn, "update rigster set is_present = true WHERE u_id= $_POST[u_id]");
            echo 'alert("trued")';
       }
       header("location:attendence.php");
}
?>

<head>
   <title> الحي المتعلم </title>
 
    <script type="text/javascript">
       function get_statues(us_id){
        <?php
            $user_id = 1;
            echo'alert("'.$user_id.'")';
            $q = "SELECT u_fullname FROM users where u_id = '$user_id'";
            $result = mysqli_query( $conn,$q );
            $row = mysqli_fetch_array($result);
            echo'alert("'.$row["u_fullname"].'")';
        ?>
       }
    </script>
    <style>
        table.GeneratedTable {
  width: 25%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 5px;
  border-color: #000000;
  border-style: solid;
  padding: 3px;
}

table.GeneratedTable thead {
  background-color: #808080;
}
</style>
</head>

<body dir="rtl">


    <header>
       <?php include("header.php");?>

    </header>
    <br><br><br><br>
     <div class="container" >
        <style>
         background-image: url("header.jpg");
 background-color: #cccccc;
        </style>
            
     <img class="bd-placeholder-img card-img-top" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="img/download.png">
<div class="container-table100">
 <div class="wrap-table100">
  <div class="table100" >
    <table class="GeneratedTable">
        <thead>

            <tr>
                <th>رقم الطالبه</th>
                <th>اسم الطالبه</th>
                <th>حاضر؟</th>
                <th>تحضير</th>

            </tr>
        </thead>
        <tbody >

            <div class="group">
                <label for="user" class="label"> اسم المدربة: </label>
                <?php 
                    $q = "SELECT lecturer_name FROM courses where co_id = ".$_GET["course_id"]."";
                    $result = mysqli_query( $conn,$q );
                    $row = mysqli_fetch_array($result);
                    echo '<input id="user" type="text" class="input" value = "'.$row["lecturer_name"].'">';  
                ?>
            </div>
            <div class="group">
                <label for="user" class="label"> اسم الدوره: </label>
                <?php 
                    $q = "SELECT co_name FROM courses where co_id = ".$_GET["course_id"]."";
                    $result = mysqli_query( $conn,$q );
                    $row = mysqli_fetch_array($result);
                    echo '<input id="user" type="text" class="input" value = "'.$row["co_name"].'">';  
                ?>              
            </div>

            <br>
            <?php
                
                $q = "SELECT users.u_id, users.u_fullname, rigster.is_present FROM users ,courses , rigster  where  courses.co_id = rigster.c_id and  users.u_id = rigster.u_id and rigster.c_id = ".$_GET["course_id"]."";
                $result = mysqli_query( $conn,$q );
                while($row = mysqli_fetch_array($result)){
                    echo '  
                        <tr>
                            <td >'.$row["u_id"].'</td>
                            <td >'.$row["u_fullname"].'</td>
                            <td>
                                <!-- Material checked -->
                                <div class="form-check" width="300px">    
                                    <label class="form-check-label" for="is_presentCheckBox">حاضر</label>   
                                    <input type="checkbox" class="form-check-input" id="is_presentCheckBox" onClick="get_statues('.$row["u_id"].')"'; if($row["is_present"]== 1) echo 'checked'; echo '>
                                </div>
                            </td>
                            <td>
                                    <a name="update_attendanse" href="change_attendanse.php?u_id='.$row['u_id'].'&state='.$row['is_present'].'&course_id='.$_GET['course_id'].'" class="btn btn-md btn-outline-success" >تغيير</a>
                            </td>     
                        </tr>                 
                    ';
                }
            ?>


        </tbody>
      </table>
     </div>
    </div>
    </div>
    </div>
    <br/>
    <div class="container" style="border:1px solid #ddd; padding:5px 0px 5px 0px; background-color:#eee;">
                <center>
                    <a class="btn btn-md btn-outline-success" href="#">save</a>
                </center>
    </div>

    <br/><br/><br/>
</body>

</html>