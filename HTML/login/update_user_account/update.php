<!DOCTYPE html>

<html>
    <head>
        <meta  content="text/html; charset=UTF-8"  http-equiv="content-type">
        <title>Umbra &amp; auntumbra Update </title>
        <link rel="stylesheet" type="text/css" href="../../css/login.css">
    </head>



    <body  id="id1">

        <h1  style=" text-align: center;"><span  style="color: rgb(255, 0, 0);">Umbra</span>
        &amp; <span  style="color: rgb(0, 0, 153);">Antumbra</span></h1>
        <p  style="text-align: center;">where there is no light and ... the <strong
        style="text-decoration: underline; font-family: Droid Sans Hebrew;">CHAOS</strong>
        begins.</p>
        <br>
        <div  style="text-align: center;"><br>
        </div>
        <br>
        <strong  style="color: rgb(150, 10, 2);"> 
        <?php
            session_start();
            $passwd=$_SESSION['passwd'];
            $mail = $_SESSION['mail'];
            $servername = "localhost";
            $username = "player";
            $password = "player";
            $database  = "umbra";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 


            $sql = "SELECT * FROM User_Account U WHERE U.Email='" .$mail. "' AND U.Pasword='".$passwd."'"  ;

            $result = $conn->query($sql);



            if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
            exit;
            }

            if ($result->num_rows > 0) {
            
        ?>

            <!--Project Characters-->
            <div style='text-align: center;'><br>Account Information<br><br></div>

            <style>
            table, th, td {
            border: 1px solid black;
            }
            </style>

            <table align='center'>
            <tr>
            <th>E-mail</th>
            <th>Payment Method</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Credits</th>
            </tr>

        <?php
        // output data of each row

            while($row = $result->fetch_assoc()) {
                
                $payment_method=$row["Payment_Method"];
                $first_name=$row["First_Name"];
                $last_name=$row["Last_Name"];
                $birth_date=row["Birth_Date"];
                
                echo "<tr>";
                echo "<td>" . $row["Email"]. "</td> ";
                echo "<td>" . $row["Payment_Method"]. "</td>";
                echo "<td>" . $row["First_Name"]. "</td>";
                echo "<td>" . $row["Last_Name"]. "</td>";
                echo "<td>" . $row["Birth_Date"]. "</td>";
                echo "<td>" . $row["Credits"]. "</td>";
                echo "</tr>";

            }
            echo"</table></div>";

            } 

        ?>
        </strong>

        <br>
        <br>
        <br>
        <br>
        <div  style="text-align: center;"> Insert your new account information bellow.<br>
        <br>
        <strong  style="color: rgb(150, 10, 2);">
            
        <form  NAME="updateForm" action="update_dbs.php" method="POST"  > 
            First Name:
            &nbsp; <input  name="First_Name"  value="<?php echo "$first_name";?>"  type="text"><br>
            Last Name: <input  name="Last_Name"
            value="<?php echo "$last_name";?>"  type="text"><br>
            <div  style="text-align: center; margin-left: -40px; color: rgb(150, 10, 2);"> Payment Methods:<select name="payment_methods" >
                <option value="paysafe">paysafe</option>
                <option value="Credit/Debit Card">Credit/Debit card</option>
                <option value="paypal">paypal</option>
                <option value="Bitcoins">Bitcoins</option>
                <option value="-">-</option>
            </select>
            </div>

            <br>
        </strong>
            <input  value="Update Information" type="SUBMIT"   >
        </form>
       

            
            
            
         

         
    
         <form>
            <input type="button" onclick="window.location='../log.php'"value ="Go Back to characters preview" />
            </form>   
            
        
    </body>




    <footer>
    <div  style="text-align: right;"><h6  style="text-align: center; height: 1px;"><br><span
    style="font-weight: bold; font-family: STIX;"><span  style="text-decoration: underline; font-style: italic;"></span></span><span
    style="font-family: serif;">Designed & Tested by Umbra Team <br></span></h6><h6
    style="text-align: center; height: 1px;"><span  style="font-family: serif;"> March 2016<br></span></h6><h6
    style="text-align: center; height: 6px;"><strong></strong>Lead Designer : Mamagiannos Dimitrios - Characters' interface Designer : Bakas Stylianos - Assistant Designer : Modouras Nektarios </h6><p><br></p></div>
    </div>
    </footer>


</html>



