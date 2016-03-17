   -- Undead Data
   --  Copyright © 2016  Fredrick Paulin, James Sawchuck, Dennis Kellog, and Jonathon Tamm

   --  This program is free software: you can redistribute it and/or modify
   --  it under the terms of the GNU General Public License as published by
   --  the Free Software Foundation, either version 3 of the License, or
   --  (at your option) any later version.

   --  This program is distributed in the hope that it will be useful,
   --  but WITHOUT ANY WARRANTY; without even the implied warranty of
   --  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   --  GNU General Public License for more details.

   --  You should have received a copy of the GNU General Public License
   --  along with this program.  If not, see <http://www.gnu.org/licenses/>.

--insert into location values (name, resources, numberSurvivors, numberUndead);
insert into location values ('charming', 'food', 20, 40);
insert into location values ('detroit', 'medical', 300, 4000);
insert into location values ('indiana', 'medical', 700, 4000);
insert into location values ('chicago', 'water', 1000, 100000);
insert into location values ('tattoine', 'weapons', 10, 200);
insert into location values ('oklahoma', 'food', 20, 400);
insert into location values ('pittsburgh', 'weapons', 300, 3000);
insert into location values ('crystal lake', 'water', 400, 5000);
insert into location values ('quahog', 'food', 600, 7000);


--insert into team values (name, daysRations, basedAt);
insert into team values ('team1', 24, 'chicago');
insert into team values ('team2', 31, 'charming');
insert into team values ('team3', 15, 'detroit');


--insert into weapon values (name, type, skillNeeded);
insert into weapon values ('kabar', 'sharp-object', 'melee');
insert into weapon values ('9mm', 'handgun', 'firearms');
insert into weapon values ('magnum', 'handgun', 'firearms'); --had to change the '.357' to 'magnum' due to how oracle handled '.357' when creating rows in the survivor table. Seems that it had something to do with the decimal
insert into weapon values ('lightsabre', 'sharp-object', 'melee');
insert into weapon values ('martial-arts', 'fists', 'melee');
insert into weapon values ('puppets', 'blunt-object', 'melee');
insert into weapon values ('machete', 'sharp-object', 'melee');
insert into weapon values ('slashing-glove', 'sharp-object', 'melee');
insert into weapon values ('cupcakes', 'blunt-object', 'melee');


/*insert into survivor values (name, age, skill, isLiving, hailsFrom, belongsToTeam);*/

insert into survivor values ('Jax Teller', 37,'melee',1,'charming','team1');
insert into survivor values ('Robocop',	40,'firearms',1,'detroit','team1');
insert into survivor values ('Darth Vader',	null,'melee',1,'tattoine','team2');
insert into survivor values ('Chuck Norris', 75,'melee',1,'oklahoma','team2');
insert into survivor values ('Fred Rogers', 74,'melee',0,'pittsburgh','team2');
insert into survivor values ('Jason Voorhees', 25,'melee',1,'crystal lake','team3');
insert into survivor values ('Mr T',63,'firearms',1,'chicago','team1');
insert into survivor values ('Freddy Krueger',45,'melee',1,'indiana','team3');
insert into survivor values ('Peter Griffin',47,'melee',1,'quahog','team3');


/*insert into allys values (team1, team2)*/
insert into allys values ('team1', 'team2');
insert into allys values ('team2', 'team3');
insert into allys values ('team2', 'team1');
insert into allys values ('team2', 'team2');
insert into allys values ('team3', 'team3');


/*insert into uses values (survivorName, weaponName, deafeatedCount)*/
insert into uses values ('Jax Teller', 'kabar', 25);
insert into uses values ('Robocop', '9mm', 15);
insert into uses values ('Darth Vader', 'lightsabre', 50);
insert into uses values ('Chuck Norris', 'martial-arts', 500);
insert into uses values ('Fred Rogers', 'puppets', 3);
insert into uses values ('Jason Voorhees', 'machete', 250);
insert into uses values ('Mr T', 'magnum', 120);
insert into uses values ('Freddy Krueger', 'slashing-glove', 120);
insert into uses values ('Peter Griffin', 'cupcakes', 2);



--SQL Developer results





--created by Fredrick Paulin for Team Awesomesauce
