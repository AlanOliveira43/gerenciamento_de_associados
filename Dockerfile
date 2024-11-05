# Usar uma imagem oficial do PHP com Apache
FROM php:8.0-apache

# Instalar extensões necessárias para PHP e PostgreSQL
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Copiar arquivos da aplicação para o diretório padrão do Apache
COPY ./src/ /var/www/html/

# Dar permissão ao Apache para acessar os arquivos
RUN chown -R www-data:www-data /var/www/html
