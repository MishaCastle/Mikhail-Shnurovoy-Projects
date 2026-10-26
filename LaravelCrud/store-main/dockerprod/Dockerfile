FROM php:8.4-fpm AS php
# Adjust user permissions
RUN usermod --uid 1000 www-data && groupmod --gid 1001 www-data
# Add Composer and set ownership
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN chown -R www-data:www-data /usr/local/bin/composer
# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    unzip \
    libpq-dev \
    libonig-dev \
    libssl-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    intl \
    zip \
    bcmath \
    soap \
    && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set working directory
WORKDIR /var/www/public
# Copy application files
COPY --chown=www-data:www-data . .
# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis
# Copy entrypoint script
COPY docker/entrypoint.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint.sh && chown www-data /usr/bin/entrypoint.sh
USER www-data
EXPOSE 9000
ENTRYPOINT [ "/usr/bin/entrypoint.sh" ]