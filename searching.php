<?php
require_once("database.php");
$i=0;
function searcher($directory)
{      
     $dir = $directory . "/*";
    // Open a known directory, and proceed to read its contents
    
    foreach(glob($dir) as $file) {    	
    	$pattern = '/(.+)\/(.+)\.(pdf|PDF)/';
      	if(preg_match($pattern, $file, $filename)) {
      		$i = $i+1;
	
	$sql = "SELECT COUNT(*) FROM listing2 WHERE location = '". mysql_real_escape_string($file) . "'";
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
	}
	if(filetype($file) == "dir")
		searcher($file);
    }	
}
?>
