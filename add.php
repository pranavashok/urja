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
			<?php require("searching.php"); searcher(SEARCH_DIR); ?>
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
