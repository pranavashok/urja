<?php require_once("database.php"); ?>
<html>
<head>
	<style type="text/css" media="all">@import "./style.css";</style>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		function updatedatabase(id){
		value = "#add";
		$(value).hide("slow");
		journal = "journal";
		title = "title";
		authors = "authors";
		loc = "location"; 
		year = "year";
		keywords = "keywords";
		journal = document.getElementById(journal);
		title = document.getElementById(title);
		authors = document.getElementById(authors);
		year = document.getElementById(year);
		keywords = document.getElementById(keywords);
		loc = document.getElementById(loc);
		
		
	var dataString = 'journal=' + journal.value + '&title=' + title.value + '&year=' + year.value + '&authors=' + authors.value + '&location=' + loc.value + '&keywords=' + keywords.value;
    	
    	$.ajax({
      type: "POST",
      url: "update.php",
      data: dataString,
      success: function() {}
    });
}
		
	</script>
	
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
		<div id="contentIn">
			<?php
			$sql = "SELECT * FROM listing2 WHERE id = '". mysql_real_escape_string($_GET['e']) . "'";
			$ref = mysql_query($sql);
			$result = mysql_fetch_assoc($ref);
			if($result)
			{
			echo '<form name="add" id="add'. $i. '" method = "post" action="javascript:updatedatabase('.$i.')">' . "<div style=\"color:#000000; font-size:15px;\">$filename[2].$filename[3]</div>" . '
				<fieldset>
					<input type="text" name="journal" id="journal'.$i.'" value="'.$result['journal'].'" class="text-input" onfocus="if(this.value == \'Journal Name\') this.value = \'\'"  />
					<input type="text" name="title" id="title'.$i.'" value="'.$result['title'].'" class="text-input" onfocus="if(this.value == \'Title\') this.value = \'\'" />
					<input type="text" name="authors" id="authors'.$i.'" value="'.$result['authors'].'" class="text-input" onfocus="if(this.value == \'Author\') this.value = \'\'" />
					<input type="number" name="year" id="year'.$i.'" style="width:50px" value="'.$result['year'].'" class="text-input" onfocus="if(this.value == \'Year\') this.value = \'\'"/>
					<input type="hidden" name="location" id="location'.$i.'" value="'.$result['location'].'" class="text-input" />
					<input type="text" name="keywords" id="keywords'.$i.'" value="'.$result['keywords'].'" class="text-input" onfocus="if(this.value == \'Keywords\') this.value = \'\'" />
					<input type="submit" name="submit" class="button" id="submit_btn" value="Add" />
				</fieldset>
			</form>';
			}
			?>
			<?echo '<div align="center"><br />
			<input type="button" value="Home" onClick="parent.location=\'index.php\'" /></div>';
			?>
		</div>
	</div>

<div id="footer">
		<div class="clear">&nbsp;</div>
				
		<div style="width: 775px; clear: all; margin: 0 auto;">				
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
