<?php
$name = $_POST['firstName'];
$emailId = $_POST['emailId'];
$number = $_POST['phoneNumber'];
$message= $_POST['message'];

$username = "root";
$password="";
$servername = "localhost";
$database = "portfoliodb";

$connection = new mysqli($servername,$username,$password,$database);
if($connection->connect_errno){
    echo"Failed";
}else{
    $insert = "INSERT INTO contactForm  VALUES('','$name','$emailId','$number','$message')";
if($connection->query($insert)===TRUE){
    echo "dATA SENT";
}else{
echo $connection->error;
}
}

echo '<b>'.$name.'</b> '.$emailId.'<br>';
echo $emailId.'<br>';
echo $number.'<br>';
echo $message.'<br>';




?>