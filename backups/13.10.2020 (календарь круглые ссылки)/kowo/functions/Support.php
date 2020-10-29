 <?php
   /*добавляем поддержку миниатюр в постах и страницах*/
    add_theme_support( 'post-thumbnails', array( 'post', 'available_places' ));
	add_image_size( 'available_places_thumb', 540, 450, true);
	add_image_size( 'thumb_min', 20, 13, false);
	add_image_size( 'thumb_event', 560, 300, true);
	add_image_size( 'history_img', 600, 398, true);
	add_image_size( 'contacts_img', 540, 410, true);
	add_image_size( 'home_kowo_main', 1100, 582, true);

?>
