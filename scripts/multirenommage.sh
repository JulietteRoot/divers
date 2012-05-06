#!/bin/bash

if [ $# -ge 1 ]
then
	liste_fichiers=`ls -d $*`
else
	read -p 'Saisissez le nom du(des) fichier(s) à renommer : ' liste_fichiers
fi

for fichier in $liste_fichiers
do
	mv $fichier $fichier-old
done
