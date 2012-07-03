<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="LeStyle.css" />
</head>

<body>
<a href="index.php">retour à l'index</a>

<br />
<br />

<!--On choisit d'abord la couleur du fond et du texte lui-même-->

<form method="POST" action="">
<p>Choisissez une couleur pour le fond :<br />
<input type="radio" name="couleur_fond" value="rouge" id="rouge" /> <label for="rouge">rouge</label>
<input type="radio" name="couleur_fond" value="vert" id="vert" /> <label for="vert">vert</label>
<input type="radio" name="couleur_fond" value="bleu" id="bleu" /> <label for="bleu">bleu</label>
<input type="radio" name="couleur_fond" value="noir" id="noir" /> <label for="noir">noir</label>
<input type="radio" name="couleur_fond" value="blanc" id="blanc" /> <label for="blanc">blanc</label>
</p>
<p>Choisissez une couleur pour le texte :<br />
<input type="radio" name="couleur_texte" value="rouge" id="rouge" /> <label for="rouge">rouge</label>
<input type="radio" name="couleur_texte" value="vert" id="vert" /> <label for="vert">vert</label>
<input type="radio" name="couleur_texte" value="bleu" id="bleu" /> <label for="bleu">bleu</label>
<input type="radio" name="couleur_texte" value="noir" id="noir" /> <label for="noir">noir</label>
<input type="radio" name="couleur_texte" value="blanc" id="blanc" /> <label for="blanc">blanc</label>
</p>

<!--On doit ensuite saisir le texte choisi et valider-->

<p>
<label for "texte" title="Le texte doit comprendre entre 1 et 40 caractères.">Inscrivez le texte choisi :</label>
<input type="text" name="texte" id="texte" size="50" maxlength="40"
<?php
if ( isset($_POST['texte']) )
{
	echo 'value="'.$_POST['texte'].'"';
}
?>
 />
</p>

<input class="validation" type="submit" value="Go !"/> <input class="annulation" type="reset" value="effacer" />

</form>

<br />

<?php
// on vérifie que les données sont renseignées et valides.
if (
isset( $_POST['couleur_fond'], $_POST['couleur_texte'], $_POST['texte'] ) &&
strlen($_POST['texte']) > 0 &&
strlen($_POST['texte']) <= 40 )
{
	$texte=$_POST['texte'];
	$nb_caracteres = strlen($texte);
	$police=4;
	// pour connaitre le nombre de pixels par lettre pour la police 4 : 
	$nb_de_pixels_par_caracteres = imageFontWidth($police);
	$largeur_rectangle = 20 + ($nb_de_pixels_par_caracteres * $nb_caracteres) + 20;

	$image = imagecreate($largeur_rectangle,50);

	$couleur['rouge'] = imagecolorallocate($image, 255, 0, 0);
	$couleur['vert'] = imagecolorallocate($image, 0, 255, 0);
	$couleur['bleu'] = imagecolorallocate($image, 0, 0, 255);
	$couleur['noir'] = imagecolorallocate($image, 0, 0, 0);
	$couleur['blanc'] = imagecolorallocate($image, 255, 255, 255);

	$couleur_fond = $couleur[$_POST['couleur_fond']];
	
	$couleur_texte = $couleur[$_POST['couleur_texte']];

	imagefilledrectangle($image, 0, 0, $largeur_rectangle, 49, $couleur_fond);

	imagestring($image, $police, 20, 15, $texte, $couleur_texte);

	imagepng($image,'image_creee.png');

	echo '<img src="image_creee.png" />';
}
else
{
	echo "<p class='rouge'>Paramètres incorrects. Vérifiez votre saisie !<br />
		Vous devez sélectionner une couleur pour le fond, et une pour le texte. Le texte doit comporter de 1 à 40 caractères.</p>";
}

?>
</body>

</html>

