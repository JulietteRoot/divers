<?php
session_start();
header ("Content-type: image/png");

$image = imagecreate(200,50);

switch ($_SESSION['couleur_fond'])
{
	case 'rouge': 
		$couleur_fond = imagecolorallocate($image, 255, 0, 0);
		break;
	case 'vert':
		$couleur_fond = imagecolorallocate($image, 0, 255, 0);
		break;
	case 'bleu':
		$couleur_fond = imagecolorallocate($image, 0, 0, 255);
		break;
	case 'noir':
		$couleur_fond = imagecolorallocate($image, 0, 0, 0);
		break;
	case 'blanc':
		$couleur_fond = imagecolorallocate($image, 255, 255, 255);
}

$rouge = imagecolorallocate($image, 255, 0, 0);
$vert = imagecolorallocate($image, 0, 255, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

switch ($_SESSION['couleur_texte'])
{
	case 'rouge':
		$couleur_texte = $rouge;
		break;
	case 'vert':
		$couleur_texte = $vert;
		break;
	case 'bleu':
		$couleur_texte = $bleu;
		break;
	case 'noir':
		$couleur_texte = $noir;
		break;
	case 'blanc':
		$couleur_texte = $blanc;
}

$texte=htmlspecialchars($_SESSION['texte']);

imagestring( $image, 4, 35, 15, $texte, $couleur_texte );

imagepng($image);

?>
