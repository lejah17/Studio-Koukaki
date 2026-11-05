<?php

get_header();
?>

    <main id="primary" class="site-main">
        <section class="banner fade-section">
             <video 
                 id="video-bg"
                  autoplay 
                 muted 
                 loop 
            >
        <source src="<?php echo get_stylesheet_directory_uri() . '/assets/video/video-koukaki.mp4'; ?>" type="video/mp4">
    </video>
    <!-- Image fallback mobile -->
         <img 
             class="banner-fallback" 
             src="<?php echo get_stylesheet_directory_uri() . '/assets/img/banner.png'; ?>" 
              alt="Fleurs d’oranger & chats errants"
         >
    <!-- Logo -->
        <div class="banner-logo">
            <img 
                class="logo-floating" 
                src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png'; ?>" 
                alt="logo Fleurs d'oranger & chats errants"
            >
        </div>
        </section>

        <section id="story" class="story fade-section">
            <h2 class="section-title">L'histoire</h2>
            <article id="" class="story__article">
                <p><?php echo get_theme_mod('story'); ?></p>
            </article>

            <?php
            $args = array(
                'post_type' => 'characters',
                'posts_per_page' => -1,
                'meta_key'  => '_main_char_field',
                'orderby'   => 'meta_value_num',

            );
            $characters_query = new WP_Query($args);
            ?>
            <article id="characters">
                <div class="characters-title">
                    <h3>Les personnages</h3>
                </div>
                <div class="swiper carrousel">
                    <div class="swiper-wrapper">
                        <?php
                        if ( isset( $characters_query ) && $characters_query->have_posts() ) :
                            while ( $characters_query->have_posts() ) : $characters_query->the_post();
                        ?>
                                <!-- chaque personnage devient une slide Swiper -->
                                <div class="swiper-slide">
                                    <figure>
                                        <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                                        <figcaption><?php the_title(); ?></figcaption>
                                    </figure>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata(); // On réinitialise la requête WP
                        endif;
                        ?>
                    </div>
                </div>
            </article>

            <article id="place">
                <div>
                    <h3>Le Lieu</h3>
                    <p><?php echo get_theme_mod('place'); ?></p>
                </div>

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/big_cloud.png" 
                    alt="Grand nuage" 
                    class="cloud big-cloud">

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/little_cloud.png" 
                    alt="Petit nuage" 
                    class="cloud little-cloud">
            </article>

        </section>

        <section id="studio" class="studio fade-section">
            <h2 class="section-title">Studio Koukaki</h2>
            <div>
                <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
                <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
            </div>
            </section>

    </main><!-- #main -->


<?php
get_footer();