<?php
	header("Content-Type: image/jpeg");
	
	#Check input values against XSS attacks.
	if((!IsSet($_GET['text'])) OR (strlen($_GET['text']) > 500)) // Limit text lenght to 500 chars to avoid high load.
		{	$_GET['text'] = "Votre texte *ici*"; }
	if((!IsSet($_GET['fontSize'])) OR ($_GET['fontSize'] < 50) OR ($_GET['fontSize'] > 200))
		{	$_GET['fontSize'] = 70;}
		
	$img = imagecreatefromjpeg("./src/template.jpg"); 
	$font = realpath("./src/nowblack.ttf");
	
	$fontSize = $_GET['fontSize']; 
	
	$x = 150;
	$y = 600;
	$string = mb_strtoupper(urldecode($_GET['text']));;
	$lines = explode("\r\n",$string);
	
	foreach ($lines as $line)
	{
		$words = explode(' ',$line);
		foreach($words as $word)
		{
			if(preg_match("#(\*.+\*)#",$word))// Word is tagged with * (eg: "*yellow*")
				{	$color = ImageColorAllocate($img, 254, 224, 2);		} //Yellow
			else
				{	$color = ImageColorAllocate($img, 255, 255, 255);	} //White
			$pos = imagettftext($img,$fontSize,0,$x,$y,$color,$font,str_replace('*','',$word));
			$x = $pos[2]+$fontSize/2.5;
		}
		$x = 150;
		$y = $pos[3]+$fontSize+50;
	}
	
	Imagejpeg($img);
	ImageDestroy($img);
?> 
