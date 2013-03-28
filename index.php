<?php

include_once "ons_common.php";

	$journeys=array();

	resetDB();
	//All Empty
/** /
	$d = dir("C:/Users/nick/Ski");
	print_line("Handle: " . $d->handle);
	print_line("Path: " . $d->path);
	while (false !== ($entry = $d->read())) {
		if (strpos($entry,".htm")){
			$resorts = new Resorts(buildpath($d->path,$entry));	
		}		
	}
	$d->close();	
/** /	
	$d = dir("C:/Users/nick/Ski/Routes");
	print_line("Handle: " . $d->handle);
	print_line("Path: " . $d->path);
	while (false !== ($entry = $d->read())) {		
		if (strpos($entry,".htm")){
			$journeys[] = new Journeys(buildpath($d->path,$entry));
			//break;	
		}		
	}
	$d->close();	
/**/	
	
	$journey=new Journeys("C:/Users/nick/Ski/Routes/Aime-la-Plagne.htm");
	
	krumo($journey);
	
?>
