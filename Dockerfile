# Usar la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instalar la extensión MySQLi
RUN docker-php-ext-install mysqli

# Copiar el contenido de tu repositorio a la carpeta del servidor web
COPY . /var/www/html/

# Exponer el puerto 80 para el servidor
EXPOSE 80

# Ejecutar Apache en primer plano
CMD ["apache2-foreground"]
