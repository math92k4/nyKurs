<?php 
add_theme_support('menus');

register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'logo' => 'Logo',
        'kontakt' => 'Kontakt Footer',
        'praktisk' => 'Praktisk Footer',
        'om' => 'Om Footer',
    )
);
?>