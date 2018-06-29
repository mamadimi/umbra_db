<html>
    <head>
        <meta  content = "text/html; charset=windows-1252"  http-equiv = "content-type">
        <link rel = "stylesheet" type = "text/css" href = "../css/login.css">
    </head>
    <body >
        <h1  style = " text-align: center;"><span  style = "color: rgb(255, 0, 0);">Umbra</span>
        &amp; <span  style = "color: rgb(0, 0, 153);">Antumbra</span></h1>
        <p  style = "text-align: center;">where there is no light and ... the <strong
        style = "text-decoration: underline; font-family: Droid Sans Hebrew;">CHAOS</strong>
        begins.</p>

        <p  style = "text-align: center;"><br>
        </p>
        <p  style = "text-align: center;"><br>
        </p>


        <div style = "text-align: center;">
            <?php
            $cookie_name = "umbra_login";

                if(!isset($_COOKIE[$cookie_name])) {
                    $mail = $_POST['mail'];
                    $passwd = $_POST['passwd'];

                }
                else
                {
                    $servername = "localhost";
                    $username = "umbra_system";
                    $password = "system";
                    $database = "umbra";


                    $conn = new mysqli($servername, $username, $password, $database);

                    $mail = mysqli_real_escape_string ( $conn , $mail );
                    $passwd = mysqli_real_escape_string ( $conn , $passwd );

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $clas = mysqli_real_escape_string ( $conn , $clas );

                    $sql = "SELECT UA.Email, UA.Pasword FROM User_Account UA, user_login_cookies ucook where ucook.rand_id=".$_COOKIE[$cookie_name]." and UA.Email=ucook.Email" ;

                    $result = $conn->query($sql);

                     if (!$result) {
                            echo "DB Error, could not query cookie in the database\n";
                            echo 'MySQL Error: ' . mysql_error();
                     }

                    if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            $mail = $row["Email"];
                            $passwd = $row["Pasword"];
                        }
                    }
                    mysqli_close($conn);

                }

                $servername = "localhost";
                $username = "umbra_system";
                $password = "system";
                $database = "umbra";

                $conn = new mysqli($servername, $username, $password, $database);

                $mail = mysqli_real_escape_string ( $conn , $mail );
                $passwd = mysqli_real_escape_string ( $conn , $passwd );

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                ?>

                <?php
                $sql = "SELECT Email,First_Name,First_Name,Pasword  FROM User_Account WHERE Email='" .$mail. "'" ;

                $result = $conn->query($sql);

                if (!$result) {
                echo "DB Error, could not query the database in first login\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
                }

                if ($result->num_rows > 0) {
                // output data of each row

                while($row = $result->fetch_assoc()) {
                if ($row["Pasword"] =  = $passwd){
                $name = $row["First_Name"];
                echo "You are succesuly logged in, ". $row["First_Name"]. "<br>";
            ?>

        </div>

        <div style = "text-align: center;">
            <form  action = "./update_user_account/update.php"  method = "post">
                <input  value = "Update Account Information "  type = "submit">
            </form>
        </div>

      <?php
          if(!isset($_COOKIE[$cookie_name])) {

              $rand_id = rand(0,2147483640 );

              $cookie_name = "umbra_login";

              setcookie($cookie_name, $rand_id, time() + 86400, "/"); /* 86400 = 1 day*/

              $conn2 = new mysqli($servername, $username, $password, $database);

              $mail = mysqli_real_escape_string ( $conn2 , $mail );
              $passwd = mysqli_real_escape_string ( $conn2 , $passwd );

              if ($conn2->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $sql2 = "INSERT INTO user_login_cookies VALUES (".$rand_id.",'".$mail."')" ;

              $result2 = $conn2->query($sql2);

              if (!$result2) {
                  echo "DB Error, could not query the database in insert cookie value\n";
                  echo 'MySQL Error: ' . mysql_error();
              }
              mysqli_close($conn2);
          }
      ?>
         <div style = 'text-align: center;'>
                <form action = '' method = ''>
                <input type = "button" onclick = "window.location='./create_character/create_character.php'"value = "Create new character" />
                </form>
             </div>
        <?php
                }
                else{
                    echo "Wrong password";
                }
                }
                } else {
                    echo "You are not registered";
                }
            ?>
        <?php
            session_start();

            $_SESSION['passwd'] = $passwd;
            $_SESSION['mail'] = $mail;
            ?>

            <?php

            $servername = "localhost";
            $username = "player";
            $password = "player";
            $database = "umbra";

            $conn = new mysqli($servername, $username, $password, $database);

            $mail = mysqli_real_escape_string ( $conn , $mail );
            $passwd = mysqli_real_escape_string ( $conn , $passwd );

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT C.ID_char as ID,Name_char,Lvl,Area,Gold,Xp,Xp_to_next_level,PC.Clas FROM Characters C,User_Account U, PC  WHERE U.Email='" .$mail. "' AND U.Pasword='".$passwd."' AND U.Email=PC.Email AND C.ID_char=PC.ID_char" ;

            $result = $conn->query($sql);

            if (!$result) {
            echo "DB Error, could not query the database in characters\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
            }

            if ($result->num_rows > 0) {
        ?>

        <!--Project Characters-->
        <div style = 'text-align: center;'><br><br>Characters<br><br></div>

        <style>
        table, th, td {
        border: 1px solid black;
        }
        </style>

        <table align = 'center'>
        <tr>
        <th>Character's Name</th>
        <th>Class</th>
        <th>Level</th>
        <th>Area</th>
        <th>Gold</th>
        <th>Xp</th>
        <th>Xp_to_next_level</th>
        </tr>

        <?php
            while($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row["Name_char"]. "</td> ";
            echo "<td>" . $row["Clas"]. "</td>";
            echo "<td>" . $row["Lvl"]. "</td>";
            echo "<td>" . $row["Area"]. "</td>";
            echo "<td>" . $row["Gold"]. "</td>";
            echo "<td>" . $row["Xp"]. "</td>";
            echo "<td>" . $row["Xp_to_next_level"]. "</td>";
            echo "</tr>";
            }
            echo"</table></div>";
            }
            /*Delete characters*/
        ?>
            <!--Add log out button-->

        <div style = 'text-align: center;'>
            <form  method = 'POST' action = 'select_character.php'>
                <?php
                    mysqli_data_seek ($result , 0 );
                    if ($result->num_rows > 0) {

                    echo '<br><br>Select character to play<br>';

                    /*Project Characters*/

                    echo '<select name="character">';
                    // echo '<option value="">Select...></option>';

                    // output data of each row

                    while($row = $result->fetch_assoc()) {
                    echo '<option  value="' . $row["ID"] . '">';
                    echo $row["Name_char"];
                    echo '</option>';
                    }
                    echo '
                    </select>
                    <input type = "submit" value = "Select">

                    </form>
                    ';
                    }
                ?>
            <div style = 'text-align: center;'>

                  <form action = '' method = ''>

                <input type = "submit" onclick = "return logout()" value = "Log out">
                      </form>
            </div>



            <script>
                function logout(){

                    var cookie_name = 'umbra_login';
                    document.cookie =
                        cookie_name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
                    alert("See you soon!");
                  window.location = "./login.html";
                return false;


                }
            </script>



            <br><br><br><br><br><br><br><br><br>
            <div  style = "text-align: right;"><h6  style = "text-align: center; height: 1px;"><br><span
            style = "font-weight: bold; font-family: STIX;"><span  style = "text-decoration: underline; font-style: italic;"></span></span><span
            style = "font-family: serif;">Designed & Tested by Umbra Team <br></span></h6><h6
            style = "text-align: center; height: 1px;"><span  style = "font-family: serif;"> March 2016<br></span></h6><h6
            style = "text-align: center; height: 6px;"><strong></strong>Lead Designer: Mamagiannos Dimitrios - Characters' interface Designer : Bakas Stylianos - Assistant Designer : Modouras Nektarios </h6><p><br></p></div>
        </div>

    </body>

</html>
