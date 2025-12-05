document.addEventListener("DOMContentLoaded", () => {
  // Liste des 50 images de Jeu
  const listImages = [
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/apple/apple-original.svg",
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/android/android-original.svg",
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
    "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tensorflow/tensorflow-original.svg",
  ];

  const boutonGenerer = document.getElementById("btn-generer");
  const affichageChrono = document.getElementById("chrono");
  const gameGrid = document.querySelector(".game-grid");
  const selectTaille = document.getElementById("select-taille");
  const selectTheme = document.getElementById("select-theme");

  // variables du jeu
  let tempsEcoule = 0;
  let chronometre;
  let cartesRetournees = [];
  let verifEnCours = false;
  let pairesTrouvees = 0;

  // LOGIQUE DU JEU DE MÉMOIRE

  // on verifie si les deux cartes retournés sont identiques
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
      //sinon on les cache 1sec apres
      setTimeout(() => {
        carte1.classList.remove("flipped");
        carte2.classList.remove("flipped");
        cartesRetournees = [];
        verifEnCours = false;
      }, 1000);
    }
  };

  // permet de retourner une carte et de gerer l'etat du jeu
  const flipCard = (cell) => {
    // bloque les clics si non pertinent
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

  // on appl la fonction "fin de partie" quand on a gagné.
  const finDePartie = () => {
    clearInterval(chronometre);
    const scoreFinal = affichageChrono.innerText; // permet de recuperer le temps
    const difficulte = "Normal";

    console.log(`Partie terminée en ${scoreFinal}!`);

    //  Envoi en AJAX vers PHP
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

    // on affiche le Popup une fois la partie fini
    document.getElementById("score-final").innerText = scoreFinal;
    document.getElementById("popup-fin").style.display = "flex";
  };

  // gestion du bouton rejouer
  document.getElementById("btn-rejouer").addEventListener("click", () => {
    location.reload();
  });

  //  GRILLE ET CHRONO

  // permet de melanger un tableau.
  const shuffleArray = (array) => {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  };

  // on genere la grille de jeu.
  const genererGrille = (taille, theme) => {
    // reinitialisation des variables
    pairesTrouvees = 0;
    cartesRetournees = [];
    verifEnCours = false;

    // determination de la taille lignes et colones
    let cols, rows;
    if (taille === "6x6") {
      [cols, rows] = [6, 6];
    } else if (taille === "10x10") {
      [cols, rows] = [10, 10];
    } else {
      [cols, rows] = [4, 4];
    }
    //  ce calcul permet de savoir le nbr d'images diferents necessaires.
    const nombreDePaires = (cols * rows) / 2;
    // avant de creer une nouvelle grille on s'assure d'abord de l'avoir vider
    gameGrid.innerHTML = "";

    // on melange la liste des 50 icones et on prend le nbr d'image dont on a besoin
    let imagesUniques = shuffleArray([...listImages]).slice(0, nombreDePaires);

    // creation des paires d'images pr la grande boucle
    let imagesPaires = [];
    imagesUniques.forEach((imagePath) => {
      imagesPaires.push(imagePath, imagePath);
    });

    // dernier melange
    imagesPaires = shuffleArray(imagesPaires);

    // ca prend tt les cartes qu'on a cree et les place dans la grille
    gameGrid.style.gridTemplateColumns = `repeat(${cols}, 1fr)`;
    gameGrid.style.gridTemplateRows = `repeat(${rows}, 1fr)`;
    gameGrid.style.display = "grid";

    //GRANDE BOUCLE

    // pr chaque image dans la liste d'image melangees
    imagesPaires.forEach((imagePath) => {
      // creation d'un new container
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

  // on demarre/reinitialise le chrono
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
