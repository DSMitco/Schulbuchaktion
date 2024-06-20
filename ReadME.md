# Schulbuchaktion
Ein Programm für die Schulbuchaktion der HTL-Steyr

<h2>Aufsetzen</h2>
1. node js installieren (Falls es nicht installiert ist) mit "node -v" kann man prüfen ob dieser vorhanden ist. <br>
2. git clonen (Falls kein Git vorhaden) Ordner erstellen und "git init" ausführen im ordner, dann "git clone https//.."<br>
3. Projekt öffnen<br>
4. Im Ordner "frontend" Command "npm i vite" falls vite nicht vorhanden ist.<br>
5. "npm run dev" ausführen um den port zu bekommen und den server local zu starten.<br>
<p>
(frontend)
npm i vite@latest
npm i vue-router@4
npm i pinia
npm install primevue@^3.4.0 primeicons@^4.1.0 –save
npm install primevue

npm run dev 			im frontend
(Backend)
.env.nginx von .env.nginx.local kopieren
docker starten
docker-compose build	        im Backend .docker ordner wo die Dockerfiles sind
docker-compose up
</p>

