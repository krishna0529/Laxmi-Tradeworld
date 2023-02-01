<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>
<?php

if (isset($_GET['edit_product'])) {
    $edit_id = $_GET['edit_product'];
    $get_Data = "SELECT * FROM `product` WHERE product_id=$edit_id";
    $result_query = mysqli_query($connection, $get_Data);
    $row = mysqli_fetch_assoc($result_query);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];



    //fetching category name
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($connection, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_tittle = $row_category['category_tittle'];
    // echo " ";



    //fetching brand name
    $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($connection, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_tittle = $row_brand['brand_tittle'];
    // echo " $brand_tittle";

}


?>

 <!-- update product  -->
 <?php

if (isset($_POST['edit_product'])) {
    $product_id =$_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_status="true";


    $product_image1 = $_FILES['product_image1']['name'];
    $tmp_image1 = $_FILES['product_image1']['tmp_name'];


    // checking of fields empty or not

    if ($product_title == '' or $product_description == '' or $product_keyword == '' or $product_category == '' or $product_brand == ''  or $product_image1 =='') {
        echo "<script>alert('Please fill all the Available fields')</script>";
    } else {
        move_uploaded_file($tmp_image1,"./product_image/$product_image1");

        //query to update products

        $update_query ="UPDATE `product` SET `product_title`='$product_title',`product_description`='$product_description',`product_keyword`='$product_keyword',`category_id`='$product_category',`brand_id`='$product_brand',`product_image1`='$product_image1',`date`=NOW() WHERE product_id=$edit_id";
        $result_update=mysqli_query($connection,$update_query);
        if($result_update){
            echo "<script>alert('Product Update SuccessFully')</script>";
            echo "<script>window.open('./Adashboard.php?viewProduct','_SELF')</script>";
        }

         
          
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laxmi Admin View_product</title>
    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adashboard.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-3">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title " value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">


            </div>
            <div class="form-outline w-50 m-auto mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" value="<?php echo $product_description ?>" name="product_description" class="form-control" required="required">


            </div>

            <div class="form-outline w-50 m-auto mb-3">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" id="product_keyword " value="<?php echo $product_keyword ?>" name="product_keyword" class="form-control" required="required">


            </div>
            <div class="form-outline w-50 m-auto mb-3">
                <label for="product_keyword" class="form-label">Product Category</label>
                <select name="product_category" id="" class="form-select">
                    <option value="<?php echo  $category_tittle ?>"><?php echo  $category_tittle ?></option>

                    <?php
                    //fetching category name
                    $select_category_all = "SELECT * FROM `categories` ";
                    $result_category_all = mysqli_query($connection, $select_category_all);
                    while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                        $category_tittle = $row_category_all['category_tittle'];
                        $category_id = $row_category_all['category_id'];
                        echo  "<option value='$category_id'>$category_tittle</option>";
                    }


                    ?>
                </select>



            </div>
            <div class="form-outline w-50 m-auto mb-3">
                <label for="product_brand" class="form-label">Product Brand</label>
                <select name="product_brand" id="" class="form-select">
                    <option value="<?php echo $brand_tittle ?>"><?php echo $brand_tittle ?></option>
                    <?php
                    //fetching brand name
                    $select_brand_all = "SELECT * FROM `brands` ";
                    $result_brand_all = mysqli_query($connection, $select_brand_all);
                    while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                        $brand_tittle = $row_brand_all['brand_tittle'];
                        $brand_id = $row_brand_all['brand_id'];
                        echo  "<option value='$brand_id'>$brand_tittle</option>";
                    }




                    ?>
                </select>



            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_Image1" class="form-label">Product Image first</label>
                <div class="d-flex">
                    <input type="file" name="product_image1" id="product_image1" class="form-control w-80 m-auto" autocomplete="off" required="required">
                    <img src="./product_image/<?php echo $product_image1 ?>" alt="" class="pro_img">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-success px-3 mb-3">
            </div>
        </form>
    </div>

   
      <!--  -->
    












    <!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>