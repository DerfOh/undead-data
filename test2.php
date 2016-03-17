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
                      $servername = "localhost";
                      $username = "XXXXX";
                      $password = "XXXXX";
                      $dbname = "zombiesurvival";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }

                      
                      echo "<h4>Survivors</h4>";
                      $selectedRow = $_POST['selectRow'];
                      echo $selectedRow;
                      $sql = "SELECT * FROM survivor";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Resources</th><th>Living</th><th>Undead</th></tr>";
                          while($row = $result->fetch_assoc()) {
                            if ($row["name"] == $selectedRow)
                              {echo "<tr><td>".$row["name"]."</td><td>". $row["resources"]."</td><td>". $row["numberSurvivors"]."</td><td>". $row["numberUndead"]."</td></tr>";}
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