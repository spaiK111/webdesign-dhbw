# Verwende die Node.js-Version 20.18.0
FROM node:20.18.0-alpine

# Setze die Umgebungsvariable
ENV NODE_ENV production

# Arbeitsverzeichnis erstellen
WORKDIR /usr/src/app

# Kopiere die package.json und package-lock.json
COPY Controller/api-website-dhbw/package.json Controller/api-website-dhbw/package-lock.json ./

# Installiere die Abhängigkeiten
RUN npm ci --omit=dev

# Führe die Anwendung als nicht-root-Benutzer aus
USER node

# Kopiere den Rest der Quellcodes ins Image
COPY /Controller/api-website-dhbw .

# Exponiere den Port
EXPOSE 5000

# Starte die Anwendung
CMD ["npm", "start"]
