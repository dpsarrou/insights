#!/usr/bin/env bash

#-----------------DEFINE HERE YOUR VARIABLES-----------------
SERVER_NAME="local.endouble-insights.com"
DOCUMENT_ROOT="/var/www/public"
SERVER_HOST_IP="192.168.33.1"
#------------------------------------------------------------


# -----------------------
#   update the composer
# -----------------------
composer self-update

#----enable bind address from mysql
echo "Updating mysql configs in /etc/mysql/my.cnf."
sed -i "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
echo "Updated mysql bind address in /etc/mysql/my.cnf to 0.0.0.0 to allow external connections."

echo "Restarting mysql service.."
service mysql stop
service mysql start


# ---------------------------------------
#          Apache Setup
# ---------------------------------------

# linking Vagrant directory to Apache 2.4 public directory
#ln -s /vagrant /var/www

# Add ServerName to httpd.conf
#echo "ServerName localhost" > /etc/apache2/httpd.conf
# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "$DOCUMENT_ROOT"
  ServerName $SERVER_NAME
  <Directory "$DOCUMENT_ROOT">
    AllowOverride All
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf

# Restarting apache to make changes
service apache2 restart

# xdebug install here
#apt-get update
#apt-get install php5-dev
#apt-get update
#sudo pecl install xdebug

#XDEBUG_PATH=$(find / -name 'xdebug.so' 2> /dev/null)

# echo "zend_extension=\"$XDEBUG_PATH\""  >> /etc/php5/apache2/php.ini
# echo "xdebug.default_enable=1
# xdebug.remote_enable=1
# xdebug.remote_handler=dbgp
# xdebug.remote_host=$SERVER_HOST_IP
# xdebug.remote_port=9000
# xdebug.remote_autostart=0" >> /etc/php5/apache2/php.ini