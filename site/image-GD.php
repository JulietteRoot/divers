<?php
header ("Content-type: image/png");
// $image = imagecreatefrompng("tux.png");
$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0);
$vert = imagecolorallocate($image, 0, 255, 0);
$rouge = imagecolorallocate($image, 255, 0, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$noir = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 4, 35, 15, "BLA BLA BLA", $bleu);
imagecolortransparent($image,$orange);
/*
ImageSetPixel ($image, 10, 10, $rouge);
ImageLine ($image, 30, 30, 120, 120, $noir);
ImageEllipse ($image, 100, 25, 100, 40, $rouge);
*/

imagepng($image);
?> 
