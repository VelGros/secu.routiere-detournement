<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Insécurité routière - Détournement</title>
		<link rel="stylesheet" Type="text/css" href="./src/style.css">
    </head>
    <body>
	<h1> Détournons la campagne de la sécurité routière </h1>
	
	<p class="main">
		Le 24 septembre 2020, la sécurité routière a lancée une vaste campagne de sensibilisation. 
		Malgré quelques bons messages, la plupart des affiches versent dans le #VictimBlaming et la déresponsabilisation des conducteurs de véhicules motorisés.
		<br/><br/>
		Pour souligner le ridicule de cette campagne tout en riant un bon coup, détournons la !	
		#SécuritéRoutiéreLOL Tweet comme @RoutePlusSur
	<p>
	
	<h2> La machine à détourner </h2>
		<?php // Define default values
			if(!IsSet($_POST['text']))
				{	$_POST['text'] = "Votre texte ici \r\nPour mettre un *texte en jaune*, \r\nentourez le du symbole astérisque."; }
			if(!IsSet($_POST['template']))
				{	$_POST['template'] = "default";	}
				
			/* DEFAULT FONTSIZES
			Change is made directly into the POST var.
			To avoid overwriting user settings, defaults values are detected by values.
			Yep, this means you cannot user large template default value (70) in mini ones and vice-versa.
			
			This could be easily fixed using some JS to just change default value on click on radio buttons
			but i don't want to learn JS nor use some script i don't understand for that 
			so feel free to enchance :)  */
			
			if(!IsSet($_POST['fontSize']))
				{	$_POST['fontSize'] = 70;}// Default fontSize
			if($_POST['fontSize'] == 70 AND $_POST['template'] == "mini")// If user select mini template but still has d efault fontsize.
				{	$_POST['fontSize'] = 20; }//Default fontsize for mini template
			if($_POST['fontSize'] == 20 AND $_POST['template'] != "mini")// If user select a large tempalte but still has  mini default fontSize
				{	$_POST['fontSize'] = 70; }

		?>
		
		<img src="img.php<?php echo("?text=".urlencode($_POST['text'])."&fontSize=".$_POST['fontSize']."&template=".$_POST['template']);?>" id="preview"/> <br/>
		
		<form action="index.php" method="post" class="main">
			<textarea id="text" name="text" rows="3" ><?php echo $_POST['text']; ?></textarea><br/>
			<span id="fontSize">Taille du texte: <input type="number" name="fontSize" value="<?php echo($_POST['fontSize']); ?>" min="10" max="200" > </span>
			
			Modéle:
			<input type="radio" id="template_default" name="template" value="default" <?php if($_POST['template'] == "default") {echo 'checked="true"';} ?> >
			<label for="template_default">Parodie (défaut)</label>
			<input type="radio" id="template_com" name="template" value="incompetent" <?php if($_POST['template'] == "incompetent") {echo 'checked="true"';} ?> >
			<label for="template_com">Incompétent</label>
			<input type="radio" id="template_mini" name="template" value="mini" <?php if($_POST['template'] == "mini") {echo 'checked="true"';} ?> >
			<label for="template_mini">Mini</label>

			<input type="submit" value="Valider" id="submit">
		</form>
		
	</p>
	<p>
		<br/><br/>
		<a rel="noopener noreferrer" target="_blank" href="https://twitter.com/intent/tweet?text=Toi%20aussi%20tweet%20comme%20@RoutePlusSur%20avec&hashtags=securiteroutierelol&url=http://insecurite-routiere.lived.fr">
		<img src="./src/twitter.png"/></a>
		<br/>
		Crée par <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/VelGros">VelGros</a>.
		Code source: <a rel="noopener noreferrer" target="_blank" href="https://github.com/VelGros/secu.routiere-detournement">GitHub repo</a>
	</p>
	</body>
</html>