<?php

$sites = "http://www.facebook.com";

$sites = preg_split('/\r\n|\r|\n/', $sites);


echo "
<style>
img {float: left; margin: 15px; width: 500px }
</style>
";

foreach($sites as $site) 
{
	

		$image = file_get_contents("https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=$site&screenshot=true");
		$image = json_decode($image, true); 
		 
		
		$image = $image['screenshot']['data'];
	
	

	
	$image = str_replace(array('_','-'),array('/','+'),$image); 
	
	echo "<img src=\"data:image/jpeg;base64,".$image."\" border='1' />";
	

}

?>