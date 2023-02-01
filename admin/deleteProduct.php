<?php

include('../database/conn.php');
// include('./Function/commonF.php');

?>

<?php
    if(isset($_GET['delete_product'])){
        $delete_id =$_GET['delete_product'];
        // echo $delete_id;


        //delete Query

        $delete_query ="DELETE FROM `product` WHERE product_id =$delete_id ";
        $result_query =mysqli_query($connection,$delete_query);
        if($result_query){
            echo "<script>alert('Product Delete SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?viewProduct','_SELF')</script>";
        }


    }

?>