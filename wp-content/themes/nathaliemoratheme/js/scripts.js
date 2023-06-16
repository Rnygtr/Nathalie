// Recupère la modale via son ID
var modal = document.getElementById("myModal");

// Recupère les 3 boutons qui ouvrent la modale
var btn = document.getElementById("btnmodal");
var btnd = document.getElementById("btnmodald");
var btnb = document.getElementById("btnmodalburger");

// Recupère la croix pour fermer la modale
var span = document.getElementsByClassName("close")[0];

// Ouverture de la modale lors du clic sur les boutons
btn.onclick = function () {
  modal.style.display = "block";
};

btnd.onclick = function () {
  modal.style.display = "block";
};

btnb.onclick = function () {
  modal.style.display = "block";
};

// Fermeture de la modale lors du clic sur la croix
span.onclick = function () {
  modal.style.display = "none";
};

// Fermeture de la modale lors du clic en dehors
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
