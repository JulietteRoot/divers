<!DOCTYPE html>
<html>
<head>
<title>Mon site</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="LeStyle.css" />
</head>

<body>

<?php include("menu.php"); ?>

<div id="corps">
<a href="formulaire.php">un formulaire</a>
<br />

<br />

<?php
echo mt_rand(1,20);
?>

<br />

<h1>Test 1</h1>
<ul>
<li><a href="index.php#terme1">terme 1</a></li>
<li><a href="index.php#terme2">terme 2</a></li>
<li><a href="index.php#terme3">terme 3</a></li>
</ul>

<h1>Test 2 - définitions</h1>
<dl>
<dt>Terme 1</dt>
<dd>Déf 1</dd>
<dt>Terme 2</dt>
<dd>Déf 2</dd>
</dl>

<table border="1px">
<caption>Titre du tableau</caption>
<tr> <th>1ère colonne</th> <th>2ème colonne</th> <th>3ème colonne</th> </tr>
<tr> <td>donnée A</td> <td colspan="2">donnée B (double)</td> </tr>
</table>

<br />

<h1>Du texte ici</h1>
<p class="bleu">
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
<span class="rouge">Sauf ici.</span> <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
Du texte en bleu. <br />
</p>

<ul class="gras centre">
<li id="terme1">définition 1 : bla bla</li>
<li id="terme2">définition 2 : trucmuche</li>
<li id="terme3">définition 3 : bidule</li>
</ul>

<acronym title="World Wide Web Consortium">W3C</acronym>

<div id="illustration">

<img src="petits-ballons.jpg" alt="ballons de baudruches"/>
<p>Ce texte sera à droite.</p>

</div>

<p class="sous_float_left petit_em">Ce texte est en-dessous ET en petit.</p>

</div>
</body>

</html>
