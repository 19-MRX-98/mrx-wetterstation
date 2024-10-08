### Admin Panel Version 1 Alpha

---
### Allgemein Image
---
- PHP 8.3.3 
- Ubuntu 22.04.02
- Aktuellste Updates
- chartjs 4.4.4

---
### Funktionen:
---

- Folgende Funktionen können bereits für diese Version genutzt werden:
    - Übersicht der laufenden Dockercontainer
    - Ansicht Logs /Auswahl Logs
        - Logs von Adminpanel
        - Logs von Datenbankconnector
    - Konfiguration des Datenbankconnectors via .ini Datei
    - Konfiguration der Wetterstation-Webapp via .ini Datei
        - Highlights: 
            - Änderung der Erscheinung zwischen Darkmode und Lightmode
            - Anpassung der Pfade an deine Umgebung, sehr variabel anpassbar
    - Konfiguration des Adminpanels via .ini Datei
    - Konfiguration des Dockercontainers des Adminpanels
    - Authentifizierungstoken für Cloudanbindung
    - RSA Key Generator
    

---
### Features in Erstellung
---
- Datenbankeinstellungen
    - Übersichtsseite mit allg. aktuellen Datenbankstatistiken
- Datenbankupdate ausführen
    - Hochladen von SQL Scripts 
    - Ausführung des Datenbankupdates
    - Spiegelung der Datenbank und herunterladen der Datenbank
- Updates von Server laden
    - Entpacken in vorgesehene Verzeichnisse 
    - Anzeige, das Update für Modul verfügbar ist
    - Readme.md interpretieren
- RSA Authentifizierung am Updateserver
- Admin Recht für zum Aktivieren oder Deaktivieren von Boostrap Tags