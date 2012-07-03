<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="LeStyle.css" />
</head>

<body>
<?php include("fonctions.php"); ?>
<a href="index.php">retour à l'index</a>

<br />
<br />

<!--On choisit d'abord la couleur du fond, des rectangles et du texte lui-même-->

<form method="POST" action="">
<p>Choisissez une couleur pour le <span class="gras">fond</span> :<br />
<input type="radio" name="couleur_fond" value="rouge" id="rouge" <?php verif_checked($_POST['couleur_fond'],"rouge") ?>/> <label for="rouge">rouge</label>
<input type="radio" name="couleur_fond" value="vert" id="vert" <?php verif_checked($_POST['couleur_fond'],"vert") ?>//> <label for="vert">vert</label>
<input type="radio" name="couleur_fond" value="bleu" id="bleu" <?php verif_checked($_POST['couleur_fond'],"bleu") ?>//> <label for="bleu">bleu</label>
<input type="radio" name="couleur_fond" value="noir" id="noir" <?php verif_checked($_POST['couleur_fond'],"noir") ?>//> <label for="noir">noir</label>
<input type="radio" name="couleur_fond" value="blanc" id="blanc" <?php verif_checked($_POST['couleur_fond'],"blanc") ?>//> <label for="blanc">blanc</label>
</p>
<p>Choisissez une couleur pour les <span class="gras">rectangles</span> :<br />
<input type="radio" name="couleur_rectangle" value="rouge" id="rouge" <?php verif_checked($_POST['couleur_rectangle'],"rouge") ?>/> <label for="rouge">rouge</label>
<input type="radio" name="couleur_rectangle" value="vert" id="vert" <?php verif_checked($_POST['couleur_rectangle'],"vert") ?>/> <label for="vert">vert</label>
<input type="radio" name="couleur_rectangle" value="bleu" id="bleu" <?php verif_checked($_POST['couleur_rectangle'],"bleu") ?>/> <label for="bleu">bleu</label>
<input type="radio" name="couleur_rectangle" value="noir" id="noir" <?php verif_checked($_POST['couleur_rectangle'],"noir") ?>/> <label for="noir">noir</label>
<input type="radio" name="couleur_rectangle" value="blanc" id="blanc" <?php verif_checked($_POST['couleur_rectangle'],"blanc") ?>/> <label for="blanc">blanc</label>
</p>
<p>Choisissez une couleur pour le <span class="gras">texte</span> :<br />
<input type="radio" name="couleur_texte" value="rouge" id="rouge" <?php verif_checked($_POST['couleur_texte'],"rouge") ?>/> <label for="rouge">rouge</label>
<input type="radio" name="couleur_texte" value="vert" id="vert" <?php verif_checked($_POST['couleur_texte'],"vert") ?>/> <label for="vert">vert</label>
<input type="radio" name="couleur_texte" value="bleu" id="bleu" <?php verif_checked($_POST['couleur_texte'],"bleu") ?>/> <label for="bleu">bleu</label>
<input type="radio" name="couleur_texte" value="noir" id="noir" <?php verif_checked($_POST['couleur_texte'],"noir") ?>/> <label for="noir">noir</label>
<input type="radio" name="couleur_texte" value="blanc" id="blanc" <?php verif_checked($_POST['couleur_texte'],"blanc") ?>/> <label for="blanc">blanc</label>
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
isset( $_POST['couleur_fond'], $_POST['couleur_texte'], $_POST['couleur_rectangle'], $_POST['texte'] ) &&
strlen($_POST['texte']) > 0 &&
strlen($_POST['texte']) <= 40 )
{
	$texte=$_POST['texte'];

// On définit la taille et couleur du grand rectangle qui correspond au fond de l'image. 

	$police=4;
// pour connaitre le nombre de pixels par lettre pour la police 4 : 
	$nb_de_pixels_par_caracteres = imageFontWidth($police);

	$mot = explode(" ",$texte);
	$nb_mots = sizeof($mot);
	
	for ($i = 0, $nb_caracteres = 0; $i < $nb_mots; $i++)
	{
		$nb_caracteres += strlen($mot[$i]);
	}

	$largeur_rectangle = ($nb_de_pixels_par_caracteres * $nb_caracteres) + (20 * $nb_mots) + 10;	

	$image = imagecreate($largeur_rectangle,50);

	$couleur['rouge'] = imagecolorallocate($image, 255, 0, 0);
	$couleur['vert'] = imagecolorallocate($image, 0, 255, 0);
	$couleur['bleu'] = imagecolorallocate($image, 0, 0, 255);
	$couleur['noir'] = imagecolorallocate($image, 0, 0, 0);
	$couleur['blanc'] = imagecolorallocate($image, 255, 255, 255);

	$couleur_fond = $couleur[$_POST['couleur_fond']];

	$couleur_rectangle = $couleur[$_POST['couleur_rectangle']];
	
	$couleur_texte = $couleur[$_POST['couleur_texte']];

	imagefilledrectangle($image, 0, 0, $largeur_rectangle, 49, $couleur_fond);

	for ($i = 0, $x2 = 0, $coordonnee_x_mot = 15; $i < $nb_mots; $i++)
	{
		$x1 = $x2 +10 ;
		$nb_caracteres_mot = strlen($mot[$i]);
		$x2 = $x1 + 5 + ($nb_caracteres_mot * $nb_de_pixels_par_caracteres) + 5;
		imagefilledrectangle($image, $x1, 10, $x2, 39, $couleur_rectangle);
		imagestring($image, $police, $coordonnee_x_mot, 15, $mot[$i], $couleur_texte);
		$coordonnee_x_mot = $coordonnee_x_mot + ($nb_caracteres_mot * $nb_de_pixels_par_caracteres) + 20;
	}

//	imagestring($image, $police, 20, 15, $texte, $couleur_texte);

	imagepng($image,'image_creee.png');

	echo '<img src="image_creee.png" />';
}
// Si toutes les données ne sont pas renseignées, on affiche un message d'erreur.
else
{
	echo "<p class='rouge'>Paramètres incorrects. Vérifiez votre saisie !<br />
		Vous devez sélectionner une couleur pour le fond, une pour les rectangles, et une pour le texte. Le texte doit comporter de 1 à 40 caractères.</p>";
}

?>
</body>

</html>

