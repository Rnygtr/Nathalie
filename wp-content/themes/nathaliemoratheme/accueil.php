<?php
/*
  Template Name: Accueil
*/
get_header(); ?>
	
<div class="hero" >
  
<?php
      // On place les critères de la requête dans un Array
        $args = array(
          'post_type' => 'photo',
          'posts_per_page' => 1,
          'orderby' => 'rand',
          
        );
        //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
        $query = new WP_Query($args);
        ?>
        <main
			class="posts-list"
			data-page="<?= get_query_var('paged') ? get_query_var('paged') : 1; ?>"
			data-max="<?= $wp_query->max_num_pages; ?>"
		>
        <!-- //On vérifie si le résultat de la requête contient des articles -->
       <?php if ($query->have_posts()): ?>
          <div class="container_thumbnail_accueil">
            <div id="resultats"></div>
            <!-- //On parcourt chacun des articles résultant de la requête -->
            <?php while ($query->have_posts()): ?>
              <?php $query->the_post(); ?>
              <div class="news_accueil">
                <?php if (has_post_thumbnail()): ?>
                  <div class="thumbnail-accueil">
                 
                    <a href="<?php the_permalink(); ?>">
                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo '<div class="produkt" style="background: url('. $url.'); background-size: cover">'; ?>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php else: ?>
          <p>Désolé, aucun article ne correspond à cette requête</p>
        <?php endif;
        wp_reset_query();
        ?>
</div>


    <?php 

// Le haut de l'interface est ajouté avant le contenu
include 'templates_parts/photo_block.php'; ?>
<?php include 'templates_parts/lightbox.php';?>
	<?php get_footer(); ?>
