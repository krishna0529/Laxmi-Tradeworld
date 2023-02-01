<?php
// connection file 
include('./database/conn.php');
include('./Function/commonF.php');
?>
<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    function username(){
        include 'config.php';
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo $row['name'] ;
    }
    }
    function phot(){
        include 'config.php';
    
       
        
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    
        $image = $row['image'] ;
    
        echo " 
            
           <img src='./user_photo/$image' class='po''/>
            
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
    <title>Laxmi Tradeworld -home</title>

    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/producet.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .ki{
            margin: 8px 25px;
            font-size: 20px;
        }
        .card{
            width: 300px;
            height: 385px;
        }
        .po{
            height: 43px;
            border-radius: 40px;
             width: 45px;
        }
        .Li {
            width: 60px;
            height: 47px;
         
        
        }
    </style>
</head>

<body>

<div class="container-fluid p-0">
        <!-- first child  -->
        <nav class="navbar navbar-expand-lg bg-success  ">
            <div class="container-fluid text-light  ">
            <a class="navbar-brand " href="#">
                    <h2 class="text-light  "> <img src="./images/wrench.png" class="Li " alt=""> Laxmi TradeWorld</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link  text-light ki " aria-current="page" href="welcome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-light ki" href="product.php">Product</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="about.php">About</a>
                        </li>



                    </ul>
                    <!-- search Product -->
                    <form class="d-flex" role="search" action="search_product.php" method="GET">
                        
                        <!-- search Input -->
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- search btn -->
                        <input type="submit" value="search" class="btn btn-outline-light  " name="search_product">
                    </form>
                    <ul class="navbar-nav ">
                    <li class="nav-item me-2">
                            <a href="" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"> <?php  phot(); ?>  <?php  username(); ?></h4>
                            </a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="e-mail.php" class="nav-link  me-1">
                                <h4 class="text-light"><i class="fa-sharp fa-solid fa-envelope"></i></h4>
                            </a>
                        </li>

                        <li class="nav-item me-2">
                            <a href="logout.php" class="nav-link  me-4">
                                <h4 class="text-light"><i class="fa-solid fa-right-from-bracket"></i></h4>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <!------------------------------- Second child------------------------ -->
        <div class="bg-light">
            <h3 class="text-center">Laxmi TradeWorld Store</h3>
            <p class="text-center">Laxmi store the sale Electric Item and Rubber Part </p>
        </div>

        <!------------------------------- Third child------------------------ -->
        <div class="row px-1">
            <!-------------------------------slide navbar------------------------ -->
            <div class="col-md-2 bg-dark rounded-end p-0">
                <ul class="navbar-nav me-auto text-center">
                    <!-------------------------------Product brand Items------------------------ -->
                    <li class="nav-item bg-success">
                        <a href="" class="nav-link text-light">
                            <h4>Product Items</h4>
                        </a>
                    </li>
                    <?php
                    
                        get_brands();

                    ?>

                    <!-------------------------------category Item------------------------ -->
                    <li class="nav-item bg-success">
                        <a href="" class="nav-link text-light">
                            <h4>Category Items</h4>
                        </a>
                    </li>

                    <!-------------------------------category F Item------------------------ -->

                    <?php
                    
                        get_categorys();

                    ?>



            </div>

            <!------------------------------- Products ------------------------ -->

            <div class="col-md-10">
                <!------------------------------- Products Items------------------------ -->
                <div class="row px-3">

                    <?php
                    // calling function
                    search_product();
                    get_unique_category();
                    get_unique_brand();



                    ?>



                </div>

            </div>
        </div>






        <hr>

        <!------------------------------- last child------------------------ -->
        <div class="bg-dark  text-center">
            <p class="text-light">All Right Reserved ©- Designed by Krishna Singh 2022-23</p>
        </div>

    </div>

























    <!-- ------------------------------------Java Script--------------------------------- -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>