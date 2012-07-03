<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="LeStyle.css" />
</head>

<body>

<?php include("menu.php"); ?>
<?php include_once('Membre.class.php'); ?>

<?php
if ( isset ($_POST['pseudo']) )
{
$membre=new Membre($_POST['pseudo']);
$membre->getPseudo();
echo '<br />';
$membre->choisir_nom_famille('Simpsons');
}
?>

<br />
<?php
if(isset($_POST['pseudo']) && isset($_POST['password']) && strlen($_POST['pseudo']) > 0 && strlen($_POST['password']) > 0)
{
	$_SESSION['pseudo'] = $_POST['pseudo'];
	echo "Bonjour ".$_SESSION['pseudo']." !<br />";
	echo '<a href="page1.php">Accéder à la page 1.</a>';
}
else
{
	echo "Bienvenue, identifiez-vous sur cette page !";
}
?>

<div id="corps">
<form method="POST" action="">
<fieldset><legend>Infos obligatoires</legend>
<p> <label for="pseudo">Votre pseudo :</label> <input type="text" name="pseudo" id="pseudo" size="20" maxlength="15" /> </p>
<p> <label for="password">Votre mot de passe :</label> <input type="password" name="password" id="password" size="20" maxlength="15"/> </p>
</fieldset>
<fieldset><legend>Infos optionnelles</legend>
<p>Vous aimez <span class="italique">(plusieurs choix possibles)</span> : <br />
<label for="mer">La mer</label><input type="checkbox" name="mer" id="mer" />
<label for="montagne">La montagne</label><input type="checkbox" name="montagne" id="montagne" />
<label for="ville">La ville</label><input type="checkbox" name="ville" id="ville" />
</p>
<p>Vous êtes : <br />
<input type="radio" name="sexe" value="homme" id="homme" /> <label for="homme">Un homme</label><br />
<input type="radio" name="sexe" value="femme" id="femme" /> <label for="femme">Une femme</label>
</p>
<p>
<label for="pays">Où est Charlie ?</label><br />
<select name="pays" id="pays">
<option value="France" selected="selected">France</option>
<option value="Allemagne">Allemagne</option>
<option value="Italie">Italie</option>
<option value"autre">autre</option>
</select>
</p>
<p> <textarea name="commentaire" id="commentaire" rows="10" cols="50" accesskey="C">Écrivez votre commentaire ici.</textarea></p>
</fieldset>
<p>
<input type="submit" value="valider" class="validation" /> <input type="reset" value="annuler" class="annulation" />
</p>
</form>

</div>
</body>

</html>

