// Sélectionne le bouton du menu burger
const burgerButton = document.querySelector(".burger_icon");

// Sélectionne le contenu du menu burger
const burgerContent = document.querySelector(".burger_content");

const burgerFermer = document.querySelector("#burger_icon_close");

// Ajoute un événement "click" au bouton du menu burger
burgerButton.addEventListener("click", function () {
  // Bascule le display sur none
  burgerButton.style.display = "none";
  // Bascule le display sur block
  burgerContent.style.display = "block";
  // Lance l'animation
  burgerContent.classList.add("descendre");
});

// Ajout d'un événement "click" au bouton de fermeture du menu burger
burgerFermer.addEventListener("click", () => {
  // Lance l'animation inverse
  burgerContent.classList.remove("descendre");
  burgerContent.classList.add("remonter");

  // Attend que l'animation soit terminée, puis masque le contenu du menu burger
  setTimeout(function () {
    burgerButton.style.display = "block";
    burgerContent.style.display = "none";
    burgerContent.classList.remove("remonter");
  }, 1000); // La durée de l'animation inverse est de 1 seconde
});
