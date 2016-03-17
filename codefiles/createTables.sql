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

create table location(
	name varchar(20) primary key,
	resources varchar(20),
	numberSurvivors int,
	numberUndead int
);

create table team(
	name varchar(20) primary key,
	daysOfRations int,
	basedAt varchar(20) references location(name)
);

create table weapon(
	name varchar(20) primary key,
	type varchar(20),
	skillNeeded varchar(20)
);

create table survivor(
	name varchar(20) primary key,
	age int,
	skill varchar(20),
	isLiving number(1),
	hailsFrom varchar(20) references location(name),
	belongsToTeam varchar(20) references team(name)
);
--isLiving boolean, <- 	there is no boolean datatype in oracle server
	--instead we must use the following method of creating a single digit variable with a value of 1 or 0 depending on the boolean state

create table uses(
	survivorName varchar(20) references survivor(name),
	weaponName varchar(20) references weapon(name),
	defeatedCount int,
	primary key (survivorName, weaponName)
);

create table allys(
	teamName varchar(20) references team(name),
	allyName varchar(20) references team(name),
	primary key (teamName, allyName)
);



/*

drop table uses;
drop table allys;
drop table survivor;
drop table weapon;
drop table team;
drop table location;

 */


--created by Fredrick Paulin for Team Awesomesauce
