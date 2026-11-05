<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'foce' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
                <div class="site-title">
                <a href="#primary">Fleurs d'oranger & chats errants</a>
            </div>

            <div class="menu-fullscreen-container">
                
                <div class="menu-content">
                    <a href="#primary"><img class="menu-logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png'; ?>" alt="logo Fleurs d'oranger & chats errants"></a>
                    
                    <ul class="menu-titles">
                        <li><a href="#story">Histoire</a></li>
                        <li><a href="#characters">Personnages</a></li>
                        <li><a href="#place">Lieu</a></li>
                        <li><a href="#studio">Studio Koukaki</a></li>
                    </ul>
                    
                    <p class="menu-footer-title"><a href="#primary">STUDIO KOUKAKI</a></p>
                </div>

                    <div class="menu-flower flower"></div>
                    <div class="menu-flower sunflower"></div>
                    <div class="menu-flower flower-random"></div>
                    <div class="menu-flower flower-orchid"></div>
                    <div class="menu-flower flower-hibiscus"></div>

                    <img class="cat-nobg kawaneko" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nobg-kawaneko.png" alt="Chat Orenjiiro">
                    <img class="cat-nobg jaakuna" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nobg-jaakuna.png" alt="Chat Jaakuna">
                    <img class="cat-nobg orenjiiro" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/nobg-orenjiiro.png" alt="Chat Kawaneko">
                </ul>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->