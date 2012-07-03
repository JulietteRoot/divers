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

<form method="GET" action="">
<p> <label for "mot">Indiquez le mot choisi :</label>
<input type="text" name="mot" id="mot" 
<?php
if (isset($_GET['mot']))
{
	if( preg_match('#^merde$#i',$_GET['mot']) )
	{
		$_GET['mot']=preg_replace('#^(mer)de$#i','$1**',$_GET['mot']);
	}
	echo 'value="'.$_GET['mot'].'"';
}
?>
 />
</p>
<p> <label for "repeter">Indiquez le nombre de répétitions souhaité :</label>
<input type="text" name="repeter" id="repeter" size="5" 
<?php
if (isset($_GET['repeter']))
{
	echo 'value="'.$_GET['repeter'].'"';
}
?>
 />
</p>
<p><input type="submit" value="Go !" /></p>
</form>

<?php
if(
	isset($_GET['mot']) &&
	isset($_GET['repeter']) &&
	0 < strlen($_GET['mot']) && 
	strlen($_GET['mot']) < 30 &&
	0 < (int)$_GET['repeter'] &&
	(int)$_GET['repeter'] < 30
)
{
	if( preg_match('#^[Mm]agi(c|que)$#',$_GET['mot']) )
		{
			echo "Bravo, vous avez trouvé le mot magique ! ;)<br />";
		}
	if( preg_match('#^merde$#i',$_GET['mot']) )
	{
		$_GET['mot']=preg_replace('#^(mer)de$#i','$1**',$_GET['mot']);
	}
	for ($var=1;$_GET['repeter']>=$var;$var++)
	{
		echo $var.') '.strip_tags($_GET['mot']).'<br />';
	}
}
else
{
	echo "Erreur.";
}
?>

</body>

</html>

