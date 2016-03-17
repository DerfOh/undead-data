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



--User can find the team members who are from the town they are based at
select survivor.name, team.basedAt from survivor, team where survivor.hailsfrom = team.basedAt;

--Users can find top scoring weapons and their user
select uses.weaponName, uses.defeatedCount, uses.survivorName from uses order by uses.defeatedCount desc;

--User can check the list of survivors who have perished
select name from survivor where isLiving = 0;

--Users can find survivors who are skilled with firearms
select uses.survivorName, uses.weaponName from uses, weapon where uses.weaponName = weapon.name and weapon.skillNeeded = 'firearms'; 

--User can see which locations have which resources
select location.name from location where location.resources ='water';