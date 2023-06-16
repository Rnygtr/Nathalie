<form method="get" id="filter-form">
<?php $terms = get_terms('categorie');
 
 $select ="<section id='select_section'><div class='categories_select'><p>CATÉGORIES</p><select name='cat-filter' id='cat-filter' class='postform'>n";
 $select.= "<option value='-1'>Choisir une catégorie</option>n";

 foreach($terms as $term){
   if($term->count > 0){
       $select.= "<option value='".$term->slug."'>".$term->name."</option>";
   }
 }

 $select.= "</select> </div>";

 echo $select;
?>

<?php $terms = get_terms('format');
 
 $select = "<div class='formats_select'><p>FORMATS</p><select name='for-filter' id='for-filter' class='postform'>n";
 $select.= "<option value='-1'>Choisir un format</option>n";

 foreach($terms as $term){
   if($term->count > 0){
       $select.= "<option value='".$term->slug."'>".$term->name."</option>";
   }
 }

 $select.= "</select> </div>";

 echo $select;
?>
<div class='formats_select'><p>TRIER PAR</p><select name='for-date' id='for-date' class='postform'>n";
 <option value='-1'>Trier les photos</option>
 <option value='0'>Nouveautés</option>
 <option value='1'>Populaires</option>
 <option value='2'>Anciens</option>
 </select> </div> </section></form>
 

 


<?php

      // On place les critères de la requête dans un Array
        $args = array(
          'post_type' => 'photo',
          'posts_per_page' => 8,
          'paged' => 1,
        
          
        );
        //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
        
        $query = new WP_Query($args);
        ?>
        <!-- //On vérifie si le résultat de la requête contient des articles -->
        <?php if ($query->have_posts()): ?>
          <div class="container_thumbnail_block" id="container_thumbnail_block">
            <!-- //On parcourt chacun des articles résultant de la requête -->
            <?php while ($query->have_posts()): ?>
              <?php $query->the_post(); ?>
              <div class="news_block filter" data-category="<?php echo esc_attr(implode(',', wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'slugs')))); ?>" data-format="<?php echo esc_attr(implode(',', wp_get_post_terms(get_the_ID(), 'format', array('fields' => 'slugs')))); ?>">
                <?php if (has_post_thumbnail()): ?>
                  <div class="thumbnail-block">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/karina.jpg
                    " alt="karina" class="karina">
                    
                    </a>
                    
                    <p class="categories"><?php echo the_terms(get_the_ID(), 'categorie', false); ?></p>
                    <p class="titre"><?php the_title(); ?></p>
                    <button class="open-lightbox" id="open-lightbox">
                    <span class="eye">
									<img src="<?php echo get_template_directory_uri() ?>/images/eye.svg">
								</span>
                    </button>
  
           
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

<div class="btn__wrapper">
  <a href="#!" class="btn btn__primary" id="load-more">Charger plus</a>
</div>
