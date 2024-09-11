function vergroessern() {
    var bildElement = document.getElementById('vergroesserbaresBild');

    // Beispiel: Vergrößere das Bild um 1.5-fach
    var aktuelleGroesse = window.getComputedStyle(bildElement).getPropertyValue('transform');
    var neueGroesse = 'scale(1.5)';

    // Setze die neue Transformationsmatrix für die Vergrößerung
    bildElement.style.transform = (aktuelleGroesse === 'none') ? neueGroesse : aktuelleGroesse + ' ' + neueGroesse;
}