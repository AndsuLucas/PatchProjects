<?php 


function dd($dump, $type = "export", $doExit = true) {
	
	header('Content-Type: text/html');

	echo "<pre>";
	
	switch ($type) {
		case 'export':
			var_export($dump);
			break;
		
		case 'dump':
			var_dump($dump);
			break;
		
	}
	
	echo "<pre>";

	if ($doExit) {
		exit;
	}

	return;
}