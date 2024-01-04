# Puppeteer

The webserver that will run on a raspberry pi and control the interface between my smart devices and the rest of the world

## Future Features

- [ ] SSL certificate for JavaScript
- [ ] Redesign HTML for new backend
- [ ] Webhooks for JavaScript
- [ ] Set up Github runner on RPi for automatic updates
    - https://www.digitalocean.com/community/tutorials/how-to-use-git-hooks-to-automate-development-and-deployment-tasks
- [ ] Allow selections of different nodes


## Setup Apache2 Server

- TODO:
1. Run purge_php.sh


## Securing the site with an SSL certificate (through Noip.com)

1. Enable Mod SSL
    ```bash
    sudo a2enmod ssl
    sudo systemctl restart apache2
    ```
2. Generate the CSR file (creates a private and public key)
    1. Change directories to the ./Scripts folder
    2. Run the ca_gen.sh script
    ```bash
    cd ./Scripts
    bash ca_gen.sh
    ```
3. Send the public key to the Certificate Authority
    1. Upload CSR file to [No-ip SSL Certificates](https://my.noip.com/my-services/ssl-certificates)
4. Transfer all the needed certifications from the official Certificate Authority to the ./Certificates directory
    1. Primary Certificate - "{NAME}_tci.pem" - [From No-ip](https://my.noip.com/my-services/ssl-certificates)
    2. Intermediate Certificate - "{NAME}_int_dv.pem" - [From DigiCert](https://www.digicert.com/kb/digicert-root-certificates.htm#intermediates)
    3. Root Certificate - "{NAME}_root_ca2.pem" - [From DigiCert](https://www.digicert.com/kb/digicert-root-certificates.htm#roots)
5. From the ./Scripts directory, run the pem_extract.sh script
6. Modify the /etc/apache2/sites-available/{domain}-ssl.conf file accordingly:
    ```
    <VirtualHost *:443>
        
        ...
        
        SSLEngine on
        SSLCertificateFile {ABSOLUTE PATH}/Certificates/{NAME}_tci.crt
        SSLCertificateKeyFile {ABSOLUTE PATH}/Certificates/{DOMAIN}_.crt
        SSLCertificateChainFile {ABSOLUTE PATH}/Certificates/{NAME}_int_dv.crt
    ```
6. Enable SSL
    ```
    sudo a2ensite {DOMAIN}-ssl.conf
    sudo apache2ctl -t
    sudo systemctl restart apache2
    ```

## Modify Apache2 server to use proper keys

1. https://www.rosehosting.com/blog/how-to-enable-https-protocol-with-apache-2-on-ubuntu-20-04/#Step-4-Enable-HTTPS-and-Install-an-SSL-Certificate