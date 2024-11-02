# syntax=docker/dockerfile:1

FROM php:apache

# Setze das Arbeitsverzeichnis
WORKDIR /var/www/html

# Kopiere die Anwendung
COPY . .

# Installiere notwendige PHP-Erweiterungen
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Konfiguriere die PHP-Einstellungen
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Installiere inotify-tools für die Überwachung von Dateiänderungen
RUN apt-get update && apt-get install -y inotify-tools

# Setze den Benutzer auf www-data
USER www-data

# Expose den Port 80
EXPOSE 9000

# Starte den Apache-Server in einer Endlosschleife mit Überwachung
CMD ["sh", "-c", "while true; do inotifywait -e modify,create,delete -r /var/www/html && apachectl -k graceful; done"]
