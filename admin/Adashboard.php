<?php
include('../database/conn.php');
// include('./Function/commonF.php');

?>
<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }
function name(){
    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM admins WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo  $row['name'] ;
    }
}
function phot(){
    include 'config.php';

   
    
$query = mysqli_query($conn, "SELECT * FROM admins WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    $image = $row['image'] ;

    echo " 
        
       <img src='./admin_image/$image' class='po''/>
        
      ";

}
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laxmi Admin-Dashboard</title>
    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/adashboard.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow-x: hidden;
            
        }
        .Li{
            width: 60px;
            height: 47px;
            
        }
       .pro_img{
         width: 40px;
         height: 40px;
       }
        .po{
            height: 43px;
            border-radius: 40px;
             width: 45px;
        }
        .ko{
            margin: 54px 26px;
        }
        .na{
            margin: 40px 10px;
            font-size: 29px;
        }
        

        .bt {
            margin: 26px;
            padding: 12px;
            border-radius: 24px;
        }
    </style>
</head>

<body class="">
    <!-- ------------------------------------Navbar first child--------------------------------- -->
    <div class="container-fluid p-0  ">
    <nav class="navbar navbar-expand-lg bg-success ">
            <div class="container-fluid text-light  ">
                <a class="navbar-brand " href="#">
                    <h2 class="text-light " > <img src="../images/wrench.png" class="Li " alt=""> Laxmi TradeWorld</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0 m-auto  d-flex justify-content-center align-items-center ">
                        <li class="nav-item">
                            <!-- <a class="nav-link active text-light ki" aria-current="page" href="welcome.php">Home</a> -->
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link text-light ki" href="product.php">Product</a> -->
                        </li>

                        <li class="nav-item">
                            <!-- <a class="nav-link text-light ki" href="contact.php">Contact</a> -->
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link text-light ki" href="about.php">About</a> -->
                        </li>
                    </ul>
                    <ul class="navbar-nav  " >
                        <li class="nav-item me-2">
                            <a href="" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"> <?php  phot(); ?> <?php  name(); ?></h4>
                            </a>
                        </li>
                       

                       
                        <li class="nav-item me-4">
                            <a href="logout.php" class="nav-link  me-4">
                                <h4 class="text-light"><i class="fa-solid fa-right-from-bracket"></i></h4>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- ------------------------------------second child--------------------------------- -->
        <div class="bg-light">
            <h3 class="text-center p-3">
                Laxmi Tradeworld Admin Manage Details
            </h3>
        </div>
        <!-- ------------------------------------Third child--------------------------------- -->
        <div class="row">
            <div class=" bg-dark p-1 me-2 d-flex align-item-center">
                
                <div class="button text-center td p-5  m-auto">

                    <button class="bg-success bt"><a href="./Adashboard.php?InsertProduct" class="nav-link text-light my-2">Insert Product</a></button>
                    <button class="bg-success bt"><a href="./Adashboard.php?viewProduct" class="nav-link text-light my-2">View Product</a></button>
                    <button class="bg-success bt"><a href="./Adashboard.php?insertCategroy" class="nav-link text-light my-2">Insert Category</a></button>
                    <button class="bg-success bt"><a href="./Adashboard.php?viewCategroy" class="nav-link text-light my-2">View Category</a></button>
                    <button class="bg-success bt"><a href="./Adashboard.php?insertbrand" class="nav-link text-light my-2">Insert Brand</a></button>
                    <button class="bg-success bt"><a href="./Adashboard.php?viewbrand" class="nav-link text-light my-2">View Brand</a></button>
                    
                    
                </div>

            </div>
        </div>

    </div>

    <div class="container my-3">

        <?php

        //  <!-------------------------------display InsetProduct------------------------ -->
        if (isset($_GET['InsertProduct'])) {
            include('insertProduct.php');
        }
        //  <!-------------------------------display viewProduct------------------------ -->
        if (isset($_GET['viewProduct'])) {
            include('viewProduct.php');
        }
        //  <!-------------------------------display editProduct------------------------ -->
        if (isset($_GET['edit_product'])) {
            include('edit_product.php');
        }
        //  <!-------------------------------display deleteProduct------------------------ -->
        if (isset($_GET['delete_product'])) {
            include('deleteProduct.php');
        }





        //<!-- -----------------------------display insertCategroy------------------------ -->
        if (isset($_GET['insertCategroy'])) {
            include('insertCategroy.php');
        }
        //<!-- -----------------------------display viewCategroy------------------------ -->
        if (isset($_GET['viewCategroy'])) {
            include('viewCategroy.php');
        }
        //<!-- -----------------------------display editCategroy------------------------ -->
        if (isset($_GET['edit_Category'])) {
            include('editCategory.php');
        }
        //<!-- -----------------------------display deleteCategroy------------------------ -->
        if (isset($_GET['delete_Category'])) {
            include('deleteCategory.php');
        }




        //  <!-------------------------------display insertBrand------------------------ -->
        if (isset($_GET['insertbrand'])) {
            include('insertbrand.php');
        }
        //  <!-------------------------------display viewBrand------------------------ -->
        if (isset($_GET['viewbrand'])) {
            include('viewbrand.php');
        }
        //  <!-------------------------------display editBrand------------------------ -->
        if (isset($_GET['edit_brand'])) {
            include('editBrand.php');
        }
        //  <!-------------------------------display deleteBrand------------------------ -->
        if (isset($_GET['delete_brand'])) {
            include('deleteBrand.php');
        }


        ?>
    </div>



    <hr>
    <!------------------------------- last child------------------------ -->
    <div class="bg-dark  text-center ">
        <p class="text-light">All Right Reserved ©- Designed by Krishna Singh 2022-23</p>
    </div>



    <!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>