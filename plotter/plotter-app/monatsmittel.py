import mysql.connector
from mysql.connector import Error
import matplotlib.pyplot as plt
import mplcursors  # Für den Hover-Effekt
from db_config_reader import read_db_config  # Importiere die Funktion aus dem separaten Script

# Datenbankverbindung herstellen
def create_connection():
    try:
        # Lese die Datenbankkonfiguration aus der .ini-Datei
        db_config = read_db_config()

        # Verbindung zur Datenbank herstellen
        connection = mysql.connector.connect(
            host=db_config['db_host'],
            user=db_config['db_username'],
            password=db_config['db_password'],
            database=db_config['database']
        )

        if connection.is_connected():
            return connection
    except Error as e:
        print(f"Fehler bei der Verbindung zur Datenbank: {e}")
        return None

# Funktion zum Abrufen der Daten und Berechnung für jeden Monat
def get_rain_data_for_year(connection):
    cursor = connection.cursor(dictionary=True)
    months = []
    rain_differences = []

    # Schleife über alle Monate des Jahres (1 bis 12)
    for month in range(1, 13):
        try:
            # Erster Wert für den Monat abrufen
            first_query = f"""
                SELECT datetime, Regen 
                FROM wetterdaten01 
                PARTITION (p_wetterdaten_act_01)
                WHERE MONTH(datetime) = {month}
                ORDER BY datetime ASC 
                LIMIT 1
            """
            cursor.execute(first_query)
            first_row = cursor.fetchone()

            # Letzter Wert für den Monat abrufen
            last_query = f"""
                SELECT datetime, Regen 
                FROM wetterdaten01 
                PARTITION (p_wetterdaten_act_01)
                WHERE MONTH(datetime) = {month}
                ORDER BY datetime DESC 
                LIMIT 1
            """
            cursor.execute(last_query)
            last_row = cursor.fetchone()

            # Überprüfen, ob Daten für den Monat vorhanden sind
            if not first_row or not last_row:
                print(f"Kein Regen oder Datum in der Zukunft für Monat {month}")
                rain_differences.append(0)  # Kein Regen für diesen Monat
            else:
                # Berechnung des Regenwerts für den Monat
                regen_differenz = last_row['Regen'] - first_row['Regen']
                berechneter_wert = regen_differenz / 10
                rain_differences.append(berechneter_wert)

            months.append(month)  # Monat speichern

        except Error as e:
            print(f"Fehler bei der Abfrage für Monat {month}: {e}")
            rain_differences.append(0)  # Setze 0 bei Fehler

    return months, rain_differences

# Funktion zum Plotten der Daten als Balkendiagramm
def plot_rain_data(months, rain_differences):
    plt.figure(figsize=(10, 6))
    bars = plt.bar(months, rain_differences, color='blue')  # Erstelle Balkendiagramm
    plt.title('Monatliche Regenmenge im Jahr')
    plt.xlabel('Monat')
    plt.ylabel('Regenmenge (berechneter Wert)')
    plt.xticks(months)  # Monate als x-Achsen-Werte
    plt.grid(True, axis='y')  # Gitter nur für y-Achse

    # mplcursors für den Hover-Effekt aktivieren
    cursor = mplcursors.cursor(bars, hover=True)

    # Füge den Text (Wert) beim Hover hinzu
    cursor.connect("add", lambda sel: sel.annotation.set_text(f"Regen: {rain_differences[sel.index]:.2f}"))

    plt.show()

# Hauptfunktion
def main():
    connection = create_connection()
    if connection:
        months, rain_differences = get_rain_data_for_year(connection)
        connection.close()

        # Plotten der Daten als Balkendiagramm
        plot_rain_data(months, rain_differences)
    else:
        print("Keine Verbindung zur Datenbank hergestellt.")

if __name__ == "__main__":
    main()