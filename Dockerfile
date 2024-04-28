FROM php:7.4-apache
COPY site/ /var/www/html/
EXPOSE 80