<!DOCTYPE html>

<?php
    $servername = "localhost";
    $username = "umbra_system";
    $password = "system";
    $database  = "umbra";

    $name_char=$_POST['name_char'];
    $clas=$_POST['clas'][0];
    $gender=$_POST['gender'][0];

    $cookie_name = "umbra_login";

    if (!isset($_COOKIE[$cookie_name])) {
    } else {
        $conn = new mysqli($servername, $username, $password, $database);

        $name_char =mysqli_real_escape_string($conn, $name_char);
        $clas =mysqli_real_escape_string($conn, $clas);

        $gender =mysqli_real_escape_string($conn, $gender);

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


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


while (true) {
    $rand_id = rand(0, 2147483640);
    $sql = "Insert into Characters (ID_char,Name_char,Area) VALUES ('".$rand_id."','".$name_char."','Starting Area') " ;

    $result = $conn->query($sql);
    if (!$result) {
        continue;
    } else {
        break;
    }
}


    $sql = "Insert into PC (ID_char, Gender,Clas,Email) VALUES ('".$rand_id."','".$gender."','".$clas."','".$mail."') " ;

     $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error: ' . mysql_error();
        }



    $sql = "Insert into Characters_in_quests VALUES ('".$rand_id."','Beginner Quest',0,0,1,NULL,NULL,NULL) " ;

     $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error1, could not query the database";
            echo 'MySQL Error: ' . mysql_error();
        }




     while (true) {
         $rand_id2 = rand(0, 2147483640);
         $sql = "INSERT INTO Item VALUES('".$rand_id2."','Small Health Potion','Normal','Restores health',1,5,'Potion',0,1,1,NULL,NULL,0,0,0,0,0,0);";
         $result = $conn->query($sql);
         if (!$result) {
             continue;
         } else {
             break;
         }
     }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','potion',5,'".$current_time."',NULL); " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error2: ' . mysql_error();
        }



    if (!strcasecmp($clas, "fighter")) {
        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Civilian Sword','Normal','Can not cut anything',1,10,'Sword',1,0,0,5,0,0,0,0,0,0,0)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','main hand',NULL,'".$current_time."',NULL); " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error3: ' . mysql_error();
        }


        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Round Shield','Basic','A basic shield',1,10,'Shield',1,0,0,0,0,0,0,30,0,0,0)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','off hand',NULL,'".$current_time."',NULL); " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error4: ' . mysql_error();
        }

        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Heavy Armour','Basic', 'Simple heavy armor.',1,20,'Armour',1,0,0,0,0,50,50,10,20,0,20)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','armour',NULL,'".$current_time."',NULL); " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error5: ' . mysql_error();
        }
    }



    if (!strcasecmp($clas, "rogue")) {
        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Simple Dagger','Basic','Simple Dagger',0,NULL,'1H_Weapon',1,0,0,10,0,20,0,0,10,10,0)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','off hand',NULL,'".$current_time."',NULL) " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error3: ' . mysql_error();
        }


        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Simple Dagger','Basic','Simple Dagger',0,NULL,'1H_Weapon',1,0,0,10,0,20,0,0,10,10,0)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','main hand',NULL,'".$current_time."',NULL) " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error4: ' . mysql_error();
        }

        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Light Armour','Basic', 'Simple light armor.',1,20,'Armour',1,0,0,0,0,30,30,20,20,0,10)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','armour',NULL,'".$current_time."',NULL) " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error5: ' . mysql_error();
        }
    }



    if (!strcasecmp($clas, "wizard")) {
        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Simple Staff','Basic','Simple Staff',0,NULL,'1H_Weapon',1,0,0,10,0,0,0,10,20,10,0)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','two-handed',NULL,'".$current_time."',NULL) " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error3: ' . mysql_error();
        }




        while (true) {
            $rand_id2 = rand(0, 2147483640);
            $sql = "INSERT INTO Item VALUES('".$rand_id2."','Robes','Basic', 'Simple robes.',1,20,'Armour',1,0,0,0,0,10,10,10,0,20,10)";
            $result = $conn->query($sql);
            if (!$result) {
                continue;
            } else {
                break;
            }
        }
        $current_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Items_owned_by_characters VALUES('".$rand_id."','".$rand_id2."','equip','armour',NULL,'".$current_time."',NULL) " ;
        $result = $conn->query($sql);
        if (!$result) {
            echo "DB Error, could not query the database";
            echo 'MySQL Error5: ' . mysql_error();
        }
    }
?>

<script>
    alert("The character has been created. Go and play the beginner quest as soon as you can.");
    window.location = '../log.php';
</script>
