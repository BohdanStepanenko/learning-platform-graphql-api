FROM php:8.4-cli

# System dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install \
        pdo_mysql \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create application user matching host user bs (UID/GID 1000)
RUN groupadd -g 1000 appgroup \
    && useradd -u 1000 -g 1000 -m -s /bin/bash appuser

WORKDIR /var/www/html

# Run application as host user
USER appuser

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
