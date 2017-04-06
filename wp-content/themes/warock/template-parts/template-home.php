<?php
/**
 * Template Name: Homepage
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

get_header(); ?>

<?php putRevSlider("home-slider") ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<div class="row">
    <div class="columns medium-6">
        <h4>OUR<br><strong>PRODUCTS</strong></h4>
    </div>
    <div class="columns medium-6">
        <a class="btn green-btn alignright" href="<?php the_field('view_products'); ?>">VIEW PRODUCTS</a>
    </div>
</div>
<div class="row">			
<?php 

	if( get_field('home_blurb') ){ 
		$home_blurb_field = "home_blurb";
		$home_blurb = get_field_object($home_blurb_field);
		echo $home_blurb['value'];
	}		
				
	
?>
</div>
<div class="row row-padding gallery-row">
<?php
	
	if( have_rows('gallery') ){
		$count=0;
		while ( have_rows('gallery') ) { the_row();
			//$pages_query->the_post();
	switch ($count%7) {
    case 0:		?>
        <div class="row">
        	<div class="columns medium-4">
            	<div class="row columns">
                	<a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
					</div></a>
                 </div>
		<?php
		$count++;
        break;
	case 1: ?>
                <div class="row columns">
                	<a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
					</div></a>
                </div>
            </div>
        <?php
		$count++;
		break;
	case 2: ?>
	
            <div class="columns medium-8 archive-large">
                <a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
                </div></a>
            </div>
        </div>
        <?php
		$count++;
		break;
	case 3: ?>
    	<div class="row">
        	<div class="columns medium-4">
                <a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
                </div></a>
            </div>
        
		<?php
		$count++;
		break;
	case 4: ?>
        	<div class="columns medium-4">
                <a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
                </div></a>
            </div>
         <?php
		$count++;
		break;
	case 5: ?>
        	<div class="columns medium-4">
                <a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
                </div></a>
            </div>
         </div>
         <?php
		$count++;
		break;
	case 6: ?>
    	<div class="row">
        	<div class="columns archive-short">
                <a href="<?php the_sub_field('url'); ?>"><div class="background-title" style="background: url('<?php the_sub_field('image'); ?>');"><h2 class="entry-title"><span><?php the_sub_field('title'); ?></span></h2>
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

</div>

	<div class="row expanded" style="background:url('<?php echo get_template_directory_uri () . '/images/calc-left-bg.png'; ?>') repeat-y #a4b4b4;"  data-equalizer  data-equalize-on="medium">
 		<div class="large-12 columns">
        <div class="row">
    	<div class="columns medium-6 col-calc-instructions" data-equalizer-watch>
        	<h4>Calculator<br><strong>Instructions</strong></h4>
        	<?php echo the_field('calculator_instructions_description'); ?>
        </div>
        <div id="calc" class="columns medium-6 col-calc" data-equalizer-watch>
        	<div class="row">
        	<div class="columns medium-2">
            	<span class="icon"><img src="<?php echo get_template_directory_uri () . '/images/calculator.png'; ?>"></span>
            </div>
            <div class="columns medium-10 calc-title">
            	<h4>Project<br>
            	<strong>Calculator</strong></h4>
            </div>
            </div><!--End Row-->
		  <div  id="calculator">

			<div class="row column">
            	<div class="column">
            	<label for="lengtha">Length:</label>
                </div>
            </div>
			<div class="row">
            <div class="column small-12"><input type="text" pattern="\d*" id="lengtha" tabindex="2" maxlength="8" size="5" name="lengtha" placeholder="ENTER FT.">
            </div>
            <input type="hidden" value="0" pattern="\d*" id="lengthinches"   tabindex="3" maxlength="3" size="5" name="lengthinches" placeholder="ENTER IN.">
            </div><!--End Row-->
            <div class="row ">
            	<div class="column">
            	<label for="widtha">Width:</label>
                </div>
            </div>
            <div class="row">
            <div class="column small-12"><input type="text" pattern="\d*" id="widtha" tabindex="3" maxlength="8" size="5" name="widtha" placeholder="ENTER FT.">
            </div>
            <input type="hidden" value="0" pattern="\d*" class="inches" id="widthinches"  tabindex="3" maxlength="3" size="5" name="widthinches" placeholder="ENTER IN.">
            </div><!--End Row-->
            
            <div class="row">
            	<div class="column">
            	<label for="deptha">Depth:</label> 
            	</div>
            </div>
            <div class="row">
            <div class="column">
            <input type="text" pattern="\d*" id="deptha" tabindex="3" maxlength="8" size="5" name="deptha" placeholder="ENTER IN.">
            </div>
            </div><!--End Row-->
            
            <div class="row">
            	<div class="column">
                  <input id="calculate" disabled="" tabindex="4" type="submit" value="Calculate" name="calculate" />
                  <input class="calc_button" id="clear-calc" disabled="" tabindex="5" type="button" value="Clear" name="clear-calc">
                </div>
              </div>
            <div class="row">
            	<div class="column">
                    <div id="results"></div>
                    <div id="calc-error"></div>
                </div>
            </div><!--End Row-->
        </div>
        </div><!--End calculator-->
        </div><!--End row-->
        </div><!--End large-12-->
    </div><!--End Row-->
<div class="row-quote">
    <div class="row">
        <div class="column">
            <h3><?php echo the_field('quote_title'); ?></h3>
            <a class="btn btn-white alignright" href="<?php echo the_field('quote_button'); ?>">GET A QUOTE</a>
        </div>
    </div>
</div>
<div class="row row-padding">
	<div class="row columns">
    <div class="columns">
        	<h4>WHY<br><strong>CHOOSE US</strong></h4>
    </div>
    </div>
    <div class="row columns">
    	<div class="column medium-4">
        	<h5><?php echo the_field('consistent_quality'); ?></h5>
            <p><?php echo the_field('cq_description'); ?></p>
        </div>
    	<div class="column medium-4">
        	<h5><?php echo the_field('great_service'); ?></h5>
            <p><?php echo the_field('gs_description'); ?></p>
        </div>
    	<div class="column medium-4">
        	<h5><?php echo the_field('fair_prices'); ?></h5>
            <p><?php echo the_field('fp_description'); ?></p>
        </div>
    </div>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
