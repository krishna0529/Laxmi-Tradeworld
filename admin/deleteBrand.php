<?php
include('../database/conn.php');
// include('./Function/commonF.php');


?>
<?php
    if(isset($_GET['delete_brand'])){
        $delete_id =$_GET['delete_brand'];
        // echo $delete_id;


        //delete Query

        $delete_query ="DELETE FROM `brands` WHERE brand_id =$delete_id ";
        $result_query =mysqli_query($connection,$delete_query);
        if($result_query){
            echo "<script>alert('Brand Delete SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?viewbrand','_SELF')</script>";
        }


    }

?>