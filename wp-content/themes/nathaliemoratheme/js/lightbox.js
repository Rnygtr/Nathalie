// Récupère la croix sur la Lightbox
var spanlightbox = document.getElementById("close-lightbox");

// Fermeture de la Lightbox lors du clic sur la croix
spanlightbox.onclick = function () {
  lightbox.style.display = "none";
};

// Récupère la Lightbox via son ID.
var lightbox = document.getElementById("myLightbox");

// Récupère dynmiquement les boutons via la classe
var btnlightbox = document.getElementsByClassName("open-lightbox");
// Boucle le nombre de bouton et ouvre la Lightbox au clic
for (var i = 0; i < btnlightbox.length; i++) {
  btnlightbox[i].addEventListener("click", function () {
    lightbox.style.display = "block";
  });
}
// Ajout d'un écouteur click à body pour bouton ajoutés avec Ajax.
document.body.addEventListener("click", function (event) {
  if (event.target.classList.contains("open-lightbox")) {
    lightbox.style.display = "block";
  }
});

// Récupère dynmiquement les boutons via la classe
var btnlightboxperso = document.getElementsByClassName("open-lightbox-perso");
// Boucle le nombre de bouton et ouvre la Lightbox au clic
for (var i = 0; i < btnlightbox.length; i++) {
  btnlightboxperso[i].addEventListener("click", function () {
    lightbox.style.display = "block";
  });
}
// Ajout d'un écouteur click à body pour bouton ajoutés avec Ajax.
document.body.addEventListener("click", function (event) {
  if (event.target.classList.contains("open-lightbox-perso")) {
    lightbox.style.display = "block";
  }
});
