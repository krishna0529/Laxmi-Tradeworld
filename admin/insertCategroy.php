<?php
include('../database/conn.php');
// include('./Function/commonF.php');
if (isset($_POST['Insert_cat'])) {
    $category_title = $_POST['cat_title'];

    //select data from database
    $select_query =  "SELECT * FROM `categories` WHERE category_tittle='$category_title'";
    $result_select = mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Categories are all ready Insert The Categories and database')</script>";
    } else {




        $insert_query = "INSERT INTO `categories`(`category_id`, `category_tittle`) VALUES ('','$category_title')";
        $result_insert = mysqli_query($connection, $insert_query);
        if ($result_insert) {
            echo "<script>alert('Category has Inserted Successfully')</script>";
        }
    }
}


?>



<h2 class="text-center">Insert Categories</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Category" autocomplete="off" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 ">

        <input type="Submit" class=" bg-success text-light border-1 p-2 m-2" name="Insert_cat" value="Insert Category">
        <!-- <button class=" bg-success text-light p-2 my-3 border-1">Insert Category</button> -->
    </div>

</form>