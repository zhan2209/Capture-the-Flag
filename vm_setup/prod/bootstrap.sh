#!/usr/bin/env bash
sudo apt-add-repository ppa:ondrej/php #allows for php7.0
# set mysql root password
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password iNfC16s3c'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password iNfC16s3c'

# update repository
sudo apt-get update

# install components of lamp server
sudo apt-get -y install mysql-server-5.6 php-mysql apache2 php7.0

# install phantomjs
sudo apt-get install phantomjs