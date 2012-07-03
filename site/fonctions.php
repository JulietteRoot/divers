<?php
function verif_checked ($parametre, $valeur)
{
	if ( isset($parametre) && $parametre == $valeur )
	{
		echo "checked";
	}
}

?>
