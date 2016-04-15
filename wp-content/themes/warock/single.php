<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package warock
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-single', get_post_format() );
?>
			<div class="row row-padding">
            <div class="column large-4 large-offset-4">
<?php
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'NEXT', 'warock' ) . ' &gt;</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'warock' ) . '</span> ',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">&lt; ' . __( 'PREVIOUS', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'warock' ) . '</span> ',
			) );
			?>
            
            </div>
            </div><!--End Row-->
            

            <?php

		endwhile; // End of the loop.
		?>
		</div><!--End Row-->			

			<?php
			?>
            <div class="row full-width comments-row">
        	<div class="row columns row-padding">
            <div class="columns">
            	<div class="share-this">
                    <span class='st_email_large' displayText='Email'></span>
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                </div>
            <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ){
				comments_template();
			}
			?>
            
            </div>
            </div>
            <?php
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "336c8463-bd61-4ca3-911e-be8aead2e32b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php
get_footer();
