<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>


    <div class="container_photo">

      <article class="post_photo">
        <div class="text_photo">
          <h2>
            <?php the_title(); ?>
          </h2>
          <div class="taxo">
            <p>RÉFÉRENCE :
              <?php echo get_post_meta(get_the_ID(), 'reference', true); ?>
            </p>
            <p>CATÉGORIE :
              <?php echo the_terms(get_the_ID(), 'categorie', false); ?>
            </p>
            <p>FORMAT :
              <?php echo the_terms(get_the_ID(), 'format', false); ?>
            </p>
            <p>TYPE :
              <?php echo get_post_meta(get_the_ID(), 'test', true); ?>
            </p>
            <p>ANNÉE :
              <?php echo the_terms(get_the_ID(), 'annee', false); ?>
            </p>
          </div>
        </div>

        <div class="img_photo">
          <?php the_post_thumbnail(); ?><button class="open-lightbox-perso"></button>
        </div>

      </article>

      <div class="interet">

        <div class="text_bouton">
          Cette photo vous intéresse ? <button id="btnmodald" class="contacter">Contact</button>
        </div>

        <div class="navigation">
        <?php 
  $current_id = get_the_ID();
  $previous_post = get_previous_post();
  if ($previous_post && $current_id !== $previous_post->ID): ?>
          <div class="previous">
            <a href="<?php echo get_permalink(get_previous_post()) ?>">
              <?php echo get_the_post_thumbnail(get_previous_post(), array(80, 80)); ?>
            </a>
            <a href="<?php echo get_permalink(get_previous_post()) ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/LineL.png" alt="fleche gauche"
                class="fleche_gauche"></a>
          </div>
          <?php endif; ?>
          <?php 
  $current_id = get_the_ID();
  $next_post = get_next_post();
  if ($next_post && $current_id !== $next_post->ID): ?>
            <div class="next">
              <a href="<?php echo get_permalink(get_next_post()) ?>">
                <?php echo get_the_post_thumbnail(get_next_post(), array(80, 80)); ?>
              </a>
              <a href="<?php echo get_permalink(get_next_post()) ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/LineR.png" alt="fleche droite"
                  class="fleche_droite">
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>

    </div>

    <div>
      <p class="aimer">VOUS AIMEREZ AUSSI</p>

      <?php
      $cats = array_map(function ($terms) {
        return $terms->term_id;
      }, get_the_terms(get_post(), 'categorie'));

      // On place les critères de la requête dans un Array
      $args = array(
        'post__not_in' => [get_the_ID()],
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'tax_query' => [

          [
            'taxonomy' => 'categorie',
            'terms' => $cats,


          ]
        ]
      );
      //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
      $query = new WP_Query($args);
      ?>
      <!-- //On vérifie si le résultat de la requête contient des articles -->
      <?php if ($query->have_posts()): ?>
        <div class="container_thumbnail">
          <!-- //On parcourt chacun des articles résultant de la requête -->
          <?php while ($query->have_posts()): ?>
            <?php $query->the_post(); ?>
            <div class="news">
              <?php if (has_post_thumbnail()): ?>
                <div class="thumbnail">
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
      wp_reset_query();
      ?>



      <div class="accueil"><a href="http://localhost/Nathalie/">
          <button class="contacter">Toutes les photos</button></a> </div>


    </div>


    </div>

  <?php endwhile; endif; ?>
<?php get_footer(); ?>