<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */
$variations = get_field('variations');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="row entry-content" id="product">
        <div class="column">
            <div class="row">
                <div class="column medium-8">
                    <div class="slick product-slider">
                        <?php foreach ($variations as $variation): ?>
                            <img src="<?php echo $variation['image']['sizes']['large']; ?>" alt="<?php echo $variation['image']['alt']; ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="column medium-4">
                    <?php the_title('<h1 class="entry-title product-title">', '</h1>'); ?>
                    <div class="variations">
                        <?php foreach ($variations as $key=>$variation): ?>
                            <div class="variation">
                                <?php if($variation['product_number']): ?>
                                    <div class="inline-key-value">
                                        <span class="key">PRODUCT CODE: </span>
                                        <span class="value"><?php echo $variation['product_number']; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($variation['made_at']): ?>
                                    <div class="inline-key-value">
                                        <span class="key">MADE AT: </span>
                                        <span class="value"><?php echo $variation['made_at']; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($variation['price']): ?>
                                    <div class="key-value">
                                        <div class="key">$<?php echo $variation['price']; ?></div>
                                    </div>
                                <?php endif; ?>

                                <label class="product-variations-label"> Options
                                    <select name="variations" class="product-variations">
                                        <?php foreach($variations as $k=>$v): ?>
                                            <option value="<?php echo $k; ?>"><?php echo $v['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>

                                <a href="<?php echo site_url(); ?>/index.php/?p=16" class="blue-btn">GET A QUOTE</a>
                                <?php if($variation['gradation_report']): ?>
                                    <a class="green-btn" href="<?php echo $variation['gradation_report']['url']; ?>">GRADATION REPORT</a>
                                <?php endif; ?>

                                <?php if($variation['uses']): ?>
                                    <div class="uses key-value">
                                        <div class="key">USES</div>
                                        <div class="value">
                                            <?php echo $variation['uses']; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div><!--End Row-->
            <!-- latest products -->
            <div class="row row-padding">
                <div class="columns">
                    <?php
                    $category = get_the_terms($post->ID, 'product_category');
                    $category_id = $category[0]->term_id;
                    $post_id = get_the_ID();

                    // The Query
                    $args = array(
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_category',
                                'field' => 'term_id',
                                'terms' => array($category_id),
                            ),
                        ),
                        /*'category' => $category_id,*/
                        'post_type' => 'product',
                        'post__not_in' => array($post_id) //exclude post from related
                    );
                    $cat_query = new WP_Query($args);
                    // The Loop
                    if ($cat_query->have_posts()) { ?>
                        <h2>Related Products</h2> <?php
                        echo '<div class="row">';
                        while ($cat_query->have_posts()) {
                            $cat_query->the_post();

                            echo '<div class="columns medium-4">';
                            if (has_post_thumbnail()) {
                                ?>
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="background-title"
                                         style="background:url('<?php echo the_post_thumbnail_url(); ?>');">
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
<script src="<?php echo get_template_directory_uri() . '/js/slick-slider.js'; ?>"></script>