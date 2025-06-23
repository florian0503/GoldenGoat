# Dockerfile

# On part de l’image officielle PHP 8.3 FPM
FROM php:8.3-fpm

# Installe les dépendances système puis l’extension pdo_mysql
RUN apt-get update \
 && apt-get install -y libzip-dev libonig-dev unzip \
 && docker-php-ext-install pdo_mysql mbstring zip \
 && rm -rf /var/lib/apt/lists/*

# Copie votre code dans le container
WORKDIR /srv/app
COPY . /srv/app

# Rend bin/console exécutable
RUN chmod +x bin/console

# Expose le port (facultatif si vous utilisez symfony serve via host)
EXPOSE 8000

# Commande par défaut : PHP intégré
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
