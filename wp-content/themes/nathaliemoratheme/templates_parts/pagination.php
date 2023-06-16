<?php
function display_photos($catego, $formats) {
      // On place les critères de la requête dans un Array
        $args = array(
          'post_type' => 'photo',
          'posts_per_page' => 8,
          'orderby' => 'date',
          'order' => 'DESC',
          'tax_query' => [

            [
              'taxonomy' => $catego,
              'terms' => $formats,
              'field' => 'slug',
  
            ]
            ]
          
        );
        //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
        
        $query = new WP_Query($args);
        ?>
        <!-- //On vérifie si le résultat de la requête contient des articles -->
        <?php if ($query->have_posts()): ?>
          <div class="container_thumbnail_recherche" id="container_thumbnail_recherche">
            <!-- //On parcourt chacun des articles résultant de la requête -->
            <?php while ($query->have_posts()): ?>
              <?php $query->the_post(); ?>
              <div class="news_recherche">
                <?php if (has_post_thumbnail()): ?>
                  <div class="thumbnail-recherche">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(array(550, 550)); ?>
                    </a>
                    
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
           
          </div>
        <?php else: ?>
          <p>Désolé, aucun article ne correspond à cette requête</p>
        <?php endif;
        wp_reset_query();}
        ?>