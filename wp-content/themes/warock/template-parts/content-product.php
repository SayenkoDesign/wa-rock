<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row entry-content">
		<div class="column">
        	<div class="row">
            <div class="column medium-8">
            	<?php
				$images = get_field('slider');

				if( $images ): ?>
					<div class="slick">
						<?php foreach( $images as $image ): ?>
									 <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endforeach; ?>
					 </div>
				<?php 
				
				elseif ( has_post_thumbnail() ) : 
					the_post_thumbnail();
				
				endif;

				
				?>
            </div>
            <div class="column medium-4">
			<?php
            	the_title( '<h1 class="entry-title">', '</h1>' );
			 	if( get_field('product_number') ){ 
					$product_number_field = "product_number";
					$product_number = get_field_object($product_number_field);
					echo '<h2>'.$product_number['value'].'</h2>';
				}					
				if( get_field('made_at') ){ 
					$made_at = "made_at";
					$made_at = get_field_object($made_at);
					echo '<span class="made-at">' .$made_at['label'] . ':</span> ' . $made_at['value'] . '<br>';	
				}
				
				echo '<a href="'. site_url() .'/index.php/?p=16" class="blue-btn">GET A QUOTE</a>';
				if( get_field('gradation_report') ){ 
					$gradation_report_field = "gradation_report";
					$gradation_report = get_field_object($gradation_report_field); ?>
					<a class="green-btn" href="<?php echo $gradation_report['url']; ?>">GRADATION REPORT</a>
                    <?php
				}
				
				$uses_field = "uses";
				$uses = get_field_object($uses_field);
				echo '<div class="uses">' . '<h3>'.$uses['label'].'</h3>';
				echo the_field('uses') . '</div>';
				
    
            ?>
            </div>
            </div><!--End Row-->
	<!-- latest products -->
    <div class="row row-padding">
    	<div class="columns">
		<?php
		$category = get_the_terms( $post->ID, 'product_category' );
		$category_id = $category[0]->term_id;
		$post_id = get_the_ID ();
		
		// The Query
		$args = array( 
			'posts_per_page' => 3,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_category',
					'field'    => 'term_id',
					'terms'    => array( $category_id ),
				),
			),
			/*'category' => $category_id,*/
  			'post_type' => 'product',
			'post__not_in' => array($post_id) //exclude post from related
		);
		$cat_query = new WP_Query( $args );
		// The Loop
		if ( $cat_query->have_posts() ) { ?>
        <h2>Related Products</h2> <?php
			echo '<div class="row">';
			while ( $cat_query->have_posts() ) {
				$cat_query->the_post();

				echo '<div class="columns medium-4">';
				if ( has_post_thumbnail() ) {
					?>
                    <a href="<?php echo get_permalink(); ?>">
                    <div class="background-title" style="background:url('<?php echo the_post_thumbnail_url(); ?>');">				
                    	<div calss="row column title-container">
                        	<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>
                    </a>
					<?php
				} 
				echo '</div>';
			}
			echo '</div>';
			?>
            <div class="row columns">
            	<?php //echo get_the_category_list( ); ?> 
            </div>
            
            <?php
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata(); ?>
		</div><!--end columns-->
    </div><!--end row-->
            
        </div><!--End Column-->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php warock_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<script src="<?php echo get_template_directory_uri () . '/js/slick-slider.js'; ?>"></script>