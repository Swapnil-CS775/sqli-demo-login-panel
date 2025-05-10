FROM php:8.2-apache

# Install MySQLi and dependencies
RUN docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set correct permissions (good practice)
RUN chown -R www-data:www-data /var/www/html
