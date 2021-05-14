<?php
	header("Content-Type: image/jpeg");
	
	//Check input values against XSS attacks.
	if((!IsSet($_GET['text'])) OR (strlen($_GET['text']) > 500)) // Limit text lenght to 500 chars to avoid high load.
		{	$_GET['text'] = "Votre texte ici"; }
	if((!IsSet($_GET['fontSize'])) OR ($_GET['fontSize'] < 10) OR ($_GET['fontSize'] > 200))
		{	$_GET['fontSize'] = 70;}
	if(!IsSet($_GET['template']))
		{	$_GET['template'] = "default";	}
	
	
	// Default values
	$def_x = 150; //We'll need to reset x to its default value in the loop so we have to keep it somewhere.
	$y = 600;
	
	// Select template
	define("IMGFOLDER","./src/templates/");
	switch($_GET['template'])
	{
		case "incompetent":
			$imgPath = IMGFOLDER."incompetent.jpg";
			break;
		case "mini":
			$imgPath = IMGFOLDER."mini.jpg";
			$def_x = 50;
			$y = 150;
			break;	
		default:
			$imgPath = IMGFOLDER."default.jpg";
			break;	
	}
		
	$img = imagecreatefromjpeg($imgPath); 
	$font = realpath("./src/nowblack.ttf");
	
	$fontSize = $_GET['fontSize']; 
	

	$string = mb_strtoupper(urldecode($_GET['text']));
	$lines = explode("\r\n",$string);
	
	$x = $def_x;
	foreach ($lines as $line)
	{
		/* Chunks are delimited by starting and ending * symbol
		Anything than doesn't contains * symbol is also a chunk.
		
		For instance:
		"Pour mettre un *texte en jaune*, entourez le *d'asterisques*"
		
		Chunks are:
		1) "Pour mettre un "
		2) "*texte en jaune*"
		3) ", entourez le "
		4) *d'asterisques* 		*/
		
		$chunks = preg_split("#(\*.+\*)#",$line,-1,PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
		foreach($chunks as $chunk)
		{
			if(preg_match("#(\*.+\*)#",$chunk))// Chunk is tagged with * (eg: "*yellow*")
				{	$color = ImageColorAllocate($img, 254, 224, 2);		} //Yellow
			else
				{	$color = ImageColorAllocate($img, 255, 255, 255);	} //White
			
			
			$pos = imagettftext($img,$fontSize,0,$x,$y,$color,$font,str_replace(array("*","\r\n","\r"),'',$chunk));
			$x = $pos[2];
		}
		
		$x = $def_x;
		$y = $pos[3]+$fontSize*1.8;
	}
	
	Imagejpeg($img);
	ImageDestroy($img);
?> 
