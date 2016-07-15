#!/bin/bash
#
# Script to change permissions and add security
# measures to challenges vm
#
# Usage: /vagrant/change_permissions.sh

# change permissions WORKING!!!!
sudo chown -R www-data:www-data /var/www
sudo chmod go-rwx /var/www
sudo chmod go+x /var/www
sudo chgrp -R www-data /var/www
sudo chmod -R go-rwx /var/www
sudo chmod -R g+x /var/www
sudo chmod ugo-rw /etc
sudo chmod ugo-rw /home/vagrant
sudo chmod ugo-rw /lib
sudo chmod ugo-rw /usr
sudo chmod ugo-rw /bin

# remove ssh capabilities WORKING!!
sudo sed -i 's/Port 22/Port 24242/g' /etc/ssh/sshd_config
sudo sed -i 's/Bits 1024/Bits 2048/g' /etc/ssh/sshd_config
sudo sed -i 's/GraceTime 120/GraceTime 30/g' /etc/ssh/sshd_config
sudo sed -i 's/RootLogin without-password/RootLogin no/g' /etc/ssh/sshd_config

# apache server hardening
sudo sed -i 's/#<Directory \/srv\/>/\<Directory \/var\/www\/html>/g' /etc/apache2/apache2.conf
sudo sed -i 's/#\tOptions Indexes FollowSymLinks/\tOptions -Indexes/g' /etc/apache2/apache2.conf
sudo sed -i 's/#\tAllowOverride None/<\/Directory>/g' /etc/apache2/apache2.conf
sudo sed -i 's/#\tRequire all granted/ServerSignature Off/g' /etc/apache2/apache2.conf
sudo sed -i 's/#<\/Directory>/ServerTokens Prod/g' /etc/apache2/apache2.conf

# change passwords
echo "root:iNfC16s3c" | sudo chpasswd
echo "vagrant:1mPoS$18L3" | sudo chpasswd