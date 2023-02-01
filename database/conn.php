<?php

$server ='localhost';
$username ='root';
$password ="";
$database ="mys";

$connection = mysqli_connect($server,$username,$password,$database);

if(!$connection){
    die("Sorry to connection : ".Mysqli_connect_error());

}
// else{
//     echo  "connection is successfully";
// }


?>