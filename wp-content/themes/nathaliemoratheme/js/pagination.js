let currentPage = 1;
$("#load-more").on("click", function () {
  currentPage++; // Ajout de 1 à la page

  $.ajax({
    type: "POST",
    url: "/Nathalie/wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "weichie_load_more",
      paged: currentPage,
    },
    success: function (response) {
      $(".container_thumbnail_block").append(response);
      $("head").append(
        '<link rel="stylesheet" type="text/css" href="wp-content/themes/nathaliemoratheme/css/ajax.css?' +
          new Date().getTime() +
          '">'
      );
    },
  });
});
