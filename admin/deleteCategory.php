<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>
<?php
    if(isset($_GET['delete_Category'])){
        $delete_id =$_GET['delete_Category'];
        // echo $delete_id;


        //delete Query

        $delete_query ="DELETE FROM `categories` WHERE category_id =$delete_id ";
        $result_query =mysqli_query($connection,$delete_query);
        if($result_query){
            echo "<script>alert('Category Delete SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?viewCategroy','_SELF')</script>";
        }


    }

?>