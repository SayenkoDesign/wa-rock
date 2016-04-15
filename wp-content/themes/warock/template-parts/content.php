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
	<div class="row">
    <header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} 
			else {
				if ( has_post_thumbnail() ) {
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
                    
                        <div class="background-title" style="background: url(<?php echo $src[0]; ?> );">
						<div class="row column title-container">
							<div class="row column"><?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
                            </div>
                        </div><!--End row -->

						<?php
                        if ( 'post' === get_post_type() ) : ?>
                
                        <div class="row column entry-meta">
                            <div class="row column entry-meta-date"><?php echo get_the_date(); ?></div>
            				<div class="row column entry-meta-author"><?php echo get_avatar(); ?></div>
                        </div>
                        <?php
                        endif;
                        ?>

                        </div><!--End row -->
                    <?php 
				} 
				else{ ?>
                	<div class="row column title-container">
							<div class="row column">
                    <?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </div>
                    <?php
							if ( 'post' === get_post_type() ) : ?>
                            <div class="row column entry-meta">
                                <div class="row column entry-meta-date"><?php echo get_the_date(); ?></div>
                            </div>
                            <?php
                            endif;
							?>
                    </div><!--End Row-->
                    <?php
				}
			}

 ?>
     <div class="row column">
    <?php

        if ( 'post' === get_post_type() ) : ?>

        <div class="row column entry-meta">
            <div class="row column entry-meta-byline"><?php echo 'by ' . get_the_author(); ?></div>
        </div><!-- row .entry-meta -->
        <?php
        endif;
?>
    </div>
    
	</header><!-- .entry-header -->
    </div><!-- end row -->

	<div class="row entry-content">
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
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php warock_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
