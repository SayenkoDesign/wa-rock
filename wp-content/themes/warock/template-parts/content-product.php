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
                    <?php the_title('<h1 class="entry-title product-title hide-for-medium">', '</h1>'); ?>
                    <?php if(count($variations) > 1): ?>
                        <label class="product-variations-label hide-for-medium"> Choose a Type
                            <select name="variations" class="product-variations">
                                <?php foreach($variations as $k=>$v): ?>
                                    <option value="<?php echo $k; ?>"><?php echo $v['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    <?php endif; ?>
                    <div class="prices hide-for-medium">
                        <?php foreach ($variations as $key=>$variation): ?>
                            <div class="price">
                                <?php if($variation['price']): ?>
                                    <div class="key-value">
                                        <div class="key">$<?php echo $variation['price']; ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slick product-slider">
                        <?php foreach ($variations as $variation): ?>
                            <img src="<?php echo $variation['image']['sizes']['large']; ?>" alt="<?php echo $variation['image']['alt']; ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="column medium-4">
                    <?php the_title('<h1 class="entry-title product-title hide-for-small-only">', '</h1>'); ?>
                    <div class="variations">
                        <?php foreach ($variations as $key=>$variation): ?>
                            <div class="variation">
                                <?php if(count($variations) > 1): ?>
                                    <label class="product-variations-label hide-for-small-only"> Choose a Type
                                        <select name="variations" class="product-variations">
                                            <?php foreach($variations as $k=>$v): ?>
                                                <option value="<?php echo $k; ?>"><?php echo $v['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                <?php endif; ?>

                                <?php if($variation['price']): ?>
                                    <div class="key-value hide-for-small-only">
                                        <div class="key">$<?php echo $variation['price']; ?></div>
                                    </div>
                                <?php endif; ?>

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

                                <a href="<?php echo site_url(); ?>/index.php/?p=16" class="blue-btn">GET A QUOTE</a>
                                <?php if($variation['gradation_report']): ?>
                                    <a class="green-btn" href="<?php echo $variation['gradation_report']['url']; ?>">GRADATION REPORT</a>
                                <?php endif; ?>

                                <?php if($variation['uses']): ?>
                                    <ul class="tabs" data-tabs id="product-tabs">
                                        <?php if ($variation['uses']): ?>
                                            <li class="tabs-title is-active"><a href="#panel-uses-<?php echo $key; ?>" aria-selected="true">Info</a></li>
                                        <?php endif; ?>
                                        <?php if ($variation['pricing']): ?>
                                            <li class="tabs-title"><a href="#panel-pricing-<?php echo $key; ?>">Pricing</a></li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="tabs-content" data-tabs-content="product-tabs">
                                        <?php if ($variation['uses']): ?>
                                            <div class="tabs-panel is-active" id="panel-uses-<?php echo $key; ?>">
                                                <div class="uses key-value">
                                                    <div class="value">
                                                        <?php echo $variation['uses']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($variation['pricing']): ?>
                                            <div class="tabs-panel" id="panel-pricing-<?php echo $key; ?>">
                                                <div class="uses key-value">
                                                    <div class="value">
                                                        <?php echo $variation['pricing']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
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
                        $count = 0;
                        while ($cat_query->have_posts()) {
                            $cat_query->the_post();

                            echo '<div class="columns medium-4">';
                            if (has_post_thumbnail()) {
                                ?>
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="background-title"
                                         style="background:url('<?php echo the_post_thumbnail_url(); ?>');">
                                        <div calss="row column title-container">
                                            <h2 class="entry-title"><span><?php echo get_the_title(); ?></span></h2>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                $count++;
                            }
                            echo '</div>';
                        }
                        if($count==2){
                            echo '<div class="columns medium-4">';
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