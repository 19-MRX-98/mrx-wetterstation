# Version tkf_dbc_connector_v1.13.5-dev
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
        - Rechte im Ordner /var/wetterstation/dbc/tkf_dbconnector_v1.13-stable/comserver/logs auf 666 ändern,  sonst startet der Container nicht 
        - Logs überprüfen cd /wetterstation/comserver/logs
        - tail -f dbc_log.log

---
### Allgemein Image
---
- PHP 8.2.2 
- Alpine Linux 3.19
- Aktuellste Updates

---
### Neue Features
---
- Generierung verschiedener Daten für Datenbanktabellen
    - Jahreswerte: Die Jahreswerte werden 1x tgl. um 0.00 Uhr neu berechnet, in eine Datenbanktablle geschrieben und werden in der Webapp abgerufen. Das senkt die benötigte Rechenleitstung auf der Datenbank.
    - Monatsmittel und Abweichungen: Die Monatsmittel und die Abweichungen werden 1x tgl. um 23.30 neu berechnet, in eine Datenbanktablle geschrieben und werden in der Webapp abgerufen. Das senkt die benötigte Rechenleitstung auf der Datenbank.

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

    - update_jahreswerte
        - Aktualisiert die Jahreswerte und schreibt diese zurück in eine Datenbanktabelle

    - update_monatsmittel_ljm
        - Aktualisiert die Monatsmittel, vergleicht die aktuellen Werte mit dem langjährigen Mittel und schreibt diese zurück in einen Datenbanktabelle

---
### Datenbank
---
- 

---
###Features in Erstellung
---
- 

---
###Stand 14.09.2024
