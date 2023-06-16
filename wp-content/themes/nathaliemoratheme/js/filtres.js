// Attacher un événement "change" à chaque select
jQuery("#cat-filter, #for-filter, #for-date").on("change", function () {
  // Récupérer la valeur de chaque select
  var cat = jQuery("#cat-filter").val();
  var format = jQuery("#for-filter").val();
  var tri = jQuery("#for-date").val();

  // Créer un objet de données pour la requête AJAX
  var data = {
    action: "filter_photos",
  };

  // Ajouter chaque valeur qui n'est pas vide à l'objet de données
  if (cat) {
    data.cat = cat;
  }
  if (format) {
    data.format = format;
  }
  if (tri) {
    data.tri = tri;
  }

  // Effectuer une requête AJAX vers le fichier PHP approprié
  jQuery.ajax({
    url: "/Nathalie/wp-admin/admin-ajax.php",
    type: "POST",
    data: data,
    success: function (response) {
      $(".container_thumbnail_block").html(response); // Remplacer le contenu
    },
  });
});
