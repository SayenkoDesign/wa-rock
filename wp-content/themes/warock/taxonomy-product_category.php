<?php
/**
 * The template for displaying archive product pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

get_header(); ?>
<div class="secondary-nav-row">
	<div class="row collapse">
    	<div class="column show-for-medium">
			<?php wp_nav_menu( array( 
            'menu' => 'products',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>'
            ) ); 
			?>
    	</div>
        <div class="column hide-for-medium">
        	<?php wp_nav_menu( array( 
            'menu' => 'products',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="vertical menu" data-dropdown-menu>%3$s</ul>'
            ) ); 
			?>
        </div>
    </div><!--End Row-->
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div class="row">
			<h2 class="category-title"><?php single_cat_title (); ?></h2>
        </div>

<div id="lazyload">
        <?php
          $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
          $query_args = array(
            'post_type' => 'product',
            'paged' => $paged
          );
        ?>
          <?php if ( have_posts() ) : ?>
            <div class="page" id="p<?php echo $paged; ?>">
			<?php
			/* Start the Loop */
			$count=0;
			while ( have_posts() ) : the_post();
switch ($count%12) {
    case 0:
		$count++;
		if( $count == count( $posts ) ) {
		?>
        <div class="row"><!--start row 1-->
        	<div class="columns archive-short medium-12">
            <?php
				get_template_part( 'template-parts/content-archive', get_post_format() );
			?>
            </div>
        </div>
		<?php	
		}
		else{
		?>
        <div class="row"><!--start row 1-->
        	<div class="columns medium-4">
            	<div class="row columns">
                	
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        		</div><!--End Row-->
		<?php
		}
        break;
    case 1:		?>
                <div class="row columns">
            <?php
                get_template_part( 'template-parts/content-archive', get_post_format() );
            ?>
                </div><!--end row-->
            </div><!--end medium-4-->
		<?php
		$count++;
        break;
    case 2:		?>
        	<div class="columns medium-8 archive-large">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
            </div>
            </div><!--end row 1-->
		<?php
		$count++;
        break;
    case 3:
		?>
        <div class="row"><!--start row 2-->
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
		<?php
		$count++;
        break;
    case 4:		?>
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
		<?php
		$count++;
		
		if( $count == count( $posts ) ) {
		?>
        	<div class="columns medium-4">
            </div>
		<?php	
		}
			
		
        break;
    case 5:		?>
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
        </div><!--End Row 2-->
		<?php
		$count++;
        break;
    case 6:		?>
    	<div class="row"><!--start row 3-->
        	<div class="columns medium-8 archive-large">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
            </div>
		<?php
		$count++;
        break;
    case 7:		?>
        	<div class="columns medium-4">
            	<div class="row columns">
                	
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        		</div><!--End Row-->
		<?php
		$count++;
        break;
    case 8:		?>
                <div class="row columns">
            <?php
                get_template_part( 'template-parts/content-archive', get_post_format() );
            ?>
                </div><!--end row-->
            </div><!--end medium-4-->
        </div><!--end row 3-->
		<?php
		$count++;
        break;
    case 9:
		?>
        <div class="row">
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
		<?php
		$count++;
        break;
    case 10:		?>
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
		<?php
		$count++;
        break;
    case 11:		?>
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
        </div><!--End Row-->
		<?php
		$count++;
        break;
}
								
				
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

			endwhile; ?>

            </div><!--end page-->
            <?php

		endif; ?>
</div><!--end lazyload-->
<div id="spinner">
	<i class="fa fa-circle-o-notch faa-spin animated" aria-hidden="true"></i>
</div>
<div id="category-content">
	<?php echo get_field('page_content', 'term_'.get_queried_object_id()); ?>
</div>
<script>
<!--Thanks to http://www.affariproject.com/ which this functionality is based-->
  jQuery(function(){
    var page = 2;
    var loadmore = 'on';
    jQuery(document).on('scroll resize', function() {
      if (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() -  (jQuery("#colophon").height() + jQuery(".entry-content").height() + 200)) {
        if (loadmore == 'on') {
          loadmore = 'off';
          jQuery('#spinner').stop(true, true).slideToggle();
          jQuery('#lazyload').append(jQuery('<div class="page" id="p' + page + '">').load('https://www.wa-rock.com<?php echo $_SERVER[REQUEST_URI] ?>?paged=' + page + ' .page > *', function() {
            page++;
            loadmore = 'on';
            jQuery('#spinner').stop(true, true).slideToggle();
          }));
        }
      }
    });
    jQuery( document ).ajaxComplete(function( event, xhr, options ) {
      if (xhr.responseText.indexOf('class="page"') == -1) {
        loadmore = 'off';
      }
    });
  });
</script>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
