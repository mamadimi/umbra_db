<?php

$servername = "localhost";
$username = "umbra_system";
$password = "system";
$database  = "umbra";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$mail= $_POST['mail'];
$passwd=$_POST['passwd'];
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$birthdate=$_POST['birthdate'];
$payment_method=$_POST['payment_method'][0];

/*SQL injection*/

$mail =mysqli_real_escape_string ( $conn , $mail );
$passwd =mysqli_real_escape_string ( $conn , $passwd );
$lastname =mysqli_real_escape_string ( $conn , $lastname );
$firstname =mysqli_real_escape_string ( $conn , $firstname );
$birthdate =mysqli_real_escape_string ( $conn , $birthdate );


$sql = "INSERT INTO User_Account (Email ,Pasword,First_Name,Last_Name,Birth_Date,Payment_Method) VALUES ('".$mail."','".$passwd."','".$firstname."','".$lastname."','".$birthdate."','".$payment_method."')"; 


$result = $conn->query($sql);

if (!$result) {
    echo "<br><br>Wrong information. Please try again<br>";
    echo 'MySQL Error: ' . mysql_error();
    
}
else{
    echo "<br><br>You are succesuly registered<br>";
}


?>

<script>
    alert("Returning to login");
    window.location = '../login/login.html';
</script>
