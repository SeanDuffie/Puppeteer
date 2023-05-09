#!/bin/bash
cd ../Certificates
PRV="private"
PUB="public" # Use your own domain name
DOMAIN="sduffie.ddns.net"
ALT="seanduffie.myddns.me"

######################
# Become a Certificate Authority
######################
echo "Generating Private Key..."
# Generate private key
openssl genrsa -des3 -out $PRV.key 2048
# Generate root certificate
openssl req -x509 -new -nodes -key $PRV.key -sha256 -days 1825 -out $PRV.pem

######################
# Create CA-signed certs
######################
echo "Generating Public Key..."
# Generate a private key
openssl genrsa -out $DOMAIN.key 2048
# Create a certificate-signing request
openssl req -new -key $DOMAIN.key -out $DOMAIN.csr
# Create a config file for the extensions
>$DOMAIN.ext cat <<-EOF
authorityKeyIdentifier=keyid,issuer
basicConstraints=CA:FALSE
keyUsage = digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment
subjectAltName = @alt_names
[alt_names]
DNS.1 = $DOMAIN # Be sure to include the domain name here because Common Name is not so commonly honoured by itself
DNS.2 = $ALT/* # Optionally, add additional domains (I've added a subdomain here)
# IP.1 = 192.168.0.13 # Optionally, add an IP address (if the connection which you have planned requires it)
EOF
# Create the signed certificate
openssl x509 -req -in $DOMAIN.csr -CA $PRV.pem -CAkey $PRV.key -CAcreateserial \
-out $DOMAIN.crt -days 1825 -sha256 -extfile $DOMAIN.ext

######################
# Verify the certificates
######################
echo "Verifying..."
openssl verify -CAfile $PRV.pem -verify_hostname $DOMAIN $DOMAIN.crt
