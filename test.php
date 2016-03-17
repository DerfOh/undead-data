<!--     Undead Data
    Copyright © 2016  Fredrick Paulin, James Sawchuck, Dennis Kellog, and Jonathon Tamm

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

 -->


<!DOCTYPE HTML5>
<?php
	echo'Current php version: ' . phpversion() . '</br>';
?>
<h2> Select a Location to get its info </h2>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM location";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="test.php" method="GET">
                       <select name="selectLocationRow">
                        <option value ="All"> All </option>
                            <?php
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                            ?>
                                <option value="<?php echo $line['name'];?>"> <?php echo $line['name'];?> </option>                
                        

                          <?php
                        }
                        ?>
                        </select>
                       <input type="submit">
                    </form>


                    
                    <?php
                      $servername = "localhost";
                      $username = "UndeadDataSite";
                      $password = "XXXXX";
                      $dbname = "zombiesurvival";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }

                      
                      echo "<h4>Survivors</h4>";
                      $selectedRow = $_GET['selectLocationRow'];
                      $sql = "SELECT * FROM location";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Resource</th><th>Survivors</th><th>Undead</th></tr>";
                          while($row = $result->fetch_assoc()) {
                            if ($row["name"] == $selectedRow){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["resources"]."</td><td>". $row["numberSurvivors"]."</td><td>". $row["numberUndead"]."</td></tr>";
                            } else if ($selectedRow == 'All'){


                              while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["name"]."</td><td>". $row["resources"]."</td><td>". $row["numberSurvivors"]."</td><td>". $row["numberUndead"]."</td></tr>";
                              }


                            }
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                  ?>

<!--     Undead Data
    Copyright © 2016  Fredrick Paulin, James Sawchuck, Dennis Kellog, and Jonathon Tamm

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

 -->