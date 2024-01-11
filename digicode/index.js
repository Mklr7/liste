const codeInput = document.getElementById("codeInput");
let texte = document.getElementById("texte-color");
let color = document.querySelector(".color")
let code = "";

// Fonction pour ajouter un chiffre au code
function addToCode(digit) {
    if (code.length < 4) {
        code += digit;
        updateCodeDisplay();
    }
}

// Fonction pour effacer le code
function clearCode() {
    code = "";
    updateCodeDisplay();
}

// Fonction pour soumettre le code (à personnaliser selon vos besoins)
function submitCode() {
    if (code === "1453") {
        Autorisé();
    } else {
        nonAutorisé();
    }
    clearCode();
}

// Fonction pour mettre à jour l'affichage du code
function updateCodeDisplay() {
    codeInput.value = "*".repeat(code.length); // Affiche des astérisques au lieu des chiffres
}


function Autorisé() {
    texte.style.color = ("green");
    color.innerHTML = 'Accès Autorisé - Vous pouvez entrée !!';
};


function nonAutorisé() {
    texte.style.color = ("red")
    color.innerHTML = 'Accès Non Autorisé - Vous ne pouvez pas entrée !!';
};
