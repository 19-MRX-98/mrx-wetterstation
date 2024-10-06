from db_config_reader import read_db_config  # Importiere die Funktion aus db_config_reader
from plotter import create_plot_from_db  # Importiere die Plot-Funktion aus dem plotter-Skript

def main():
    # Schritt 1: Lese die Datenbank-Konfiguration aus der .ini-Datei
    try:
        print("Lese Datenbank-Konfigurationsdatei...")
        db_config = read_db_config()  # Liest die .ini-Datei und gibt die Konfigurationsdaten zurück
        print("Datenbank-Konfigurationsdaten erfolgreich geladen.")
    except Exception as e:
        print(f"Fehler beim Laden der Datenbank-Konfiguration: {e}")
        return
    
    # Schritt 2: Führe das Plotter-Skript aus, um das Diagramm zu erstellen
    try:
        print("Erstelle Plot auf Basis der Datenbank...")
        create_plot_from_db(db_config)  # Übergebe die Konfigurationsdaten an das Plotter-Skript
        print("Plot erfolgreich erstellt.")
    except Exception as e:
        print(f"Fehler beim Erstellen des Plots: {e}")
        return

if __name__ == "__main__":
    main()
