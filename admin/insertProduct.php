<?php
include('../database/conn.php');


if(isset($_POST['insert_product'])){

    // product det
    $product_title =$_POST['product_title'];
    $product_description =$_POST['product_Description'];
    $product_keyword =$_POST['product_keyword'];
    $product_category =$_POST['product_category'];
    $product_brand =$_POST['product_brand'];
    
    $product_status ='true';
    
    // insert Images
    $product_image1 =$_FILES['product_image1']['name'];
    
   


    //accessing images tmp name
    $tmp_image1 =$_FILES['product_image1']['tmp_name'];
    
    


    //checking empty condition
    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand==''  or $product_image1=='' ){
        echo "<script>alert('Please fill all the Available fields')</script>";
        exit();
    }else{
        // image are direct upload
        move_uploaded_file($tmp_image1,"./product_image/$product_image1");
       

        //insert Query 
        $insert_product = "INSERT INTO `product`(`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`,  `date`, `status`) VALUES ('','$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','NOW()','$product_status' )";

        $result_query=mysqli_query($connection,$insert_product);

        if($result_query){
            echo  "<script>alert('Successfully Insert The Product')</script>";
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
    <title>Laxmi TradeWorld-Admin-InsertProduct</title>
    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
    <link rel="stylesheet" href="../css/insertProdect.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">

    <div class="container ">
        <h1 class="text-center mt-1 bg-success text-light  sticky-sm-top">
            Insert Product
        </h1>
        <hr>
        <!--------------------------------- from ------------------- -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- --------------tittle -------------- -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title " autocomplete="off" required="required">
            </div>
            <!-- --------------Description -------------- -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_Description" class="form-label">Product Description</label>
                <input type="text" name="product_Description" id="product_Description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <!-- --------------Product Keyword -------------- -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product keyword" autocomplete="off" required="required">
            </div>
            <!-- --------------Category list -------------- -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Select Category</label>
                <select name="product_category" id="" class=" form-select">
                    <option value="">Select Category</option>
                    <!-- ----------------------insert Dynomic data category ---------------------------- -->
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($connection, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_tittle = $row['category_tittle'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_tittle</option>1";
                    }
                    ?>



                </select>
            </div>
            <!-- --------------Brand list -------------- -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Select Brand</label>
                <select name="product_brand" id="" class=" form-select">
                    <option value="">Select brand</option>
                    <!-- ----------------------insert Dynomic data brand ---------------------------- -->
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($connection, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_tittle = $row['brand_tittle'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_tittle</option>1";
                    }
                    ?>
                </select>
            </div>
            <!-- --------------Image 1 -------------- -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_Image1" class="form-label">Product Image first</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" required="required">
            </div>
           

            
            <!-- --------------Product button -------------- -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="Submit" name="insert_product" class="btn btn-success" value="Insert Product">
            </div>

        </form>
    </div>



























    <!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>