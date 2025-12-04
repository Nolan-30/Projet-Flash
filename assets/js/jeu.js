document.addEventListener("DOMContentLoaded", () => {
  // ====================================================
  // 1. CONSTANTES & ÉLÉMENTS
  // ====================================================

  // Liste complète des icônes Devicon
  const deviconSvgList = [
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/apple/apple-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/android/android-original.svg",
    // ... (Reste de la liste des 50 SVG)
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/angular/angular-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/sass/sass-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nodejs/nodejs-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/java/java-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/csharp/csharp-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/ruby/ruby-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/swift/swift-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kotlin/kotlin-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/c/c-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/devicon/devicon-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/bootstrap/bootstrap-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/jquery/jquery-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nextjs/nextjs-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nuxtjs/nuxtjs-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/spring/spring-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/django/django-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/symfony/symfony-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/dotnet/dotnet-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/postgresql/postgresql-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mongodb/mongodb-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/redis/redis-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/docker/docker-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kubernetes/kubernetes-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/amazonwebservices/amazonwebservices-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/googlecloud/googlecloud-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/azure/azure-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/jira/jira-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/confluence/confluence-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/jenkins/jenkins-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/github/github-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/gitlab/gitlab-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/bitbucket/bitbucket-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/git/git-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vscode/vscode-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/npm/npm-original-wordmark.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/webpack/webpack-original.svg",
  ];

  // Éléments UI
  const boutonGenerer = document.getElementById("btn-generer");
  const affichageChrono = document.getElementById("chrono");
  const gameGrid = document.querySelector(".game-grid");
  const selectTaille = document.getElementById("select-taille");
  const selectTheme = document.getElementById("select-theme");

  // Variables de Jeu (let)
  let tempsEcoule = 0;
  let chronometre;
  let cartesRetournees = [];
  let verifEnCours = false;
  let pairesTrouvees = 0;

  // ====================================================
  // 2. LOGIQUE DU JEU DE MÉMOIRE
  // ====================================================

  // Vérifie si les deux cartes retournées forment une paire.
  const checkForMatch = () => {
    const [carte1, carte2] = cartesRetournees;
    const src1 = carte1.querySelector(".face-visible").src;
    const src2 = carte2.querySelector(".face-visible").src;

    if (src1 === src2) {
      // PAIRE TROUVÉE
      carte1.classList.add("matched");
      carte2.classList.add("matched");
      pairesTrouvees++;

      if (pairesTrouvees * 2 === gameGrid.children.length) {
        finDePartie();
      }
      cartesRetournees = [];
      verifEnCours = false;
    } else {
      // PAS UNE PAIRE : On les cache après 1 seconde.
      setTimeout(() => {
        carte1.classList.remove("flipped");
        carte2.classList.remove("flipped");
        cartesRetournees = [];
        verifEnCours = false;
      }, 1000);
    }
  };

  // Retourne une carte et gère l'état du jeu.
  const flipCard = (cell) => {
    // Bloquer les clics si non pertinent
    if (
      verifEnCours ||
      cell.classList.contains("matched") ||
      cartesRetournees.includes(cell)
    ) {
      return;
    }

    cell.classList.add("flipped");
    cartesRetournees.push(cell);

    if (cartesRetournees.length === 2) {
      verifEnCours = true;
      checkForMatch();
    }
  };

  // ====================================================
  // 3. FIN DE PARTIE & AJAX
  // ====================================================

  // 3. FIN DE PARTIE & AJAX
  // ====================================================

  // Fonction appelée lorsque la partie est gagnée.
  const finDePartie = () => {
    clearInterval(chronometre);
    const scoreFinal = affichageChrono.innerText; // Récupère le temps (ex: 01:23)
    const difficulte = "Normal"; // Tu peux récupérer la vraie valeur du select si tu veux

    console.log(`Partie terminée en ${scoreFinal}!`);

    // 1. Envoi en AJAX vers PHP
    fetch("utils/save_score.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        score: scoreFinal,
        difficulty: difficulte,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("Score sauvegardé :", data);
      })
      .catch((error) => console.error("Erreur AJAX:", error));

    // 2. Afficher la Popup
    document.getElementById("score-final").innerText = scoreFinal;
    document.getElementById("popup-fin").style.display = "flex";
  };

  // Gestion du bouton REJOUER
  document.getElementById("btn-rejouer").addEventListener("click", () => {
    location.reload(); // Recharge la page simplement
  });

  // ====================================================
  // 4. GRILLE ET CHRONO
  // ====================================================

  // Algorithme de Fisher-Yates pour mélanger un tableau.
  const shuffleArray = (array) => {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  };

  // Génère la grille de jeu.
  const genererGrille = (taille, theme) => {
    // Réinitialisation des variables
    pairesTrouvees = 0;
    cartesRetournees = [];
    verifEnCours = false;

    // Détermination de la taille (cols, rows)
    let cols, rows;
    if (taille.trim() === "6x6") {
      [cols, rows] = [6, 6];
    } else if (taille.trim() === "10x10") {
      [cols, rows] = [10, 10];
    } else {
      [cols, rows] = [4, 4];
    }

    const nombreDePaires = (cols * rows) / 2;
    gameGrid.innerHTML = "";

    // Sélection des images uniques (Devicon)
    let imagesUniques = shuffleArray([...deviconSvgList]).slice(
      0,
      nombreDePaires
    );

    // Création des paires d'images (pour la boucle `forEach` plus bas)
    let imagesPaires = [];
    imagesUniques.forEach((imagePath) => {
      imagesPaires.push(imagePath, imagePath);
    });
    // ❌ SUPPRIMER OU COMMENTER LE BLOC SUIVANT
    // imagesPaires = [];
    // for (let i = 0; i < nombreDePaires; i++) {
    //   imagesPaires.push(
    //     `/Projet-flash/assets/images/BO6.jpg`,
    //     `/Projet-flash/assets/images/BO6.jpg`
    //   );
    // }
    // ❌ FIN DU BLOC À SUPPRIMER OU COMMENTER

    // Mélange final
    imagesPaires = shuffleArray(imagesPaires);

    // Configuration et remplissage de la grille
    gameGrid.style.gridTemplateColumns = `repeat(${cols}, 1fr)`;
    gameGrid.style.gridTemplateRows = `repeat(${rows}, 1fr)`;
    gameGrid.style.display = "grid";

    imagesPaires.forEach((imagePath) => {
      const cell = document.createElement("div");
      cell.classList.add("cell");

      const cellInner = document.createElement("div");
      cellInner.classList.add("cell-inner");

      const dosImg = document.createElement("img");
      dosImg.src = "assets/images/dos-carte.jpg";
      dosImg.classList.add("face-cachee");

      const faceImg = document.createElement("img");
      faceImg.src = imagePath;
      faceImg.classList.add("face-visible");

      cellInner.appendChild(dosImg);
      cellInner.appendChild(faceImg);

      cell.appendChild(cellInner);

      cell.addEventListener("click", () => flipCard(cell));
      gameGrid.appendChild(cell);
    });
  };

  // Démarre/Réinitialise le chronomètre (MM:SS.M)
  const startChrono = () => {
    clearInterval(chronometre);
    tempsEcoule = 0;

    chronometre = setInterval(() => {
      tempsEcoule += 100;

      const totalSecondes = Math.floor(tempsEcoule / 1000);
      const minutes = Math.floor(totalSecondes / 60);
      const secondes = totalSecondes % 60;
      const millisecondes = Math.floor((tempsEcoule % 1000) / 100);

      const minutesFormat = String(minutes).padStart(2, "0");
      const secondesFormat = String(secondes).padStart(2, "0");

      affichageChrono.innerText = `${minutesFormat}:${secondesFormat}.${millisecondes}`;
    }, 100);

    affichageChrono.style.display = "block";
  };

  // ====================================================
  // 5. GESTIONNAIRES D'ÉVÉNEMENTS
  // ====================================================

  // Lancement du jeu
  boutonGenerer.addEventListener("click", () => {
    startChrono();
    genererGrille(selectTaille.value, selectTheme.value);
  });
  // });
});
