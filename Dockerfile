# Use official PHP + Apache image
FROM php:8.1-apache

# Copy all files to Apache root
COPY . /var/www/html/

# Enable .htaccess rewrite rules (optional)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Expose Apache port
EXPOSE 80
