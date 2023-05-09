# Uninstall all Apache2 and php files
echo "UNINSTALL EVERYTHING..."
sudo apt-get --purge remove apache2 -y
sudo apt purge libapache2-mod-php8.1 libapache2-mod-php -y
sudo apt-get autoremove -y
sudo rm -r /etc/apache2
sudo rm -r /etc/php

# Reinstall and verify Apache2
echo "REINSTALLING APACHE2..."
sudo apt-get install apache2 -y
sudo ufw allow 'Apache'
# sudo systemctl status apache2

# Reinstall and verify PHP
echo "REINSTALLING PHP..."
sudo apt install libapache2-mod-php8.1 libapache2-mod-php -y
sudo a2enmod php8.1

# Update and clean
echo "UPDATE AND CLEAN..."
sudo apt-get update && sudo apt full-upgrade -y && sudo apt autoremove

# Restart the Apache2 service
echo "RESTART SERVICE..."
sudo systemctl restart apache2.service