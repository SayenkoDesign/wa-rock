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
    <header class="entry-header">
		<?php

				if ( has_post_thumbnail() ) {
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
                    
                        <div class="background-title" style="background: url(<?php echo $src[0]; ?> ) center center;">
						<div class="row  title-container">
							<div class="column medium-10 medium-offset-1 large-8 large-offset-2">
                            <div class="category-btn">
							<?php
							$category = get_the_category();
							if ($category) {
							  
							}
							?>
                            </div>
							<?php the_title( '<h2 class="entry-title"><a class="btn cat-btn" href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a><br><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
                            </div>
                        </div><!--End row -->


                
                        <div class="row column entry-meta">
                            <div class="row column entry-meta-date"><?php echo get_the_date(); ?></div>
            				<div class="row column entry-meta-author"><?php echo do_shortcode( '[avatar]' ); ?>
                            </div>
                        </div>


                        </div><!--End row -->
                    <?php 
				} 
				else{
					?>
                <div class="row">
				<div class="column medium-10 medium-offset-1 large-8 large-offset-2">
				<?php
					the_title( '<h1 class="entry-title title-text-only">', '</h1>' );
				?>
                </div></div><!--End Row-->
                <?php
				}

 ?>
     <div class="row column">
    <?php

        if ( 'post' === get_post_type() && has_post_thumbnail() ) : ?>

        <div class="row column entry-meta">
            <div class="row column entry-meta-byline"><?php echo 'by ' . get_the_author(); ?></div>
        </div><!-- row .entry-meta -->
        <?php
        endif;
?>
    
	</header><!-- .entry-header -->
    </div><!-- end row -->

	<div class="row entry-content">
		<div class="column medium-10 medium-offset-1 large-8 large-offset-2">
			<?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( '...Continued', 'warock' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
    
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'warock' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!--End Column-->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php warock_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
