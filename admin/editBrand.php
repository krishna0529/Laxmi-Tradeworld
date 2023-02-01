<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>


<?php

if(isset($_GET['edit_brand'])){
    $edit_brand =$_GET['edit_brand'];
    


    $get_brand ="SELECT * FROM `brands` WHERE brand_id=$edit_brand";
    $result =mysqli_query($connection,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_tittle=$row['brand_tittle'];
    // echo "$category_tittle";
}

//update brand

if(isset($_POST['edit_brand'])){
    $brands_title =$_POST['category_tittle'];

    $update_brand ="UPDATE  `brands` SET brand_tittle='$brands_title' WHERE  brand_id='$edit_brand'";
    $result_brand =mysqli_query($connection,$update_brand);
    if($result_brand){
        echo "<script>alert('Update Brands Successfully')</script>";
        echo "<script>window.open('./Adashboard.php?viewbrand','_SELF')</script>";
    }
}

?>



<div class="container mt-3">
    <h1 class="text-center">Edit brands</h1>
    <form action="" method="POST" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_tittle" class="form-label">Brand Tittle</label>
            <input type="text" name="category_tittle"  value='<?php echo $brand_tittle; ?>'id="category_tittle" class="form-control " required="required">
        </div>
        <input type="submit" value="Update Category" class="btn btn-success px-3 mb-3 " name="edit_brand">
    </form>
</div>