<!-- The Modal -->
<div id="myModal" class="modal modal-overlay">

    <!-- Modal content -->
    <div class="modal-content">
    <img src="<?php echo get_template_directory_uri(); ?>../images/contact.svg" alt="contact" class="contact">
   <div class="formulaire"> 
    <form action="" method="get" class="form-example">
    <div class="form_center"><label for="nom">NOM</label>
    <input type="text" name="nom" id="nom" required></div>
    <div class="form_center"><label for="email">E-MAIL</label>
    <input type="email" name="email" id="email" required></div>
    <div class="form_center"><label for="ref">RÉF. PHOTO</label>
    <input type="text" name="ref" id="ref" required></div>
    <div class="form_center"><label for="message">MESSAGE</label>
    <input type="message" name="message" id="message" required></div>
    <div class="form_center"><input type="submit" value="Envoyer"></div>
    </form>
  </div>


    </div>
  
  </div>