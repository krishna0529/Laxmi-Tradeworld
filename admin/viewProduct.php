<?php

include("../database/conn.php");



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
    <h1 class="text-center "> View All Products</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-success">
            <tr class="text-light">
                <th>Product ID</th>
                <th>Product Tittle</th>
                <th>Product Description</th>
                <th>Product  Image</th>
                <th>Product  Status</th>
                <th>Product Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light" >
            <?php
                $get_product = "SELECT *FROM `product` ";
                $result_query =mysqli_query($connection,$get_product);
                
                $number=0;
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id =$row['product_id'];
                    $product_title =$row['product_title'];
                    $product_desc =$row['product_description'];
                    $product_image1 =$row['product_image1'];
                    $product_status =$row['status'];
                    $number++;
                    echo " <tr class='text-center'>
                    <td>$number</td>
                    <td>$product_title</td>
                    <td>$product_desc</td>
                    <td><img src='./product_image/$product_image1' class='pro_img'/></td>
                    <td>$product_status</td>
                    <td><a href='./Adashboard.php?edit_product=$product_id' class='text-light ' ><i class='fa-solid fa-pen-to-square '></i></a></td>
                    <td><a href='./Adashboard.php?delete_product=$product_id'type='button' class='text-light' data-toggle='modal' data-target='#exampleModalCenter'><i class='fa-solid fa-trash '></i></a></td>
                    
                </tr>";
                    
                }

            ?>
           
        </tbody>
    </table>


    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are You Sure You Want Delete This Product ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary"><a href='./Adashboard.php?delete_product=<?php echo $product_id ?>' class="text-light text-decoration-none"  >Yes</a></button>
      </div>
    </div>
  </div>
</div>












    
<!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    
</body>
</html>