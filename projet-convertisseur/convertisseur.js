function convertir() {
    var valeur = parseFloat(document.getElementById('value').value);
    var unite = document.getElementById('unit').value;
    var resultat = '';

    switch (unite) {
        case 'm':
            resultat = valeur * 100 + ' cm';
            break;
        case 'cm':
            resultat = valeur / 100 + ' m';
            break;
        case 'l':
            resultat = valeur * 1000 + ' mL';
            break;
        case 'ml':
            resultat = valeur / 1000 + ' L';
            break;
        case 'g':
            resultat = valeur * 1000 + ' mg';
            break;
        case 'mg':
            resultat = valeur / 1000 + ' g';
            break;
        default:
            resultat = 'Unité non prise en charge';
    }

    document.getElementById('result').innerText = resultat;
}
