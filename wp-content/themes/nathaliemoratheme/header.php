<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    $(document).ready(function () {
      var reference = "<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>";
      if (reference !== null) {
        $("#ref").val(reference);
      }
    });
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


  <?php wp_body_open(); ?>
  <header id="header">
    <div><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" class="logo"></div>
    <div class="new_menu">
      <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'header-menu', )); ?>
      <button id="apropos"class="apropos">A PROPOS</button>
      <button id="btnmodal" class="bouton_menu">CONTACT</button>
    </div>
    <div class="burger_menu">
      <button class="burger_icon"></button>
      <div class="burger_content">
        <div class="top_burger">
          <div><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo_burger"
              class="logo_burger"></div>
          <div><button id="burger_icon_close" class="burger_icon_close">X</button></div>
        </div>
        <div class="menu_burger">
          <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'header-menu', )); ?>
          <button id="btnmodalburger" class="bouton_menu">CONTACT</button>
        </div>
      </div>
  </header>