import configparser

def read_db_config(filename='/conf/webapp.ini', section='mysql'):
    """
    Liest die Datenbankkonfigurationsdaten aus einer .ini-Datei.
    
    :param filename: Name der Konfigurationsdatei
    :param section: Sektion der Konfigurationsdatei, aus der die Daten gelesen werden
    :return: Ein Dictionary mit den Verbindungsdaten
    """
    # Erstellt einen Parser für die Konfigurationsdatei
    parser = configparser.ConfigParser()

    # Lese die .ini-Datei
    parser.read(filename)

    # Erstelle ein Dictionary mit den Datenbankverbindungsdaten
    db_config = {}
    if parser.has_section(section):
        items = parser.items(section)
        for item in items:
            db_config[item[0]] = item[1]
    else:
        raise Exception(f'Section {section} not found in the {filename} file')
    
    return db_config