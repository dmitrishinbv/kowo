<?php
/*register main menu*/
add_action( 'after_setup_theme', 'ThemeRegisterNavMenu' );
function ThemeRegisterNavMenu() {
    register_nav_menu( 'main_nav_menu', 'Main menu');
}
?>