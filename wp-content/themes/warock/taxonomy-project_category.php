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
	<div class="row column">
    	<div class="column show-for-medium">
			<?php wp_nav_menu( array( 
            'menu' => 'projects',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>'
            ) ); 
			?>
    	</div>
        <div class="column hide-for-medium">
        	<?php wp_nav_menu( array( 
            'menu' => 'projects',
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
            'post_type' => 'project',
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
    case 0:		?>
        <div class="row">
        	<div class="columns medium-4">
            	<div class="row columns">
                	
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        		</div><!--End Row-->
		<?php
		$count++;
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
            </div><!--end row-->
		<?php
		$count++;
        break;
    case 3:
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
    case 4:		?>
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
		<?php
		$count++;
        break;
    case 5:		?>
        	<div class="columns medium-4">
		<?php
			get_template_part( 'template-parts/content-archive', get_post_format() );
		?>
        	</div>
        </div><!--End Row-->
		<?php
		$count++;
        break;
    case 6:		?>
    	<div class="row">
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
        </div>
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
						
			endwhile;

		endif; ?>
<div id="spinner">
	<i class="fa fa-circle-o-notch faa-spin animated" aria-hidden="true"></i>
</div>
<script>
<!--Thanks to http://www.affariproject.com/ which this functionality is based-->
  jQuery(function(){
    var page = 2;
    var loadmore = 'on';
    jQuery(document).on('scroll resize', function() {
      if (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() -  jQuery("#colophon").height()) {
        if (loadmore == 'on') {
          loadmore = 'off';
          jQuery('#spinner').css('visibility', 'visible'); jQuery('#lazyload').append(jQuery('<div class="page" id="p' + page + '">').load('<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER[REQUEST_URI] ?>?paged=' + page + ' .page > *', function() {
            page++;
            loadmore = 'on';
            jQuery('#spinner').css('visibility', 'hidden');
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
</div><!--end lazy load-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
