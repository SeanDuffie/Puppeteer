#!/bin/bashTCI

TCI="tamuartists_tci"
INT="tamuartists_int_dv"
RT="tamuartists_root_ca2"

cd ./Certificates

# Extract .key from .pem
# openssl rsa -in $TCI.pem -out $TCI.key
# Extract .crt from .pem
openssl crl2pkcs7 -nocrl -certfile $TCI.pem | openssl pkcs7 -print_certs -out $TCI.crt

# Extract .key from .pem
# openssl rsa -in $INT.pem -out $INT.key
# Extract .crt from .pem
openssl crl2pkcs7 -nocrl -certfile $INT.pem | openssl pkcs7 -print_certs -out $INT.crt

# Extract .key from .pem
# openssl rsa -in $RT.pem -out $RT.key
# Extract .crt from .pem
openssl crl2pkcs7 -nocrl -certfile $RT.pem | openssl pkcs7 -print_certs -out $RT.crt
