FROM php:8.2-apache

WORKDIR /var/www/html

COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html

HEALTHCHECK --interval=30s --timeout=5s --retries=3 \
  CMD php -r "exit(@file_get_contents('http://localhost/login.php') === false ? 1 : 0);"
  
EXPOSE 80