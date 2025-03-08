# Usar la imagen oficial de PHP
FROM php:7.4-cli

# Instalar el servidor web Apache y la extensión MySQLi
RUN apt-get update && apt-get install -y libapache2-mod-php && docker-php-ext-install mysqli

# Copiar el contenido de tu repositorio a la carpeta del servidor web
COPY . /var/www/html/

# Exponer el puerto 8080 para la aplicación
EXPOSE 8080

# Ejecutar Apache en primer plano
CMD ["apache2-foreground"]
