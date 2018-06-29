<!DOCTYPE html>


<?php


    $LAST_NAME=$_POST['Last_Name'];
    $FIRST_NAME=$_POST['First_Name'];
    $PAYMENT=$_POST['payment_methods'];


    $servername = "localhost";
    $username = "umbra_system";
    $password = "system";
    $database  = "umbra";

    $cookie_name = "umbra_login";

    if (!isset($_COOKIE[$cookie_name])) {
    } else {
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT UA.Email, UA.Pasword FROM User_Account UA, user_login_cookies ucook where ucook.rand_id=".$_COOKIE[$cookie_name]." and UA.Email=ucook.Email" ;

        $result = $conn->query($sql);

        if (!$result) {
            echo "DB Error, could not query cookie in the database\n";
            echo 'MySQL Error: ' . mysql_error();
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mail = $row["Email"];
                $passwd = $row["Pasword"];
            }
        }
    }


    //$conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $LAST_NAME =mysqli_real_escape_string($conn, $LAST_NAME);
    $FIRST_NAME =mysqli_real_escape_string($conn, $FIRST_NAME);

    $sql = "UPDATE User_Account SET Last_Name='".$LAST_NAME."',First_Name='".$FIRST_NAME."',Payment_Method='".$PAYMENT."' WHERE Email='" .$mail. "'" ;


    $result = $conn->query($sql);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }


?>

<script>
    alert("You have succesfully update your account information");
    window.location = './update.php';
</script>
