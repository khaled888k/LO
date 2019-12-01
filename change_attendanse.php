

<?php include("conn.php");?>
<?php
if(isset($_GET["u_id"])){
       if($_GET["state"] == true){
            $result = mysqli_query($conn, "update rigster set is_present = false WHERE u_id= $_GET[u_id]");
            echo "falsed";
       }else{
            $result = mysqli_query($conn, "update rigster set is_present = true WHERE u_id= $_GET[u_id]");
            echo "trued";
       }
       $c_id = $_GET["course_id"];
       header("location:attendence.php?course_id=$c_id");
}
?>