document.addEventListener("DOMContentLoaded", () => {
  const btnLancerPartie = document.getElementById("lancer-partie");
  const selectTheme = document.getElementById("select-theme");
  const selectDifficulte = document.getElementById("select-difficulte");
  const gameGrid = document.querySelector(".game-grid");
  const chronometreDisplay = document.getElementById("chronometre");
  const optionsJeu = document.querySelector(".options-jeu");

  let timerInterval;
  let seconds = 0;

  // --- Fonctions de base ---

  function demarrerChrono() {
    seconds = 0; // Remise à zéro
    chronometreDisplay.style.display = "block"; // Afficher le chrono

    timerInterval = setInterval(() => {
      seconds++;
      const minutes = String(Math.floor(seconds / 60)).padStart(2, "0");
      const remainingSeconds = String(seconds % 60).padStart(2, "0");
      chronometreDisplay.textContent = `⌛ ${minutes}:${remainingSeconds}`;
    }, 1000);
  }

  // Fonction fictive pour générer la grille (à compléter !)
  function genererGrille(theme, difficulte) {
    // 1. Déterminer la taille de la grille (lignes x colonnes)
    let rows, cols;
    switch (difficulte) {
      case "facile":
        rows = 4;
        cols = 4;
        break;
      case "moyen":
        rows = 4;
        cols = 6;
        break;
      case "difficile":
        rows = 6;
        cols = 6;
        break;
      default:
        rows = 4;
        cols = 4;
    }

    // 2. Définir le style CSS de la grille
    gameGrid.style.gridTemplateColumns = `repeat(${cols}, 150px)`;
    gameGrid.style.gridTemplateRows = `repeat(${rows}, 150px)`;

    // 3. Calculer le nombre de cartes (doit être pair)
    const totalCards = rows * cols;
    gameGrid.innerHTML = ""; // Vider le contenu précédent

    // --- Logique de génération des paires d'images ---

    // Simuler des images basées sur le thème
    // **Ici, vous devrez implémenter la logique pour charger les images**
    // Exemple simple :
    const cardImages = [];
    const numPairs = totalCards / 2;

    // Simuler 8 images différentes pour le 4x4, 12 pour 6x4, 18 pour 6x6
    for (let i = 1; i <= numPairs; i++) {
      // Remplacez 'path/to/img_X_theme.png' par vos chemins d'images réels !
      const imageUrl = `assets/images/${theme}/carte_${i}.png`;
      cardImages.push(imageUrl, imageUrl); // Ajout de la paire
    }

    // 4. Mélanger les cartes
    // Algorithme de mélange de Fisher-Yates
    for (let i = cardImages.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [cardImages[i], cardImages[j]] = [cardImages[j], cardImages[i]];
    }

    // 5. Remplir la grille
    cardImages.forEach((imageUrl) => {
      const cell = document.createElement("div");
      cell.classList.add("cell");
      cell.dataset.image = imageUrl; // Stocker l'image pour la comparaison

      // Image de DOS de carte (face cachée)
      const dosImg = document.createElement("img");
      dosImg.src = "assets/images/dos_carte.png"; // VOTRE IMAGE DE DOS DE CARTE
      dosImg.alt = "Dos de carte";

      // Image de FACE de carte (cachée initialement)
      const faceImg = document.createElement("img");
      faceImg.src = imageUrl;
      faceImg.alt = "Carte thème";
      faceImg.classList.add("face-image");
      faceImg.style.display = "none"; // Cacher l'image de face

      cell.appendChild(dosImg);
      cell.appendChild(faceImg);
      gameGrid.appendChild(cell);
    });

    gameGrid.style.display = "grid"; // Afficher la grille
  }

  // --- Gestionnaire d'événement ---

  btnLancerPartie.addEventListener("click", () => {
    // 1. Récupérer les choix de l'utilisateur
    const themeChoisi = selectTheme.value;
    const difficulteChoisie = selectDifficulte.value;

    // 2. Cacher le panneau d'options et afficher le chrono
    optionsJeu.style.display = "none";

    // 3. Lancer le chronomètre
    demarrerChrono();

    // 4. Générer la grille
    genererGrille(themeChoisi, difficulteChoisie);

    // 5. Ici, vous ajouterez la logique du jeu de mémoire (clics, comparaisons, etc.)
    // La logique de jeu n'est pas demandée dans la Story 1, mais c'est l'étape suivante.

    alert(
      `Partie lancée : Thème "${themeChoisi}", Difficulté "${difficulteChoisie}"`
    );
  });
});
