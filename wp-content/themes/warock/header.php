<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package warock
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77664950-1', 'auto');
  ga('send', 'pageview');

</script>
    
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'warock' ); ?></a>

	<header id="masthead" data-sticky-container>
	<div id="sticky-masthead" data-sticky data-options="marginTop:0;" data-anchor="content">
    <div class="row column masthead-wrapper">
        <div class="logo" style="position:absolute; left:0; top:0; background:#416d9a">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri () . '/images/logo.png'; ?>" alt="Logo"></a>
        </div>
        
        <div class="row column phone show-for-large">
            <span class="office-phone">OFFICE: <a href="tel:2532621661">(253) 262-1661</a></span>    
            <span class="sales-phone">SALES: <a href="tel:2533774001">(253) 377-4001</a></span>
        </div>
        
        <div class="row column top-bar show-for-large">    
            <?php wp_nav_menu( array( 
            'theme_location' => 'primary',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>'
                ) ); ?>
            
        </div>
        <div class="call-to-action show-for-large">
            <?php echo '<a href="'. site_url() .'/index.php/?p=16" class="green-btn">CONTACT US</a>'; ?>
        </div>
        
        <div class="columns small-offset-7 medium-offset-8 small-2 hide-for-large mobile-phone">
          <a href="tel:253-262-1661"><img class="phone-icon" src="<?php echo get_template_directory_uri () . '/images/phone-icon.png'; ?>" /></a>
        </div>         
          
          
        <div class="columns small-2 hide-for-large title-bar" data-responsive-toggle="mobile-menu" data-hide-for="large">
        	<button class="menu-icon" type="button" data-toggle></button>
        </div>
        
        <div class="hide-for-large" id="mobile-menu">
            <ul class="menu vertical" data-accordion-menu data-disable-hover="true" data-click-open="true" data-force-follow="true">
                <?php wp_nav_menu( array( 
                'menu' => 'primary-mobile',
                'container' => '',
                'menu_class' => 'vertical menu', 
                'container_id' => 'primary-mobile-navigation',
                'items_wrap' => '%3$s',
                'depth' => 2
            ) ); ?>
            </ul>
        </div>
    </div><!--end row column-->


	</div><!-- End Sticky -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
