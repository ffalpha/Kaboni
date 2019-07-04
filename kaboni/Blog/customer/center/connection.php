<?php

$host = 'localhost';
$username = 'root';
$pw = '';
$db = 'kaboni';

$con = mysqli_connect($host,$username,$pw,$db);


if($con)
{
    echo "<script>console.log('Databae connection sucessful..')</script>";
}
else{
    echo "<script>console.log('Databae connection Error..')</script>";
}

?>