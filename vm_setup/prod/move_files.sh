#!/bin/bash
#
# Script to move file to vm webroot and setup databases
#
# Usage: /vagrant/move1.sh

CHALLENGES=/vagrant/Challenges
HTML=/var/www/html
HID=/var/www/hid

mysqluser=root
mysqlpass=iNfC16s3c

if [ ! -d /var/www/html ]; then
	echo "[+] Creating /var/www/html directory..."
	sudo mkdir /var/www/html
fi

if [ ! -d /var/www/hid ]; then
	echo "[+] Creating /var/www/hid directory..."
	sudo mkdir /var/www/hid
fi

replace_string="/vagrant/Challenges/"
replace_with=""
for category in $CHALLENGES/* ; do
	if [ -d $category ]; then
		cat_ext=${category/$replace_string/$replace_with}
		if [ ! -d $HTML/$cat_ext ]; then
			echo "[+] Creating $HTML/$cat_ext directory..."
			sudo mkdir $HTML/$cat_ext
		fi
		if [ ! -d $HID/$cat_ext ]; then
			echo "[+] Creating $HID/$cat_ext directory..."
			sudo mkdir $HID/$cat_ext
		fi
		for challenge in $category/* ; do
			if [ -d $challenge/html ]; then
				for h in $challenge/html ; do
					ext=${challenge/$replace_string/$replace_with}
					if [ ! -d $HTML/$ext ]; then
						echo "[+] Creating $HTML/$ext directory..."
						sudo mkdir $HTML/$ext
					fi
					echo " [.] Copying $h into $HTML/$ext..."
					sudo cp -r $h/* $HTML/$ext
				done
			fi
			if [ -d $challenge/hid ]; then
				for h in $challenge/hid ; do
					ext=${challenge/$replace_string/$replace_with}
					if [ ! -d $HID/$ext ]; then
						echo "[+] Creating $HID/$ext directory..."
						sudo mkdir $HID/$ext
					fi
					echo " [.] Copying $h into $HID/$ext..."
					sudo cp -r $h/* $HID/$ext
				done
			fi
			if [ -d $challenge/database ]; then
				prefix="$challenge/database/"
				suffix=".sql"
				for db in $challenge/database/* ; do
					dbname=${db/$prefix/$replace_with}
					dbname=${dbname/$suffix/$replace_with}
					echo "[+] Importing database $dbname..."
					mysql -u $mysqluser -p$mysqlpass -Bse "create database $dbname;use $dbname;"
					mysql -u $mysqluser -p$mysqlpass $dbname < $db
				done
			fi
		done
	fi
done