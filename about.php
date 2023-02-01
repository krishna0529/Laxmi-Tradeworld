<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

function username()
{
    include 'config.php';
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo $row['name'];
    }
}
function phot()
{
    include 'config.php';



    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        $image = $row['image'];

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
    <title>Laxmi About </title>
    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">

    <!-- ------------------------------------Font awesome--------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .ki {
            margin: 8px 25px;
            font-size: 20px;
        }

        .po {
            height: 43px;
            border-radius: 40px;
            width: 45px;
        }

        .Li {
            width: 60px;
            height: 47px;


        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color:#198754;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
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

                    <ul class="navbar-nav ">
                        <li class="nav-item me-3">
                            <a href="" class="nav-link ">
                                <h4 class="text-light " style="overflow: hidden;"><?php phot(); ?> <?php username(); ?></h4>
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
        
        <!------------------------ About Us --------------------- -->
        <div class="about-section">
            <h1>About Us Page</h1>
            <p>TRENDY AUTOMOBLIE COMPONENTS</p>
            <p>SIROCCO LEAF SPRING , MOTOROL LUBRICANTS , JMP TRUCK & TRAILER PARTS , ST BERARINGS , TATA GENUINE D.E.F., TATA WHEEL RIMS</p>
        </div>

        <h2 style="text-align:center">Our Team</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="./images/krishna.jpg" alt="Jane" style="width:100%">
                    <div class="container">
                        <h2>Krishna Singh</h2>
                        <p class="title">CEO & Founder</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>jane@example.com</p>
                        <p><button class="button"> Contact : 8866260281</button></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="./images/Praveen.jpg" alt="Mike" style="width: 100%; height:480px" >
                    <div class="container">
                        <h2>Praveen Uchchariya</h2>
                        <p class="title">Art Director</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>mike@example.com</p>
                        <p><button class="button">Contact : 8862584551</button></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="./images/krishna.jpg" alt="John" style="width:100%">
                    <div class="container">
                        <h2>Vishal Singh</h2>
                        <p class="title">Designer</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>john@example.com</p>
                        <p><button class="button">Contact : 7894585457</button></p>
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