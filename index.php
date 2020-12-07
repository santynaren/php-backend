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


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/email",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"sender\":{\"name\":\"Narendra Santhosh Nagarajan\"},\"to\":[{\"email\":\"santhoshnarendra@gmail.com\",\"name\":\"Narendra Santhosh Nagarajan\"}]}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "api-key : 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",
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
    mail("santhoshnarendra@gmail.com","Test","Hello mail");
$getQuery = "SELECT * FROM contactForm";
$runGetQuery = $connection->query($getQuery);
if($runGetQuery->num_rows > 0){
while($row = $runGetQuery->fetch_assoc()){
?>
<b><?php echo $row['name'];?></b>
<b><?php echo $row['number'];?></b>
<hr>
<?php
}
}
}else{
echo $connection->error;
}
}





?>