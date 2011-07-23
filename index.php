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

		function search_form()
		{
		echo '<form style="padding-top:100px" name="search" action="result.php" method="get">
		<input type="text" name="value" size="40" /> in <select name="field">
		<option value="all fields">All fields</option>
		<option value="keywords">keywords</option>
		<option value="title">title</option>
		<option value="journal">journal name</option>
		<option value="year">year</option>
		<option value="authors">author(s) name</option>
		<input type="submit" value="Go" />
		</select>
		</form>';
		}

		function add_entries()
		{
		echo '
		<input type="button" value="Add Journal" onClick="parent.location=\'add.php\'" />';
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
			<?
				search_form();
				echo $_GET['add'];
			?>
		</div>
	</div>
<div id="footer">
		<div class="clear">&nbsp;</div>
				
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
