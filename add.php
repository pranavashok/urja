<html>
<head>
	<style type="text/css" media="all">@import "./style.css";</style>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		function updatedatabase(num){
		value = "#add" + num;
		$(value).hide("slow");
		journal = "journal" + num;
		title = "title" + num;
		authors = "authors" + num;
		loc = "location" + num; 
		year = "year" + num;
		keywords = "keywords" + num;
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
			<?php require("databse.php");
			$sql = "SELECT * FROM listing2 WHERE id = '". mysql_real_escape_string($_GET['e']) . "'";
			$ref = mysql_query($sql);
			$result = mysql_result($ref, 0);
			if($result == 0)
			{
			echo '<form name="add" id="add'. $i. '" method = "post" action="javascript:updatedatabase('.$i.')">' . "<div style=\"color:#000000; font-size:15px;\">$filename[2].$filename[3]</div>" . '
				<fieldset>
					<input type="text" name="journal" id="journal'.$i.'" value="Journal Name" class="text-input" onfocus="if(this.value == \'Journal Name\') this.value = \'\'"  />
					<input type="text" name="title" id="title'.$i.'" value="Title" class="text-input" onfocus="if(this.value == \'Title\') this.value = \'\'" />
					<input type="text" name="authors" id="authors'.$i.'" value="Author" class="text-input" onfocus="if(this.value == \'Author\') this.value = \'\'" />
					<input type="number" name="year" id="year'.$i.'" style="width:50px" value="Year" class="text-input" onfocus="if(this.value == \'Year\') this.value = \'\'"/>
					<input type="hidden" name="location" id="location'.$i.'" value="'.$file.'" class="text-input" />
					<input type="text" name="keywords" id="keywords'.$i.'" value="Keywords" class="text-input" onfocus="if(this.value == \'Keywords\') this.value = \'\'" />
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
