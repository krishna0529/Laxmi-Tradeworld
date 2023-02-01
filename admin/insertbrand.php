<?php
include('../database/conn.php');
// include('./Function/commonF.php');

if (isset($_POST['Insert_cat'])) {
    $brand_tittle = $_POST['cat_title'];

    //select data from database
    $select_query =  "SELECT * FROM `brands` WHERE brand_tittle='$brand_tittle'";
    $result_select = mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Brand are all ready Insert The Brand and database')</script>";
    } else {




        $insert_query = "INSERT INTO `brands`(`brand_id`, `brand_tittle`) VALUES ('','$brand_tittle')";
        $result_insert = mysqli_query($connection, $insert_query);
        if ($result_insert) {
            echo "<script>alert('Brand has Inserted Successfully')</script>";
        }
    }
}


?>

<h2 class="text-center">Insert Brand</h2>

<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Brand" aria-label="Brand" autocomplete="off" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 ">

        <input type="Submit" class=" bg-success text-light border-1 p-2 m-2" name="Insert_cat" value="Insert Brand" >
        <!-- <button class=" bg-success text-light p-2 my-3 border-1">Insert Brand</button> -->
    </div>

</form>