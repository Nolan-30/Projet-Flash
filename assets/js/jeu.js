document.addEventListener("DOMContentLoaded", () => {
  // 1. On récupère tous les éléments nécessaires
  const boutonGenerer = document.getElementById("btn-generer");
  const affichageChrono = document.getElementById("chrono");
  const gameGrid = document.querySelector(".game-grid"); // La grille où les cartes vont être placées

  const selectTaille = document.getElementById("select-taille");
  const selectTheme = document.getElementById("select-theme");

  let tempsEcoule = 0;
  let chronometre;

  // --- LOGIQUE DE GÉNÉRATION DE LA GRILLE ---
  function genererGrille(taille, theme) {
    // Déterminer les dimensions de la grille
    let cols, rows;

    if (taille === "6x6") {
      cols = 6;
      rows = 6;
    } else if (taille === "10x10") {
      cols = 10;
      rows = 10;
    } else {
      cols = 4;
      rows = 4;
    }
    const nombreDeCartes = cols * rows;
    const nombreDePaires = nombreDeCartes / 2;

    // Vider la grille précédente
    gameGrid.innerHTML = "";

    // Préparer les images (C'est ICI qu'il faut prévoir les images!)
    // EXEMPLE: Vous devez avoir des fichiers images nommés "aventure_1.png", "aventure_2.png", etc.
    const imagesPaires = [];
    for (let i = 1; i <= nombreDePaires; i++) {
      const imagePath = `/Projet-flash/assets/images/BO6.jpg`;
      imagesPaires.push(imagePath, imagePath); // Ajout d'une paire
    }

    // Mélanger les cartes (Algorithme de Fisher-Yates)
    for (let i = imagesPaires.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [imagesPaires[i], imagesPaires[j]] = [imagesPaires[j], imagesPaires[i]];
    }

    // Configurer le CSS de la grille pour la taille choisie
    gameGrid.style.gridTemplateColumns = `repeat(${cols}, 1fr)`;
    gameGrid.style.gridTemplateRows = `repeat(${rows}, 1fr)`;
    gameGrid.style.display = "grid"; // Afficher la grille

    // Remplir la grille avec les cartes
    imagesPaires.forEach((imagePath) => {
      const cell = document.createElement("div");
      cell.classList.add("cell");

      // Image de DOS de carte (face cachée par défaut)
      const dosImg = document.createElement("img");
      dosImg.src = "assets/images/dos-carte.jpg"; // VOTRE IMAGE DE DOS
      dosImg.classList.add("face-cachee");

      // Image de FACE de carte (l'image du thème)
      const faceImg = document.createElement("img");
      faceImg.src = imagePath;
      faceImg.classList.add("face-visible");
      faceImg.style.display = "none"; // Cachée au début

      cell.appendChild(dosImg);
      cell.appendChild(faceImg);
      gameGrid.appendChild(cell);
    });
  }

  // --- GESTIONNAIRE D'ÉVÉNEMENT (START) ---

  boutonGenerer.addEventListener("click", () => {
    // 1. Arrêt / Reset du chrono
    clearInterval(chronometre);
    tempsEcoule = 0;
    affichageChrono.innerText = "00:00";
    affichageChrono.style.display = "block";

    // 2. Lancement du chronomètre
    chronometre = setInterval(() => {
      tempsEcoule++;
      const minutes = Math.floor(tempsEcoule / 60);
      const secondes = tempsEcoule % 60;
      const minutesFormat = minutes < 10 ? "0" + minutes : minutes;
      const secondesFormat = secondes < 10 ? "0" + secondes : secondes;
      affichageChrono.innerText = `${minutesFormat}:${secondesFormat}`;
    }, 1000);

    // 3. Génération de la grille (Répond au critère manquant)
    const tailleChoisie = selectTaille.value;
    const themeChoisi = selectTheme.value;
    genererGrille(tailleChoisie, themeChoisi);

    console.log(`Partie démarrée: ${tailleChoisie} - Thème: ${themeChoisi}`);
  });
});
