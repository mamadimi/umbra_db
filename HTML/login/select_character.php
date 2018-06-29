<html>
    <head>
        <meta  content="text/html; charset=windows-1252"  http-equiv="content-type">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
    </head>
    <body id="el3">
        <h1  style=" text-align: center;"><span  style="color: rgb(255, 0, 0);">Umbra</span>
        &amp; <span  style="color: rgb(0, 0, 153);">Antumbra</span></h1>
        <p  style="text-align: center;">where there is no light and ... the <strong
        style="text-decoration: underline; font-family: Droid Sans Hebrew;">CHAOS</strong>
        begins.</p>
        
        <p  style="text-align: center;">
        </p>
        <p  style="text-align: center;">
        </p>


     
             <?php
                $ID_char = $_POST['character'];
            
                $servername = "localhost";
                $username = "umbra_system";
                $password = "system";
                $database  = "umbra";

                $conn3 = new mysqli($servername, $username, $password, $database);

                if ($conn3->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql3 = "select Clas, Gender
                from PC
                where ID_Char ='".$ID_char."'";
            
            
                $result3 = $conn3->query($sql3);

                if (!$result3) {
                    echo "DB Error, could not query the database in characters\n";
                    echo 'MySQL Error: ' . mysql_error();
                    
                }

                if ($result3->num_rows > 0) {
              

                    while($row = $result3->fetch_assoc()) {

                        $clas=$row["Clas"];
                        $gender=$row["Gender"];
                       

                    }

                }

            ?>
        
         <div style="text-align: center;">
 
        <img  title="<?php echo $clas;?>&nbsp;<?php echo $gender; ?>"   src="./character_portraits/<?php echo $clas; ?>_<?php echo $gender; ?>.jpg" width="140" height="220">
        <br>
             

</div>
                    
        
        <div style="text-align: center;">
            <?php
               

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "select Item.Name_Item,
                Items_owned_by_characters.Slot,Items_owned_by_characters.Place,Item.Description_item
                from Item
                JOIN Items_owned_by_characters
                ON Items_owned_by_characters.ID_item=Item.ID_item AND
                Items_owned_by_characters.End_Time is NULL AND Items_owned_by_characters.ID_Char ='".$ID_char."'";
            
            
                $result = $conn->query($sql);

                if (!$result) {
                    echo "DB Error, could not query the database in characters\n";
                    echo 'MySQL Error: ' . mysql_error();
                    
                }

                if ($result->num_rows > 0) {
                ?>

                <!--Project Characters-->
                <div style='text-align: center;'><br>Character's Items<br></div>

                <style>
                    table, th, td {
                    border: 1px solid black;
                    }
                </style>

                <table align='center'>
                <tr>
                <th>Item's Name</th>
                <th>Slot</th>
                <th>Place</th>
                <th>Item's Description</th>
                </tr>

                <?php


                while($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $row["Name_Item"]. "</td> ";
                echo "<td>" . $row["Slot"]. "</td>";
                echo "<td>" . $row["Place"]. "</td>";
                echo "<td>" . $row["Description_item"]. "</td>";
   
                echo "</tr>";


                }
                echo"</table></div>";


                }
                 else{
                        ?>
                        <div style='text-align: center;'><br>No Items<br><br></div>
                    <?php
                    }

            ?>
                    
                
                    
              
            <?php

                    $conn2 = new mysqli($servername, $username, $password, $database);
                if ($conn2->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                    
                $sql2 = "SELECT Characters_in_quests.ID_char,Quest.Name_Quest, In_Progress ,
                Xp_Reward,Gold_Reward, Description_quest
                FROM Quest, Characters_in_quests,PC
                WHERE Quest.Name_Quest=Characters_in_quests.Name_Quest and Characters_in_quests.ID_char=PC.ID_char and  Characters_in_quests.ID_Char ='".$ID_char."'";
                   // $sql2 = "SELECT * FROM Quest";
                   $result2 = $conn->query($sql2); 
                    
                    
                
                    if (!$result2) {
                    echo "DB Error, could not query the database in characters\n";
                    echo 'MySQL Error: ' . mysql_error();
                    
                }
                    if ($result2->num_rows > 0) {
            ?>
                    
                <div style='text-align: center;'><br>Character's Quests<br></div>

                <style>
                    table, th, td {
                    border: 1px solid black;
                    }
                </style>

                <table align='center'>
                <tr>
                <th>Quest's Name</th>
                <th>Quest's Progress</th>
                <th>Quest's XP Reward</th>
                <th>Quest's Gold Reward</th>
                <th>Quest's Description</th>
                <th>Click to play mission</th>

                </tr>

              
            <?php 
                while($row = $result2->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $row["Name_Quest"]. "</td> ";
                echo "<td>" . $row["In_Progress"]. " %</td> ";                  
                echo "<td>" . $row["Xp_Reward"]. "</td> ";
                echo "<td>" . $row["Gold_Reward"]. "</td>";
                echo "<td>" . $row["Description_quest"]. "</td>";
                echo" <td><div style='text-align: center;'><form> <input type='button' value ='Play' /></form></td></div>";
                
                echo "</tr>";


                }
                echo"</table></div>";
                    
                    
                    }
                    else{
                        ?>
                        <div style='text-align: center;'><br><br>No Quests<br></div>
                    <?php
                    }
             
                ?> 
                    
                
              <br>            
            <div style='text-align: center;'> 
            <form  method='POST' action='delete_character.php'>
                
            
                    <input type="hidden" name="character" value = "<?php echo $ID_char;  ?>" >
                    <input type="submit" value="Delete this character">
              
            </form>
                              
            <form>
            <input type="button" onclick="window.location='./log.php'"value ="Go Back to characters preview" />
            </form> 
            </div>

                     
  
        </div>

            <br>
            <div  style="text-align: right;"><h6  style="text-align: center; height: 1px;"><br><span
            style="font-weight: bold; font-family: STIX;"><span  style="text-decoration: underline; font-style: italic;"></span></span><span
            style="font-family: serif;">Designed & Tested by Umbra Team <br></span></h6><h6
            style="text-align: center; height: 1px;"><span  style="font-family: serif;"> March 2016<br></span></h6><h6
            style="text-align: center; height: 6px;"><strong></strong>Lead Designer : Mamagiannos Dimitrios - Characters' interface Designer : Bakas Stylianos - Assistant Designer : Modouras Nektarios </h6><p><br></p></div>
                    
                      <audio  autoplay>
            <source src="select_character.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        
    </body>

</html> 
