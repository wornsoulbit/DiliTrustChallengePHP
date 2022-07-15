#!/bin/bash

#In order for this script to work you need to be in your local git repository (ACEUNIX directory)

cd /home/debian/DiliTrustChallengePHP/

upToDateMessage=$(git pull)


if ! [[ $upToDateMessage == "Already up to date." ]];
then
	#(1)copy static files to the correct location
	sudo rsync -r Site/* /var/www/html
fi	
