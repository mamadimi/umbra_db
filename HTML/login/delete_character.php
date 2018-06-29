
<?php

    $servername = "localhost";
    $username = "umbra_system";
    $password = "system";
    $database  = "umbra";


    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ID_char = $_POST['character'];


    $sql = "DELETE  FROM Characters  WHERE ID_char='" .$ID_char. "'" ;




    $result = $conn->query($sql);

    if (!$result) {
        echo "<br>DB Error, could not query the database";
        echo '<br>MySQL Error: ' . mysql_error();
    }


?>
<script>
var myVar = setInterval(myTimer, 100);


function myTimer() {
    alert('Character has been deleted');
    window.location.href = './log.php';
}
</script>
