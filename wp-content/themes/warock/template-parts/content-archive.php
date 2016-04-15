<?php
/**
 * Template part for displaying archive posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
    <header class="entry-header">
        <a href="<?php echo get_permalink(); ?>">  
        <?php 
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>                      
        <div class="background-title" style="background: url(<?php echo $src[0]; ?> );">
        	<h2 class="entry-title"><span><?php echo get_the_title(); ?></span></h2>	
        </div><!--end background -->	
        </a>
    
	</header><!-- .entry-header -->
    </div><!-- end row -->
</article><!-- #post-## -->
