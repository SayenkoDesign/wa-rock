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
        <?php
	
	if( have_rows('gallery', 2) ){
		$count=0;
		while ( have_rows('gallery', 2) ) { the_row();
			//$pages_query->the_post();
	switch ($count%7) {
    case 0:		?>
        <div class="row">
        	<div class="columns medium-4">
            	<div class="row columns">
                	<a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
					</div></a>
                 </div>
		<?php
		$count++;
        break;
	case 1: ?>
                <div class="row columns">
                	<a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
					</div></a>
                </div>
            </div>
        <?php
		$count++;
		break;
	case 2: ?>
	
            <div class="columns medium-8 archive-large">
                <a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
                </div></a>
            </div>
        </div>
        <?php
		$count++;
		break;
	case 3: ?>
    	<div class="row">
        	<div class="columns medium-4">
                <a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
                </div></a>
            </div>
        
		<?php
		$count++;
		break;
	case 4: ?>
        	<div class="columns medium-4">
                <a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
                </div></a>
            </div>
         <?php
		$count++;
		break;
	case 5: ?>
        	<div class="columns medium-4">
                <a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
                </div></a>
            </div>
         </div>
         <?php
		$count++;
		break;
	case 6: ?>
    	<div class="row">
        	<div class="columns archive-short">
                <a href="<?php the_sub_field('url', 2); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image', 2); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title', 2); ?><span></h2>
                </div></a>
            </div>
         </div>
         <?php
		$count++;
		break;
}
			}
			?>
            <div class="row columns">
            	<?php //echo get_the_category_list( ); ?> 
            </div>
            
            <?php
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
