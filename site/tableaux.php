<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="LeStyle.css" />
</head>

<body>
<?php include("menu.php");

$prenoms[0]='François';
$prenoms[1]='Michel';
$prenoms[2]='Nicole';
echo $prenoms[1];
echo '<br />';
$position=array_search('Michel',$prenoms);
echo '"Michel" se trouve en position '.$position;

echo '<br />';
echo '<br />';

foreach ($prenoms as $element)
{
	echo $element.'<br />';
}

echo '<br />';

$coordonnees=array(
	'prenom'=>'François',
	'nom'=>'Dupont'
		);
echo $coordonnees['nom'];

echo '<br />';
echo '<br />';

foreach($coordonnees as $cle=>$element)
{
	echo 'Le '.$cle.' est '.$element.'<br />';
}

if(array_key_exists('nom',$coordonnees) && in_array('Dupont',$coordonnees))
{
	echo "oui";
}

?>
</body>

</html>

