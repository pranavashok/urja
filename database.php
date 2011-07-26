<?php
require_once("config.php");
$result = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$database = DB_NAME;
@mysql_select_db($database) or die( "Unable to select database. Please see if the database exists");
$sql = sprintf("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '%s' AND table_name = '%s'",DB_NAME, mysql_real_escape_string('listing2'));

$ref = mysql_query($sql);

$result = mysql_result($ref, 0);

if($result == 0){	
	 $sql = "CREATE TABLE listing2 (id INT UNIQUE AUTO_INCREMENT, journal VARCHAR(200), title VARCHAR(1000), authors VARCHAR(200), year INT, location VARCHAR(200), keywords VARCHAR(200));";
	 $ref = mysql_query($sql);
	 
	 $result = mysql_result($ref);
}
?>
