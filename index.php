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
	<p>
	
	<h2> La machine à détourner </h2>
		<?php // Define default values
			if(!IsSet($_POST['text']))
				{	$_POST['text'] = "Votre texte ici \r\nPour mettre un mot en *jaune*, \r\nentourez le du symbole astérisque."; }
			if(!IsSet($_POST['fontSize']))
				{	$_POST['fontSize'] = 70;}
		?>
		
		<img src="img.php<?php echo("?text=".urlencode($_POST['text'])."&fontSize=".$_POST['fontSize']);?>" id="preview"/> <br/>
		
		<form action="index.php" method="post" class="main">
			<textarea id="text" name="text" rows="3" ><?php echo $_POST['text']; ?></textarea><br/>
			<span id="fontSize">Taille du texte: <input type="number" name="fontSize" value="<?php echo $_POST['fontSize']?>" min="50" max="200" > </span>
			<input type="submit" value="Valider" id="submit">
		</form>
	</p>
	<p>
		<br/><br/>
		Crée par <a href="https://twitter.com/VelGros">VelGros</a>.
		Code source: <a href=".https://github.com/VelGros/secu.routiere-detournement">GitHub repo</a>
	</p>
	</body>
</html>