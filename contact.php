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
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];


    echo "<div style='display: none;'>";
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'krishnasingh0529@gmail.com';                     //SMTP username
        $mail->Password   = 'bjejzjwrlcazvrju';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("krishnasingh0529@gmail.com", $name);
        // $mail->setFrom($email, $name);
        $mail->addAddress("krishnasingh0529@gmail.com", $name);     //Add a recipient
        $mail->addReplyTo($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = ($subject);
        $mail->Body    = $message . '</b>';
        $mail->AltBody = $message . '</b>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laxmi Contact </title>
    <!-- ------------------------------------CSS only--------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">

    <link rel="stylesheet" href="../css/adashboard.css">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />

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

        .ar {
            margin: 6px 0px;
            padding: 26px 0px;
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


        <!-- Contact US  -->
        <!-- ------------------------------------second child--------------------------------- -->
        <div class="bg-light">
            <h3 class="text-center p-3">
                Email From Laxmi Tradeworld To Any Query
            </h3>
        </div>

        <!-- ------------------------------------third child--------------------------------- -->
        <!-- form section start -->
        <section class="w3l-mockup-form">
            <div class="container">
                <!-- /form -->
                <div class="workinghny-form-grid">
                    <div class="main-mockup">
                        <div class="alert-close">
                            <span class="fa fa-close"></span>
                        </div>
                        <div class="w3l_form align-self">
                            <div class="left_grid_info ">
                                <div class="ar">
                                    <h5 class="text-light"><i class=" fa-solid fa-house"></i> Shop no-37,G.C Chamber ,plot no.65,Sector9/C,N.H.,Gandhidham(Kutch)370201</h5>
                                </div>
                                <div class="ar">
                                    <h5 class="text-light"><i class="fa-sharp fa-solid fa-location-dot"></i> Laxmi Tradeworld Transport Area </h5>

                                </div>
                                <div class="ar">

                                    <h5 class="text-light"><i class="fa-sharp fa-solid fa-envelope"></i> siddheshwartraders@hotmail.com</h5>
                                </div>
                                <div class="ar">

                                    <h5 class="text-light"><i class="fa-sharp fa-solid fa-phone"></i> Bharat Bhanushali:9228123692 </h5>
                                    <h5 class="text-light"> Hitesh Bhanushali: 8264491701 </h5>
                                </div>
                            </div>
                        </div>
                        <div class="content-wthree">
                            <h2>Contact US</h2>
                            <p>welcome The Laxmi Trade </p>
                            <?php //echo $msg; 
                            ?>
                            <form action="" method="post" enctype="multipart/form-data" class="text">
                                <input type="text" class="name" name="name" placeholder="Enter Your Name" value="" />
                                <input type="email" class="email" name="email" placeholder="Enter Your Email" value="" required>
                                <input type="text" class="subject" name="subject" placeholder="Enter Your Subject" value="" required>
                                <!-- <input type="text" class="phone" name="phone" placeholder="Enter Your Phone No" value="" required > -->
                                <input type="text" class="message" name="message" placeholder="Enter Your message" value="" required>
                                <!-- <textarea name="message" class="message-text" placeholder="Enter Your message" cols="50" rows="5"></textarea> -->
                                <button name="submit" class="btn" type="submit">Send</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- //form -->
            </div>
        </section>
        <!-- //form section start -->







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