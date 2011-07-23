<?php
if ((isset($_POST['journal'])) && (strlen(trim($_POST['journal'])) > 0)) {
	$journal = stripslashes(strip_tags($_POST['journal']));
} 
else {
	$journal = 'No journal name entered';
}
if ((isset($_POST['title'])) && (strlen(trim($_POST['title'])) > 0)) {
	$title = stripslashes(strip_tags($_POST['title']));
} 
else {
	$title = 'No title entered';
}
if ((isset($_POST['authors'])) && (strlen(trim($_POST['authors'])) > 0)) {
	$authors = stripslashes(strip_tags($_POST['authors']));
} 
else {
	$authors = 'No authors entered';
}
if ((isset($_POST['year'])) && (strlen(trim($_POST['year'])) > 0)) {
	$year = stripslashes(strip_tags($_POST['year']));
} 
else {
	$year = 'year';
}
if ((isset($_POST['location'])) && (strlen(trim($_POST['location'])) > 0)) {
	$location = stripslashes(strip_tags($_POST['location']));
} 
else {
	$location = 'No location entered';
}
if ((isset($_POST['keywords'])) && (strlen(trim($_POST['keywords'])) > 0)) {
	$keywords = stripslashes(strip_tags($_POST['keywords']));
} 
else {
	$keywords = 'No keywords entered';
}
ob_start();
?>

<?
$body = ob_get_contents();
require_once("database.php");
function update_table($journal, $title, $authors, $year, $location, $keywords)
{ 
		$sql = "SELECT COUNT(*) FROM listing2 WHERE location = '". mysql_real_escape_string($location) . "'";
		$ref = mysql_query($sql);
		$result = mysql_result($ref, 0);
		if($result == 0)
		{
			$sql = sprintf("INSERT INTO listing2 (journal, title, authors, year, location, keywords) VALUES ('%s','%s','%s','%s', '%s', '%s')", mysql_real_escape_string($journal), mysql_real_escape_string($title), mysql_real_escape_string($authors), mysql_real_escape_string($year), mysql_real_escape_string($location), mysql_real_escape_string($keywords));
			$ref = mysql_query($sql);
			$result = mysql_result($ref,0);
		}
}
update_table($journal, $title, $authors, $year, $location, $keywords);
?>
