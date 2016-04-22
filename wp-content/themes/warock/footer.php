<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package warock
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="row">
    	<div class="columns medium-3">
            <a href="<?php echo get_site_url() . '/#calculator'; ?>">
        	<div class="row collapse">
            <div class="columns large-3">
            	<span class="icon"><img src="<?php echo get_template_directory_uri () . '/images/calculator.png'; ?>"></span>
            </div>
            <div class="columns large-9">
            	<h4>Project<br>
            	<strong>Calculator</strong></h4>
            </div>
            </div><!--End Row-->
            </a>
        </div>
    	<div class="columns medium-3">
            <a href="tel:2533773438">
        	<div class="row collapse">
            <div class="columns large-3">
        		<span class="icon"><img src="<?php echo get_template_directory_uri () . '/images/call-sales.png'; ?>"></span>
            </div>
            <div class="columns large-9">
                <h4>Call Sales<br>
                <strong>(253) 377-4001</strong></h4>
            </div>
            </div><!--End Row-->
            </a>
        </div>
    	<div class="columns medium-3">
            <a href="<?php echo get_site_url() . '/index.php?p=16'; ?>">
        	<div class="row collapse">
            <div class="columns large-3">
        		<span class="icon"><img src="<?php echo get_template_directory_uri () . '/images/get-a-quote.png'; ?>"></span>
            </div>
            <div class="columns large-9">
                <h4>Get A<br>
                <strong>Quote</strong></h4>
            </div>
            </div><!--End Row-->
            </a>
        </div>
    	<div class="columns medium-3" style="text-align:center;">
        	<img class="wsdot" src="<?php echo get_template_directory_uri () . '/images/wsdot-logo.png'; ?>">
        </div>
    </div><!--End Row-->
    <div class="row column divider">
    </div>
    <div class="row">
    	<div class="columns large-3">
        	<img src="<?php echo get_template_directory_uri () . '/images/logo.png'; ?>" alt="Logo"><br>
            <div class="social">

            <ul>
            	<?php if( get_field('twitter', 'option') ){ ?>
					<li class="twitter-icon"><a href="<?php the_field('twitter', 'option'); ?>"><i class="fa fa-lg fa-twitter"></i></a></li>
				<?php } ?>
            	<?php if( get_field('linkedin', 'option') ){ ?>
					<li class="linkedin-icon"><a href="<?php the_field('linkedin', 'option'); ?>"><i class="fa fa-lg fa-linkedin"></i></a></li>
				<?php } ?>
            	<?php if( get_field('google', 'option') ){ ?>
					<li class="google-icon"><a href="<?php the_field('google', 'option'); ?>"><i class="fa fa-lg fa-google-plus"></i></a></li>
				<?php } ?>
            	<?php if( get_field('pinterest', 'option') ){ ?>
					<li class="pinterest-icon"><a href="<?php the_field('pinterest', 'option'); ?>"><i class="fa fa-lg fa-pinterest"></i></a></li>
				<?php } ?>
            	<?php if( get_field('facebook', 'option') ){ ?>
					<li class="facebook-icon"><a href="<?php the_field('facebook', 'option'); ?>"><i class="fa fa-lg fa-facebook"></i></a></li>
				<?php } ?>
                
            </ul>
            </div>
        </div>
    	<div class="columns large-3">
            <h5>Contact</h5>
            <ul class="accordion" data-accordion data-allow-all-closed="true">
            <?php
			// check if the repeater field has rows of data
			if( have_rows('accordion', 'option') ):
			
				// loop through the rows of data
				while ( have_rows('accordion', 'option') ) : the_row();
	
					?>
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title"><?php the_sub_field('header', 'option'); ?></a>
						<div class="accordion-content" data-tab-content>
							<?php the_sub_field('content', 'option'); ?>
						</div>
					</li>
					<?php
				endwhile;
			
			else :
			
				// no rows found
			
			endif; ?>
            
            </ul>
        </div>
    	<div class="columns large-2">
            <ul class="menu vertical">
                <?php 
				$nav_menu4 = wp_get_nav_menu_object(4);
				echo '<h5>'.$nav_menu4->name.'</h5>';
				wp_nav_menu( array( 
            	'menu' => 'services', 
                'container' => '', 
                'menu_class' => '', 
                'menu_id' => '', 
                'items_wrap' => '%3$s',
                'depth' => 1
            ) ); ?>
            </ul>
        </div>
    	<div class="columns large-2">
            <ul class="menu vertical">
                <?php 
				$nav_menu5 = wp_get_nav_menu_object(5);
				echo '<h5>'.$nav_menu5->name.'</h5>';
				wp_nav_menu( array( 
            	'menu' => 'residential', 
                'container' => '', 
                'menu_class' => '', 
                'menu_id' => '', 
                'items_wrap' => '%3$s',
                'depth' => 1
            ) ); ?>
            </ul>
        </div>
    	<div class="columns large-2">
            <ul class="menu vertical">
                <?php 
				$nav_menu6 = wp_get_nav_menu_object(6);
				echo '<h5>'.$nav_menu6->name.'</h5>';

				wp_nav_menu( array( 
            	'menu' => 'commercial', 
                'container' => '', 
                'menu_class' => '', 
                'menu_id' => '', 
                'items_wrap' => '%3$s',
                'depth' => 1
            ) ); ?>
            </ul>
        </div>
    </div><!--End Row-->
    <div class="row column">
        <div class="site-info">
			&copy; <?php echo date('Y'); ?> Washington Rock Quarries. All rights reserved <a href="http://www.sayenkodesign.com/">Web Design Seattle</a> by <a href="http://www.sayenkodesign.com/">Sayenko Design</a>
		</div><!-- .site-info -->
    </div><!-- End Row-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
