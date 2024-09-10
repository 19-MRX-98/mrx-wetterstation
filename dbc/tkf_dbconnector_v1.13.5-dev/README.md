# Version tkf_dbc_connector_v1.13-stable
### Wichtig

- Die Migration kann nur manuell erfolgen!
    - Migrationsschritte
        - Backup der bisherigen Dateien
        - Export der tkf_dbc Tabelle aus Admin DB
        - Export der bisherigen Scheduler Datenbank aus CrontabUI (Export)
        - Anpassung der INI Datei mit Werten der exportierten SQL Tabelle
        - Docker Container erzeugen (Build)
        - Pfade ggf. Anpassen (.env) Datei
        - Import der Scheduler Datenbank 
        - Logs überprüfen cd /wetterstation/comserver/logs
        - tail -f dbc_log.log

---
### Allgemein Image
---
- PHP 8.3.3 
- Alpine Linux 3.19
- Aktuellste Updates

---
### Neue Features
---
- PHP Script zum Import von Openweather Daten für Wetterbericht
- Einstellungen werden nun in einer .ini Datei gemacht
- Implementierung ANALOG
- Anpassung der Scripts zur Nutzung der .ini Datei

---
### Entfernte Elemente
---

---
### PHP
---
- Neue Funktionen:
    - check_reachability
        - Überprüft die Datenbankverbindung zur Wetterstation
        - Schreibt in Logfile

    - log_rotate
        - Überprüft die größe der Logdatei, ob diese größer als 5MB ist
        - Wenn größer als 5MB, erstellt das Script eine neue Logdatei

- Anpassung aller Scripts zur Nutzung der .ini Datei

---
### Datenbank
---
- Abhängigkeiten zur Admin DB wurden entfernt

---
###Features in Erstellung
---
- Reports

---
###Stand 17.08.2024
