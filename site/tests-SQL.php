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

try
{
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	$bdd=new PDO('mysql:host=localhost;dbname=site_test','root','meat_boy',$pdo_options);
}
catch (Exception $e)
{
	die('Erreur:'.$e->getMessage());
}

$reponse = $bdd->query("SELECT pseudo FROM membres ORDER BY pseudo DESC");
while($donnees = $reponse->fetch())
{
	echo $donnees['pseudo'].'<br />';
}
$reponse->closeCursor();

$req=$bdd->prepare('SELECT date_naissance FROM membres WHERE pseudo=:pseudo AND password=:password');
$req->execute(array(
			'pseudo'=>'juliette',
			'password'=>'juliette_password'));
$donnees=$req->fetch();
echo $donnees['date_naissance'];
$req->closeCursor();

echo '<br />';

// $pseudo='babar';
// $password='babar_password';
// $req=$bdd->prepare('INSERT INTO membres (pseudo,password) VALUES (:pseudo,:password)');
// $req->execute( array(		
//		'pseudo'=>$pseudo,
//		'password'=>$password
//			) );
// $req->closeCursor();

// $date_naissance='1986-10-24';
// $req=$bdd->prepare('UPDATE membres SET date_naissance=:date_naissance WHERE pseudo=\'babar\'');
// $nb_modifs=$req->execute( array('date_naissance'=>$date_naissance) );
// echo $nb_modifs.' entrée(s) modifiée(s).';
// $req->closeCursor();

// $bdd->exec('DELETE FROM membres where pseudo=\'babar\'');

$reponse=$bdd->query('SELECT UPPER(pseudo) AS pseudo_maj,date_naissance FROM membres');
while ($donnees=$reponse->fetch())
{
	echo $donnees['pseudo_maj'].' '.$donnees['date_naissance'].'<br />';
}
$reponse->closeCursor();

echo '<br />';

$reponse=$bdd->query('SELECT ROUND(AVG(nombre),0) AS moy_nombre FROM membres WHERE pseudo=\'juliette\' OR pseudo=\'karchnu\'');
$donnees=$reponse->fetch();
echo $donnees['moy_nombre'];
// $moyenne=$donnees['moy_nombre'];
// $moyenne_arrondie=round($moyenne,0);
// echo $moyenne_arrondie;
$reponse->closeCursor();

echo '<br />';

$reponse=$bdd->query('SELECT COUNT(*) as nb_membres FROM membres');
$donnees=$reponse->fetch();
echo 'Il y a '.$donnees['nb_membres'].' membres.';

echo '<br />';

// $bdd->exec('INSERT INTO membres VALUES(\'new_born\',\'new_born_password\',NOW(),8)');

$reponse=$bdd->query('SELECT pseudo,YEAR(date_naissance) AS annee_naissance FROM membres');
while ( $donnees=$reponse->fetch() )
{
	echo $donnees['pseudo'].' est né(e) en '.$donnees['annee_naissance'].'<br />';
}

echo '<br />';

$reponse=$bdd->query('SELECT DATE_FORMAT(date_naissance,\'%d/%m/%Y\') as date_naissance_formatee,DATE_FORMAT(DATE_ADD(date_naissance,INTERVAL 25 YEAR),\'%d/%m/%Y\') as date_fin_monde FROM membres WHERE pseudo=\'juliette\'');
$donnees=$reponse->fetch();
echo 'juliette est née le '.$donnees['date_naissance_formatee'].' et va mourir le '.$donnees['date_fin_monde'].', comme tout le monde.';

echo '<br />';
echo '<br />';

$reponse=$bdd->query('SELECT pseudo FROM membres WHERE pseudo REGEXP \'a\'');
echo 'Ont des noms qui contiennent un "a" :<br />';
while ($donnees=$reponse->fetch())
{
	echo $donnees['pseudo'].'<br />';
}

?>
</body>

</html>

