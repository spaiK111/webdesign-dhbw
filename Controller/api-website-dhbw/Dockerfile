# Verwende die Node.js-Version 20.18.0
FROM node:latest


# Arbeitsverzeichnis erstellen
WORKDIR /usr/src/app



# Installiere die Abhängigkeiten
COPY package*.json ./
COPY . . 

RUN npm install

# Kopiere den Rest der Quellcodes ins Image
COPY . .

# Exponiere den Port
EXPOSE 5500

# Starte die Anwendung
CMD ["npm" , "start"]
