<?php

  include('./database/conn.php');
 



 // getting product 

 function get_products()
 {
    global $connection;

   

   
    


    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {





            $select_query = "SELECT * FROM `product` order by rand() LIMIT 0,20";
            $result_query = mysqli_query($connection, $select_query);
            
            
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];

                // $product_keyword =$row['product_keyword'];
                $product_image1 = $row['product_image1'];
                
                
                

               

                echo  " <div class='col-md-3 mb-2'>
        <div class='card'>
            <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 250px; object-fit: contain; ' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                
                <a href='https://wa.me/+918866260821?whatapp=$product_title,$product_description,$product_image1' class='btn btn-primary bg-success text-light' target='_blank'>Whatsapp</a>
               
                 </div>
        </div>
    </div>";
            }
        }
    }
 }

 //getting unique categories
 function get_unique_category()
 {
    global $connection;


    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id=$_GET['category'];
        

            $select_query = "SELECT * FROM `product` WHERE category_id=$category_id";
            $result_query = mysqli_query($connection, $select_query);
            $num_of_rows= mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'> No Stock For This Category </h2>" ;
            }
            
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];

               
                $product_image1 = $row['product_image1'];
                
                
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 250px; object-fit: contain; ' alt=''>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='https://wa.me/8866260821?text=$product_title&source=$product_image1' class='btn btn-primary bg-success text-light'>Whatsapp</a>
                
                
                
            </div>
        </div>
    </div>";
            }
        }
    }



    //getting unique categories
 function get_unique_brand()
 {
    global $connection;


    //condition to check isset or not
    if (isset($_GET['brand'])) {
        $brand_id=$_GET['brand'];
        

            $select_query = "SELECT * FROM `product` WHERE brand_id=$brand_id";
            $result_query = mysqli_query($connection, $select_query);
            $num_of_rows= mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'> This Brand  is not Available for service </h2>" ;
            }
            
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];

               
                $product_image1 = $row['product_image1'];
               
                
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 250px; object-fit: contain; ' alt=''>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='https://wa.me/8866260821?whatapp=$product_title,$product_description,$product_image1' class='btn btn-primary bg-success text-light'>Whatsapp</a>
               
                
            </div>
        </div>
    </div>";
            }
        }
    }


 // display brands is sidenav bar
 function get_brands()
 {
    global $connection;
    $select_brands = "SELECT * FROM `brands` LIMIT 0,10";
    $result_select = mysqli_query($connection, $select_brands);
    // $row_data =mysqli_fetch_assoc($result_select);
    // echo $row_data['brand_tittle'];
    while ($row_data = mysqli_fetch_assoc($result_select)) {
        $brand_tittle = $row_data['brand_tittle'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item '>
                        <a href='product.php?brand=$brand_id' class='nav-link text-light'>$brand_tittle</a>
                    </li>";
    }
 }

 //category list function 
 function get_categorys()
 {
    global $connection;
    $select_category = "SELECT * FROM `categories`";
    $result_select = mysqli_query($connection, $select_category);
    
    while ($row_data = mysqli_fetch_assoc($result_select)) {
        $category_tittle = $row_data['category_tittle'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item '>
                        <a href='product.php?category=$category_id' class='nav-link text-light'>$category_tittle</a>
                    </li>";
    }
 }

 //get a serarching the product
 function search_product(){
    global $connection;

            if(isset($_GET['search_product'])){
                $search_data_value=$_GET['search_data'];

            
            $search_query= "SELECT * FROM `product` WHERE product_keyword like '%$search_data_value%'";
            $result_query = mysqli_query($connection,$search_query);
            $num_of_rows= mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'> This product is not match and no product will be show  </h2>" ;
            }
            
            
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];

                // $product_keyword =$row['product_keyword'];
                $product_image1 = $row['product_image1'];
                
                
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_image/$product_image1' class='card-img-top' style='height: 250px; object-fit: contain; ' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='https://wa.me/8866260821?whatapp=$product_title,$product_description,$product_image1' class='btn btn-primary bg-success text-light'>Whatsapp</a>
                
              
            </div>
        </div>
    </div>";
            }
        }
 }
