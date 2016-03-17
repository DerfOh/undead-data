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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Queries</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlestrong.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>

<header class="navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand">Undead Data</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="queries.php">Queries</a>
        </li>
        <li>
          <a href="credits.php">Credits</a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<!-- Begin Body -->
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              	
				<div class="well"> 
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="#living">Top Weapons and Users</a></li>
                  <li><a href="#locals">Local Experts</a></li>
                  <li><a href="#firearmsSpecialists">Firearms Specialists</a></li>
                  <li><a href="#kia">Survivors KIA</a></li>
                  <li><a href="#freshWater">Fresh Water</a></li>
              	</ul>
  				</div>

      		</div>  
      		<div class="col-md-9">
              	<h1>Database Design Project</h1>

                <h2>Select Statements</h2>

                <h3> Select a Survivor to get their info </h3>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM survivor";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="queries.php" method="GET">
                       <select name="selectSurvivorRow">
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
                      $selectedRow = $_GET['selectSurvivorRow'];
                      $sql = "SELECT * FROM survivor";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Age</th><th>Skill</th><th>Is Living</th><th>Home Town</th><th>Member of</th></tr>";
                          
                          while($row = $result->fetch_assoc()) {
                            if ($row["name"] == $selectedRow){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["age"]."</td><td>". $row["skill"]."</td><td>". $row["isLiving"]."</td><td>". $row["hailsFrom"]."</td><td>". $row["belongsToTeam"]."</td></tr>";
                            }
                            if ($selectedRow == 'All'){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["age"]."</td><td>". $row["skill"]."</td><td>". $row["isLiving"]."</td><td>". $row["hailsFrom"]."</td><td>". $row["belongsToTeam"]."</td></tr>";
                            }
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                  ?>



                  <h3 id = 'selectLocationSection'> Select a Location to get its info </h3>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM location";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="queries.php#selectLocationSection" method="GET">
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
                      $username = "XXXXX";
                      $password = "XXXXX";
                      $dbname = "zombiesurvival";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }

                      
                      echo "<h4>Location</h4>";
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
                              echo "<tr><td>".$row["name"]."</td><td>". $row["resources"]."</td><td>". $row["numberSurvivors"]."</td><td>". $row["numberUndead"]."</td></tr>";
                            }


                            
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                  ?>




                    <h3 id = 'selectWeaponSection'> Select a Weapon to get its info </h3>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM weapon";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="queries.php#selectWeaponSection" method="GET">
                       <select name="selectWeaponRow">
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
                      $username = "XXXXX";
                      $password = "XXXXX";
                      $dbname = "zombiesurvival";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }

                      
                      echo "<h4>Weapons</h4>";
                      $selectedRow = $_GET['selectWeaponRow'];
                      $sql = "SELECT * FROM weapon";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Type</th><th>Skill Needed</th></tr>";
                          while($row = $result->fetch_assoc()) {
                            if ($row["name"] == $selectedRow){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["type"]."</td><td>". $row["skillNeeded"]."</td></tr>";
                            } else if ($selectedRow == 'All'){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["type"]."</td><td>". $row["skillNeeded"]."</td></tr>";
                            }
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                      ?>





                      <h3 id = 'selectTeamSection'> Select a Team to get its info </h3>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM team";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="queries.php#selectTeamSection" method="GET">
                       <select name="selectTeamRow">
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
                      $username = "XXXXX";
                      $password = "XXXXX";
                      $dbname = "zombiesurvival";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      // Check connection
                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }

                      
                      echo "<h4>Team</h4>";
                      $selectedRow = $_GET['selectTeamRow'];
                      $sql = "SELECT * FROM team";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Days of Rations</th><th>Based At</th></tr>";
                          while($row = $result->fetch_assoc()) {
                            if ($row["name"] == $selectedRow){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["daysOfRations"]."</td><td>". $row["basedAt"]."</td></tr>";
                            } else if ($selectedRow == 'All'){
                              echo "<tr><td>".$row["name"]."</td><td>". $row["daysOfRations"]."</td><td>". $row["basedAt"]."</td></tr>";
                            }
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                  ?>



                      <h3 id = 'selectAllySection'> Select a Team to get it's Allies </h3>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM allys";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="queries.php#selectAllySection" method="GET">
                       <select name="selectAllyRow">
                        <option value ="All"> All </option>
                            <?php
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                            ?>
                                <option value="<?php echo $line['teamName'];?>"> <?php echo $line['teamName'];?> </option>                
                        

                          <?php
                        }
                        ?>
                        </select>
                       <input type="submit">
                    </form>                   
                    
                    
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

                      
                      $selectedRow = $_GET['selectAllyRow'];
                      $sql = "SELECT * FROM allys";
                      $result = $conn->query($sql);

                      echo "<h4>".$selectedRow." Allys"."</h4>";
                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          //echo "<table><tr><th>Name</th><th>Ally</th></tr>";
                          if ($selectedRow == 'All'){
                            echo "<table><tr><th>Name</th><th>Ally</th></tr>";
                          }else{
                            echo "<table><tr><th>Ally</th></tr>";
                          }
                            
                          while($row = $result->fetch_assoc()) {

                            if ($row["teamName"] == $selectedRow){
                              
                              echo "<tr><td>". $row["allyName"]."</td></tr>";
                            } else if ($selectedRow == 'All'){                              
                              echo "<tr><td>".$row["teamName"]."</td><td>". $row["allyName"]."</td></tr>";
                            }
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                  ?>






                      <h3 id = 'selectUsesSection'> Select a survivor to see their loadout</h3>
            
                <?php
                    mysql_connect("localhost", "XXXXX", "XXXXX") or die("Connection Failed");
                    mysql_select_db("zombiesurvival")or die("Connection Failed");
                    $query = "SELECT * FROM uses";
                    $result = mysql_query($query);
                    ?>
                    
                    <form action="queries.php#selectUsesSection" method="GET">
                       <select name="selectUsesRow">
                        <option value ="All"> All </option>
                            <?php
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                            ?>
                                <option value="<?php echo $line['survivorName'];?>"> <?php echo $line['survivorName'];?> </option>                
                        

                          <?php
                        }
                        ?>
                        </select>
                       <input type="submit">
                    </form>                   
                    
                    
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

                      
                      $selectedRow = $_GET['selectUsesRow'];
                      $sql = "SELECT * FROM uses";
                      $result = $conn->query($sql);

                      echo "<h4>".$selectedRow."</h4>";
                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          //echo "<table><tr><th>Name</th><th>Ally</th></tr>";
                          if ($selectedRow == 'All'){
                            echo "<table><tr><th>Name</th><th>Weapon</th><th>Defeated Count</th></tr>";
                          }else{
                            echo "<table><tr><th>Weapon</th><th>Defeated Count</th></tr>";
                          }
                            
                          while($row = $result->fetch_assoc()) {

                            if ($row["survivorName"] == $selectedRow){
                              
                              echo "<tr><td>". $row["weaponName"]."</td><td>".$row["defeatedCount"]."</td></tr>";
                            } else if ($selectedRow == 'All'){                              
                              echo "<tr><td>". $row["survivorName"]."</td><td>".$row["weaponName"]."</td><td>".$row["defeatedCount"]."</td></tr>";
                            }
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      
                      $conn->close();
                  ?>





                <h2>Other Interesting Queries</h2>
                
                  <p><a href = "codefiles/databaseQueries.sql">Link to queries SQL file</a></p>
                <h3 id = "living"> Top scoring weapons and their user </h3>
                <p>
                <strong>select uses.weaponName, uses.defeatedCount, uses.survivorName from uses order by uses.defeatedCount desc;</strong>
                </p>
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

                      $sql = "SELECT uses.weaponName, uses.defeatedCount, uses.survivorName from uses order by uses.defeatedCount desc";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Defeated</th><th>Survivor</th></tr>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["weaponName"]."</td><td>". $row["defeatedCount"]."</td><td>". $row["survivorName"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }
                      $conn->close();
                  ?>


                <h3 id = 'locals'> Local experts in a team</h3>
                <p><strong>select survivor.name, team.basedAt from survivor, team where survivor.hailsfrom = team.basedAt;</strong></p>
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

                    $sql = "SELECT survivor.name, team.basedAt from survivor, team where survivor.hailsfrom = team.basedAt";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row in a table
                        echo "<table><tr><th>Survivor</th><th>location</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["name"]."</td><td>". $row["basedAt"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                  ?>

                  <h3 id = 'firearmsSpecialists'>Survivors who are skilled with firearms</h3>
                  <p>
                  <strong>select uses.survivorName, uses.weaponName from uses, weapon where uses.weaponName = weapon.name and weapon.skillNeeded = 'firearms';</strong>
                  </p>
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

                    $sql = "SELECT uses.survivorName, uses.weaponName from uses, weapon where uses.weaponName = weapon.name and weapon.skillNeeded = 'firearms'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row in a table
                        echo "<table><tr><th>Name</th><th>Weapon</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["survivorName"]."</td><td>". $row["weaponName"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                  ?>

                  <h3 id = 'kia'>Survivors KIA</h3>
                  <p>
                  <strong>select name from survivor where isLiving = 0;</strong>
                  </p>
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

                    $sql = "SELECT name from survivor where isLiving = 0";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row in a table
                        echo "<table><tr><th>Name</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["name"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                  ?> 

                  <h3 id = 'freshWater'>Locations with fresh water</h3>
                  <p>
                  <strong>select location.name from location where location.resources ='water';</strong>
                  </p>
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

                    $sql = "SELECT location.name from location where location.resources ='water'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row in a table
                        echo "<table><tr><th>Name</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["name"]."</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                  ?> 
          
          <hr />
          <?php echo'<p>Webpage built by Fredrick Paulin using: PHP:' . phpversion() . ', HTML5, Javascript, Bootstrap 3, and mySQL</p>'; ?>
              	
              	
      		</div> 
  	</div>
</div>



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
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