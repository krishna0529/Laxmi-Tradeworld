<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>


<?php

if(isset($_GET['edit_Category'])){
    $edit_category =$_GET['edit_Category'];
    


    $get_category ="SELECT * FROM `categories` WHERE category_id=$edit_category";
    $result =mysqli_query($connection,$get_category);
    $row=mysqli_fetch_assoc($result);
    $category_tittle=$row['category_tittle'];
    // echo "$category_tittle";
}

//update Category

if(isset($_POST['edit_category'])){
    $cat_title =$_POST['category_tittle'];

    $update_category ="UPDATE  `categories` SET category_tittle='$cat_title' WHERE  category_id='$edit_category'";
    $result_category =mysqli_query($connection,$update_category);
    if($result_category){
        echo "<script>alert('Update Category Successfully')</script>";
        echo "<script>window.open('./Adashboard.php?viewCategroy','_SELF')</script>";
    }
}

?>



<div class="container mt-3">
    <h1 class="text-center">Edit Categories</h1>
    <form action="" method="POST" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_tittle" class="form-label">Category Tittle</label>
            <input type="text" name="category_tittle"  value='<?php echo $category_tittle; ?>'id="category_tittle" class="form-control " required="required">
        </div>
        <input type="submit" value="Update Category" class="btn btn-success px-3 mb-3 " name="edit_category">
    </form>
</div>