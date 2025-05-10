FROM php:8.2-apache

# Install mysqli and other PHP extensions
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite (optional but good for dev)
RUN a2enmod rewrite

# Copy your code into the container
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
