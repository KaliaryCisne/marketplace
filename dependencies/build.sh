#!/usr/bin/env bash

# Atualiza a lista de pacotes do sistema
apt-get update
apt-get upgrade -y

# Instala a versao 7.4 do php
apt-get install software-properties-common
add-apt-repository ppa:ondrej/php
apt-get update
apt-get install php7.4

# Instala pacotes
apt-get install -y $(awk '{print $1'} /var/www/dependecies/linux_packages.list)

# Habilita as extensões do PHP
phpenmod $(awk '{print $1'} /var/www/dependecies/php_extensions.list)

php artisan serve
