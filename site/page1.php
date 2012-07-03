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
<?php echo "Bonjour ".$_SESSION['pseudo'].' !'; ?>
<p>Patientez, vous allez être redirigé(e) vers l'index...</p> <br />
<?php
$mon_fichier=fopen('compteur.txt','r+');

if(!$mon_fichier)
{
	die('Erreur sur l\'ouverture du fichier');
}

$pages_vues=fgets($mon_fichier);

if(!$pages_vues)
{
	die('Erreur avec fgets');
}
$pages_vues = (int) $pages_vues;
$pages_vues++;
fseek($mon_fichier,0);
fputs($mon_fichier,$pages_vues);
fclose($mon_fichier);
echo '<p>Cette page a été vue '.$pages_vues.' fois.</p>';

header('Refresh:5;url=index.php');
?>

</body>

</html>

