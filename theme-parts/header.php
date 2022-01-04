<header>
        <nav>
            <ul>
                <li>
                    <?php 
                    wp_nav_menu(
                    array(
                        'theme_location' => 'logo'
                        )
                    )
                    ?>
                </li>
                <li id="menu_btn" >M<span class="strokes"><span class="top"></span><span class="center"></span><span class="bottom"></span></span>NU</li>
            </ul>
            <div class="header_clr"></div>
            <div class="loading open"></div>
            <div class="menu_list">
                <?php get_template_part("/theme-parts/gitter") ?>
                <?php 
                wp_nav_menu(
                array(
                    'theme_location' => 'top-menu'
                    )
                )
                ?>

                <div id="mode_switch">
                    <a href="http://rasmuskmoller.dk/kursfestival1">Skift til den <span></span> version</a>
                </div>
            </div>
            
        </nav>
        
    </header>