<!--Journal indexer
    Copyright (C) <2010>  <Pranav Ashok & Clive Verghese>

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
<?php 

		require_once("database.php");

		function fetch_results($value, $field)
		{	
			if($field=="all fields") {
				$sql = "SELECT * FROM `listing2` WHERE `journal` LIKE '%".$value."%' OR `title` LIKE '%".$value."%' OR `authors` LIKE '%".$value."%' OR `year` LIKE '%".$value."%' OR `location` LIKE '%".$value."%' OR `keywords` LIKE '%".$value."%' ORDER BY year ASC";
			}
			else
				$sql = "SELECT * FROM listing2 WHERE " . $field . " LIKE '%" . $value . "%' ORDER BY year ASC";
			$ref = mysql_query($sql);
			$i = 0;
			echo "<table id='results' class='results'>
				<tr><th colspan='6' style=\"text-align:center\">Results for the query \"$value\" in $field</th></tr>
				<tr><th>Title</th><th>Journal</th><th>Author(s)</th><th>Year</th><th>Location</th><th></th></tr>";
			while($row = mysql_fetch_assoc($ref))
			{
				$rows[$i] = $row;
				$str = addslashes($row['location']); //^\/.*\/([^\/]+)$
				ereg( '^\/.*\/Journals/(.+)$', $row['location'], $filename );
				echo "<tr>
					<td>". $row['title'] . "</td><td>" . $row['journal'] . 
					"</td><td><a href=\"result.php?value=".$row['authors']."&field=authors\">" . $row['authors'] . 
					"</a></td><td>" . $row['year'] . "</td><td><a href=\"$str\">/$str" . 
					"</a></td><td><a href=\"edit.php?e=".$row['id']."\">Edit</a></td></tr>";
				$i++;
			}
			echo "</table>";
			return $rows;
		}

?>
<html>
<head>
<title>Journal Database</title>
<style type="text/css" media="all">@import "./style.css";</style>
</head>
<body>
<div id="wrap">
	<div id="header">
		<p><br /><br /><br /><img src="1.gif" /></p>
	</div>
	<div id="slogan">
		<div id="tabs">
		<ul>
			<li><a href="./index.php">Search</a></li>
			<li><a href="./add.php">Add</a></li>
			<li><a href="#">FAQ</a></li>
		</ul>
		</div>
	</div>
	<div id="content">
		<div id="contentHome">
			<?php
			if (isset($_GET['value'], $_GET['field'])) 
			{
				fetch_results($_GET['value'], $_GET['field']);
			}
			else 
			{
				echo '<p>No search query defined</p>';
			}
			?>
		</div>
	</div>
<div id="footer" style = "clear:both">
		<div class="clear" style = "clear:both;">&nbsp;</div>
				
		<div style="width: 775px; clear: both; margin: 0 auto;">				
			<p>
				Journal Indexer is a tool used for organizing and searching collections of scientific articles and papers<br />
				Copyright &copy;2010 | Some rights reserved.
				<br /><br />
			</p>
		</div>		
</div>
</div>
</body>
</html>
