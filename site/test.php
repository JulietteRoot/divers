<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="LeStyle.css" />
</head>

<body>
<?php
include("menu.php");
$age=18+6;
echo 'J\'ai '.$age.' ans.';
$reste=10%3;
echo '<br />';
echo 'Le modulo est '.$reste.'.';
echo '<br />';
echo '<br />';

$majeur=($age>=18)?
true:false;

if ($majeur)
{
	echo "Entrez !";
}
else
{
	echo "Sortez !";
}

echo "<br />";

$autorisation=true;
if ($autorisation)
{
	echo 'Bienvenue !';
}
else
{
	echo 'Vous n\'avez pas l\'autorisation d\'accéder à ce site.';
}
echo '<br />';
$note=10;

$note=15;
switch($note)
{
case 0:
echo "c'est nul !";
break;
case 10:
echo "c'est moyen";
break;
default:
echo "note inconnue";
}

echo '<br />';

$nb_lignes=1;
while ($nb_lignes<=10)
{
	echo 'Ceci est la ligne '.$nb_lignes.'<br />';
	$nb_lignes++;
}

for ($nb_lignes=1;$nb_lignes<=10;$nb_lignes++)
{
	echo "Voici la ligne numéro ".$nb_lignes;
	echo "<br />";
}

?>


</body>

</html>

