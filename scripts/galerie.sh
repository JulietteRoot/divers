#!/bin/bash

debut_page='<!DOCTYPE html> <html> <head> <title>Ma galerie</title> <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> <link rel="stylesheet" type="text/css" href="LeStyle.css" /> </head> <body> <p>'

fin_page='</p> </body> </html>'

# La page prend le nom donné en paramètre. A défaut, elle est nommée galerie.html.
if [ -z $1 ]
then
	page='galerie.html'
else
	page=$1
fi

# En-tête HTML
echo $debut_page > $page

# On crée le dossier "miniatures" s'il n'existe pas.
if [ ! -e miniatures ]
then
	mkdir miniatures
fi

read -p 'Indiquez le dossier dans lequel se trouvent les images : ' dossier
 
# On génère les miniatures et la page.
for image in `ls $dossier/*.png $dossier/*.jpg $dossier/*.jpeg 2> /dev/null`
do
	convert -thumbnail 'x150>' $image miniatures/`basename $image`
	echo "<a href='$image'><img src='miniatures/`basename $image`' alt='' /></a>" >> $page 
	echo "</p>`basename $image`<p>" >> $page
done

# Pied-de-page HTML
echo $fin_page >> $page
