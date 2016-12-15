<?php
/*
Template Name: Portfolio page template
*/

get_header(); ?>
    <div class="row">
        <div class="span8">
            <h1><?php echo get_the_title(); ?></h1>
            <?php echo do_shortcode("[huge_it_portfolio id='1']"); ?>
        </div>
        <div class="span4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div> <!-- container -->
    <?php get_footer(); ?>