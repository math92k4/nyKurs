<section class="content">
    <ul class="gitter_list">
        <?php
        $params = array(
            //order by date - asc
            'orderby' => 'post_date',
            //no max-limit (take all)
            'limit' => -1,
        );
        $pods = pods('fp_content', $params);

        while ($pods->fetch()) { 

            if ($pods->field('grafik')) { ?>

            <li class="graphic <?php echo $pods->field('figur') ?>">
                <?php
                get_template_part("/theme-parts/gitter");

                if ($pods->field('figur') == "mailchimp") {
                    get_template_part("/theme-parts/mailchimp");

                } else {
                ?>
                <a href=" <?php echo $pods->field('link') ?> ">
                    <span class="shape"></span>
                    <p><span><?php echo $pods->field('tekst') ?></span></p>
                </a>

                <?php } ?>
            </li>

            <?php } else { 

                // Settings for both img and fallback-img
                $image = $pods->field('billede');
                $fallback = $pods->field('billede_fallback');
                $size = ''; 
                $default = -1; 
                $force = false; 
                $imgUrl = pods_image_url($image, $size, $default, $force);
                $fallbackUrl = pods_image_url($fallback, $size, $default, $force);

                ?>
                
                <li class="image">
                <?php get_template_part("/theme-parts/gitter"); 
                
                if ($pods->field('blank')) { ?>

                    <a href=" <?php echo $pods->field('link') ?>" target="_blank" >

                <?php
                } else { 
                ?>

                    <a href=" <?php echo $pods->field('link') ?>" >
                    
                <?php
                }
                ?>

                        <picture data-image="<?php echo $imgUrl?>"  data-fallback="<?php echo $fallbackUrl ?>">
                            <source srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" type="image/webp">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" loading="lazy">
                        </picture>
                        <span class="shape"></span>
                        <p><span><?php echo $pods->field('tekst') ?></span></p>
                    </a>
                </li>

            <?php } ?>
        <?php } ?>
    </ul>
</section>