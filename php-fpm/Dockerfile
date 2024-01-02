# Use a imagem oficial do PHP com o FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Instale as extensões necessárias do PHP
RUN docker-php-ext-install mysqli

# Instale o composer
RUN apt-get update && apt-get install -y git zip unzip

# Instale o qemu-utils para usar o qemu-img
RUN apt-get install -y qemu-utils

CMD ["php-fpm", "-F", "-R"]
