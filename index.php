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
		<title>Undead Data</title>
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
                  <li><a href="#description">Project Description</a></li>
                  <li><a href="#erModel">ER Model</a></li>
                  <li><a href="#tables">Tables</a></li>
                  <li><a href="#data">Data</a></li>
                  <li><a href="#discussion">Discussion</a></li>
                  <li><a href="#conclusion">Conclusion</a></li>
              	</ul>
  				</div>

      		</div>  
      		<div class="col-md-9">
              	<h1>Database Design Project</h1>
                
                <h2 id = "description">Project Description</h2>
                <p>Our project came about as the result of brainstorming ideas between myself, Fredrick, Dennis, and Jonathon. The first idea was to do a database about micro brews comparing them to macro brews. However, this idea was declined by Jonathon. So the other proposed idea was to do a zombie apocolypse scenario database using common nerd culture fictional characters, these being from both horror, sci-fi, and our favorite animated series. This idea was liked by all, as it used common knowledge. Not to mention the fact that it sounded more fun than the first idea. </p>

                <h2 id = "erModel">Entity Relationship Model</h2>
                <p><a href = "images/schema.jpg" ><image src = "images/schema.jpg" class="img-responsive"></image></a></p>
                  <h3>Description Continued</h3>
                  <p> As the idea developed we came up with our tables, the characters, and locations. Using the schema of having survivors assigned to teams, hailing from a certain location, using certain weapons, and finally their locations having certain resources. This database would probably best be suited to an RPG like game, or perhaps a game similar to "The Last of Us," which takes place is a post zombie apocolypse world. As we are using some characters based upon real people, I ensured that things such as age, orgin, and signature weapons were correct. We also revised the database to ensure that the locations, both real and fictitious, resources were adequately described. Finally, the schema was revised and improved upon until we arrived at the glorious database seen below. Behold, the Team Awesomesauce Undead Database! Bask in it's glory!  </p>

                <h2 id = "tables">Tables</h2>
                <p>Here are the create table statements that we used</p>
                <a href ="codefiles/createTables.sql">Link to SQL File</a>
                <p><code>create table location(
                  name varchar(20) primary key,
                  resources varchar(20),
                  numberSurvivors int,
                  numberUndead int
                );</code>

                <code>create table team(
                  name varchar(20) primary key,
                  daysOfRations int,
                  basedAt varchar(20) references location(name)
                );</code>

                <code>create table weapon(
                  name varchar(20) primary key,
                  type varchar(20),
                  skillNeeded varchar(20)
                );</code>

                <code>create table survivor(
                  name varchar(20) primary key,
                  age int,
                  skill varchar(20),
                  isLiving number(1),
                  hailsFrom varchar(20) references location(name),
                  belongsToTeam varchar(20) references team(name)
                );</code>


                <code>create table uses(
                  survivorName varchar(20) references survivor(name),
                  weaponName varchar(20) references weapon(name),
                  defeatedCount int,
                  primary key (survivorName, weaponName)
                );</code>
                

                <code>create table allys(
                  teamName varchar(20) references team(name),
                  allyName varchar(20) references team(name),
                  primary key (teamName, allyName)
                );</code>
                </p>

                <h2 id = "data">Data</h2>
                <p>Here are the insert statements we used</p>
                <p><a href ="codefiles/insertData.sql">Link to SQL File</a></p>
                <p>
                  Insert location values (name, resources, numberSurvivors, numberUndead)
                  <code>insert into location values ('charming', 'food', 20, 40);</code>
                  <code>insert into location values ('detroit', 'medical', 300, 4000);</code>
                  <code>insert into location values ('indiana', 'medical', 700, 4000);</code>
                  <code>insert into location values ('chicago', 'water', 1000, 100000);</code>
                  <code>insert into location values ('tattoine', 'weapons', 10, 200);</code>
                  <code>insert into location values ('oklahoma', 'food', 20, 400);</code>
                  <code>insert into location values ('pittsburgh', 'weapons', 300, 3000);</code>
                  <code>insert into location values ('crystal lake', 'water', 400, 5000);</code>
                  <code>insert into location values ('quahog', 'food', 600, 7000);</code>
                </p>

                <p>
                  Insert team values (name, daysRations, basedAt)
                  <code>insert into team values ('team1', 24, 'chicago');</code>
                  <code>insert into team values ('team2', 31, 'charming');</code>
                  <code>insert into team values ('team3', 15, 'detroit');</code>
                </p>

                <p>
                  Insert weapon values (name, type, skillNeeded)
                  <code>insert into weapon values ('kabar', 'sharp-object', 'melee');</code>
                  <code>insert into weapon values ('9mm', 'handgun', 'firearms');</code>
                  <code>insert into weapon values ('magnum', 'handgun', 'firearms');</code>
                  <code>insert into weapon values ('lightsabre', 'sharp-object', 'melee');</code>
                  <code>insert into weapon values ('martial-arts', 'fists', 'melee');</code>
                  <code>insert into weapon values ('puppets', 'blunt-object', 'melee');</code>
                  <code>insert into weapon values ('machete', 'sharp-object', 'melee');</code>
                  <code>insert into weapon values ('slashing-glove', 'sharp-object', 'melee');</code>
                  <code>insert into weapon values ('cupcakes', 'blunt-object', 'melee');</code>
                </p>

                <p>
                  Insert survivor values (name, age, skill, isLiving, hailsFrom, belongsToTeam) 
                  <code>insert into survivor values ('Jax Teller',37,'melee',1,'charming','team1');</code>
                  <code>insert into survivor values ('Robocop',40,'firearms',1,'detroit','team1');</code>
                  <code>insert into survivor values ('Darth Vader',null,'melee',1,'tattoine','team2');</code>
                  <code>insert into survivor values ('Chuck Norris',75,'melee',1,'oklahoma','team2');</code>
                  <code>insert into survivor values ('Fred Rogers',74,'melee',0,'pittsburgh','team2');</code>
                  <code>insert into survivor values ('Jason Voorhees',25,'melee',1,'crystal lake','team3');</code>
                  <code>insert into survivor values ('Mr T',63,'firearms',1,'chicago','team1');</code>
                  <code>insert into survivor values ('Freddy Krueger',45,'melee',1,'indiana','team3');</code>
                  <code>insert into survivor values ('Peter Griffin',47,'melee',1,'quahog','team3');</code>
                </p>

                <p>
                  insert into allys values (team1, team2)
                  <code>insert into allys values ('team1', 'team2');</code>
                  <code>insert into allys values ('team2', 'team3');</code>
                  <code>insert into allys values ('team2', 'team1');</code>
                  <code>insert into allys values ('team2', 'team2');</code>
                  <code>insert into allys values ('team3', 'team3');</code>
                </p>

                <p>
                  insert into uses values (survivorName, weaponName, deafeatedCount)
                  <code>insert into uses values ('Jax Teller', 'kabar', 25);</code>
                  <code>insert into uses values ('Robocop', '9mm', 15);</code>
                  <code>insert into uses values ('Darth Vader', 'lightsabre', 50);</code>
                  <code>insert into uses values ('Chuck Norris', 'martial-arts', 500);</code>
                  <code>insert into uses values ('Fred Rogers', 'puppets', 3);</code>
                  <code>insert into uses values ('Jason Voorhees', 'machete', 250);</code>
                  <code>insert into uses values ('Mr T', 'magnum', 120);</code>
                  <code>insert into uses values ('Freddy Krueger', 'slashing-glove', 120);</code>
                  <code>insert into uses values ('Peter Griffin', 'cupcakes', 2);</code>
                  We made this table so that a survivor can use multiple weapons. 
                </p>

                <h3>Results for each table:</h3>

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

                      echo "<h4>Locations</h4>";
                      $sql = "SELECT * from location";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Resources</th><th>Number Survivors</th><th>Number Undead</th></tr>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["name"]."</td><td>". $row["resources"]."</td><td>". $row["numberSurvivors"]."</td><td>". $row["numberUndead"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }


                      echo "<h4>Teams</h4>";
                      $sql = "SELECT * from team";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Days of Rations</th><th>Based at</th></tr>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["name"]."</td><td>". $row["daysOfRations"]."</td><td>". $row["basedAt"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }


                      echo "<h4>Allys</h4>";
                      $sql = "SELECT * from allys";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Ally</th>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["teamName"]."</td><td>".$row["allyName"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }


                      echo "<h4>Weapons</h4>";
                      $sql = "SELECT * from weapon";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Type</th><th>Skill Needed</th></tr>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["name"]."</td><td>". $row["type"]."</td><td>". $row["skillNeeded"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }


                      echo "<h4>Survivors</h4>";
                      $sql = "SELECT * from survivor";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Age</th><th>Skill</th><th>Is Living</th><th>Home Town</th><th>Member of</th>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["skill"]."</td><td>". $row["isLiving"]."</td><td>". $row["hailsFrom"]."</td><td>". $row["belongsToTeam"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }

                      echo "<h4>Uses</h4>";
                      $sql = "SELECT * from uses";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row in a table
                          echo "<table><tr><th>Name</th><th>Weapon</th><th>Defeated Count</th>";
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["survivorName"]."</td><td>".$row["weaponName"]."</td><td>".$row["defeatedCount"]."</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }
                     
                      $conn->close();
                  ?>

                <h2 id = "discussion">Insights Gained</h2>
                <p>Throughout working on this project, we learned quite a lot from different aspects of this project. Beginning with the team itself, which is composed of four males three of which are on campus students while the other is a distance learner, we learned how to overcome the challenge presented with distance group collaboration through online platforms that allow for team meetings and sharing of information. Furthermore, we learned that each group member has diverse preferences due to their overall background and generally can agree on a middle ground once a disagreement arises regarding the progression of the project. Lastly and perhaps most importantly we learned how to effectively build an sql database as a group by leveraging each group members technical strengths and intellectual. </p>

                <h2 id = "conclusion">Conclusion</h2>
                <p> In conclusion, our project is a modified dungeons and dragons game that is post zombie apocalypse. The types of things our project does is allows you to select a survivor i.e. Darth Vader and allows you to see what types of weapons he uses along with which team he is associated with. This also tracks how many zombies he has slain and how many survivors there are in the area he is currently located. The way we came up with all this was by sheer creativity on the groups part and many TeamViewer sessions. It might be helpful to add that the game is loosely based off The Walking Dead hence the zombie apocalypse theme. Throughout our collaborations as a team, we have came up with the data needed to populate the tables. </p>

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