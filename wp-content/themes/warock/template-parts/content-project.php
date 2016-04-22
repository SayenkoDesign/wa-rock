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
			 	if( get_field('made_at') ){ 
					$made_at_field = "made_at";
					$made_at = get_field_object($made_at_field);
					echo '<h2>'.$made_at['value'].'</h2>';
				}	
				
				if(get_field('date_range')){
					$date_field = "date_range";
					$date = get_field_object($date_field);
					echo $date['label'].': <span class="date-range">' . $date['value'] . '</span><br>';	
				}
				
				echo '<a href="'. site_url() .'/index.php/?p=16" class="blue-btn">GET A QUOTE</a>';
				
				$description_field = "description";
				$description = get_field_object($description_field);
				echo '<h3>'.$description['label'].'</h3>';
				the_field('description');
				
				$materials_field = "materials";
				$materials = get_field_object($materials_field);
				echo '<h3>'.$materials['label'].'</h3>';
				the_field('materials');
				
				
			 	if( get_field('highlights') ){ 
					$highlight_field = "highlights";
					$highlights = get_field_object($highlight_field);
					echo '<h3>'.$highlights['label'].'</h3>';
					echo $highlights['value'];
				}
    
            ?>
            </div>
            </div><!--End Row-->

<!-- latest projects -->
    <div class="row row-padding">
    	<div class="columns">
		<?php
		$category = get_the_terms( $post->ID, 'project_category' );
		$category_id = $category[0]->term_id;
		$post_id = get_the_ID ();
		
		// The Query
		$args = array( 
			'posts_per_page' => 3, 
			'category' => $category_id,
  			'post_type' => 'project',
			'post__not_in' => array($post_id) //exclude post from related
		);
		$cat_query = new WP_Query( $args );
		// The Loop
		if ( $cat_query->have_posts() ) {
			?>
        <h2>Related Projects</h2> <?php 
			echo '<div class="row">';
			while ( $cat_query->have_posts() ) {
				$cat_query->the_post();

				echo '<div class="columns medium-4">';
				if ( has_post_thumbnail() ) {
					?>
                    
                    <div class="background-title" style="background:url('<?php echo the_post_thumbnail_url(); ?>');">				
                    	<div calss="row column title-container">
                        	<h2 class="entry-title"><span><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></span></h2>
                        </div>
                    </div>
                    
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
        </div><!--End Row-->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php warock_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<script src="<?php echo get_template_directory_uri () . '/js/slick-slider.js'; ?>"></script>
