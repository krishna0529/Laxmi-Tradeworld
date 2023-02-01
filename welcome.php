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
    <link rel="stylesheet" href="../css/home.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        
        .Li{
            width: 60px;
            height: 47px;
            
        }
        .po{
            height: 43px;
            border-radius: 40px;
             width: 45px;
        }
        .k {
            
            height: 537px;
            

        }
        .kr{
            margin: auto;
        }
        .c{
            margin: 18px 43px;

            
        }
        .ci{
            height: 230px;
        }
        .ki {
            margin: 8px 25px;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- first child  -->
        <nav class="navbar navbar-expand-lg bg-success ">
            <div class="container-fluid text-light  ">
                <a class="navbar-brand " href="#">
                    <h2 class="text-light " > <img src="./images/wrench.png" class="Li " alt=""> Laxmi TradeWorld</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0 m-auto  d-flex justify-content-center align-items-center ">
                        <li class="nav-item">
                            <a class="nav-link active text-light ki" aria-current="page" href="welcome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="product.php">Product</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light ki" href="about.php">About</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav  " >
                        <li class="nav-item me-2">
                            <a href="" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"><?php  phot(); ?> <?php  username(); ?></h4>
                            </a>
                        </li>
                       

                        <li class="nav-item me-2">
                            <a href="e-mail.php" class="nav-link  me-4">
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

       

        <!------------------------------- Second child------------------------ -->
        <!------------------------------- slide imagess------------------------ -->
        <div id="carouselExampleControls" class="carousel slide border" data-bs-ride="carousel">
            <div class="carousel-inner i">
                <div class="carousel-item active im">
                    <img src="./images/slide1.png" class="w-100 k" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide2.png" class="w-100 k" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide3.jpg" class="w-100 k" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide4.jpg" class="w-100 k" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide5.jpg" class="w-100 k" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide6.jpg" class="w-100 k" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide7.jpeg" class="w-100 k " alt="...">
                </div>
            </div>
            <!------------------------------- Previous btn------------------------ -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <!------------------------------- next btn------------------------ -->
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden ">Next</span>
            </button>
        </div>
        
        <!------------------------------- Third child------------------------ -->

        <div class="">
            <div class="text-center bg-dark ">
                <h3 class="text-light  text-center bg-success" style="overflow: hidden;">Product items Available</h3>
                <div class="row kr">
                    <!-- card 1 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr1.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3>Automotive Parts</h3>
                            <p class="card-text">Auto parts are the component elements and systems that make up a car. They range from the smallest fasteners to the largest body panels, from the engine to the seat springs.</p>
                        </div>
                    </div>
                    <!-- card 2 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr2.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3>Automotive Electrical Parts</h3>
                            <p class="card-text">It had only switches, wires, relays and controlled motors as its key components but today's electrical system includes sensors, actuators, alternators.</p>
                        </div>
                    </div>
                    <!-- card 3 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr3.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3>Rubber Part</h3>
                            <p class="card-text">Molding produces rubber parts by pressing a block of rubber into a metal cavity. The rubber inside of the cavity is then exposed to heat, activating a chemical reaction</p>
                        </div>
                    </div>
                    <!-- card 4 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr4.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3> oil & greses</h3>
                            <p class="card-text">Oil and grease refers to a combination of substances that do not readily mix with water and are commonly used in industry and daily activities.</p>
                        </div>
                    </div>
                </div>
            </div>
           
            <!------------------------------- Fourth child------------------------ -->
            <div class="">
            <div class="text-center bg-dark ">
                <h3 class="text-light  text-center bg-success" style="overflow: hidden;"> Over Customer </h3>
                <div class="row kr">
                    <!-- card 1 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr1.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3>Automotive Parts</h3>
                            <p class="card-text">Auto parts are the component elements and systems that make up a car. They range from the smallest fasteners to the largest body panels, from the engine to the seat springs.</p>
                        </div>
                    </div>
                    <!-- card 2 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr2.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3>Automotive Electrical Parts</h3>
                            <p class="card-text">It had only switches, wires, relays and controlled motors as its key components but today's electrical system includes sensors, actuators, alternators.</p>
                        </div>
                    </div>
                    <!-- card 3 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr3.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3>Rubber Part</h3>
                            <p class="card-text">Molding produces rubber parts by pressing a block of rubber into a metal cavity. The rubber inside of the cavity is then exposed to heat, activating a chemical reaction</p>
                        </div>
                    </div>
                    <!-- card 4 -->
                    <div class="card c" style="width: 18rem;">
                        <img src="./images/pr4.jpg" class="card-img-top ci" alt="...">
                        <hr>
                        <div class="card-body">
                            <h3> oil & greses</h3>
                            <p class="card-text">Oil and grease refers to a combination of substances that do not readily mix with water and are commonly used in industry and daily activities.</p>
                        </div>
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