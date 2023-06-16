<!-- Lightbox -->
<div id="myLightbox" class="lightbox">

<?php

// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "root", "Nathalie");


// Vérifier la connexion
if (!$conn) {
  die("Connexion échouée: " . mysqli_connect_error());
}

// Requête pour récupérer les images
$sql = "SELECT * FROM wp_posts WHERE post_name LIKE 'nathalie-%' AND post_type = 'attachment'";
$result = mysqli_query($conn, $sql);

// Vérifier s'il y a des résultats
if (mysqli_num_rows($result) > 0) {

  // Afficher le code HTML pour le carousel
  echo '<div class="carousel">';

  // Afficher les images
  while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="item">';
      echo '<img src="' . $row['guid'] . '">';
      echo '</div>';
  }

  echo '<button id="close-lightbox">X</button>';
  echo '<a class="prev">&#10094;</a>';
  echo '<a class="thenext">&#10095;</a>';

  echo '</div>';

  // Inclure les fichiers CSS et JavaScript nécessaires pour faire fonctionner le carousel
  echo '<style>';
  echo '.carousel .item {';
  echo 'display: none;';
  echo '}';
  echo '.carousel .item:first-child {';
  echo 'display: block;';
  echo '}';
  echo '</style>';

  echo '<script>
  jQuery(document).ready(function($){
  var currentSlide = 0;
  var numSlides = $(".carousel .item").length;
  $(".carousel .prev").click(function(){
  currentSlide--;
  if (currentSlide < 0) { currentSlide = numSlides - 1; }
  $(".carousel .item").hide();
  $(".carousel .item:eq(" + currentSlide + ")").fadeIn();
  e});
  $(".carousel .thenext").click(function(){
  currentSlide++;
  if (currentSlide >= numSlides) { currentSlide = 0; }
  $(".carousel .item").hide();
 $(".carousel .item:eq(" + currentSlide + ")").fadeIn();
  });
  });
 </script>';
  echo '<script>// Récupère la croix sur la Lightbox
  var spanlightbox = document.getElementById("close-lightbox");
  
  // Fermeture de la Lightbox lors du clic sur la croix
  spanlightbox.onclick = function() {
      lightbox.style.display = "none";
  }</script>';

} else {
  echo "Aucune image trouvée.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);

?>
</div>

