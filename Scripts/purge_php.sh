# Uninstall all Apache2 and php files
sudo apt-get --purge remove apache2
sudo apt purge libapache2-mod-php8.1 libapache2-mod-php
sudo apt-get autoremove
sudo rm -r /etc/apache2
sudo rm -r /etc/php

# Reinstall and verify Apache2
sudo apt-get install apache2
sudo ufw allow 'Apache'
sudo systemctl status apache2

# Reinstall and verify PHP
sudo apt install libapache2-mod-php8.1 libapache2-mod-php
sudo a2enmod php8.1

# Restart the Apache2 service
sudo systemctl restart apache2.service