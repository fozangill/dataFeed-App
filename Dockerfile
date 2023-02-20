FROM php:8.1.4-fpm-alpine
WORKDIR /app
COPY . .
RUN php application app:install database
RUN touch database/database.sqlite
RUN php application migrate:fresh
ENTRYPOINT ["php", "application"]

