

<?php get_header(); ?>
<?php the_post();?>

<?php $image = get_post_meta($post->ID, 'background_image', true); ?>
<?php $secondimage = get_post_meta($post->ID, 'second_background_image', true); ?>
<?php $text = get_post_meta($post->ID, 'overlay_text', true); ?>
<?php $secondtext = get_post_meta($post->ID, 'second_overlay_text', true); ?>
    <div class="parallax">
        <div id="group1" class="parallax__group">
            <div class="parallax__layer parallax__layer--base" >
                <div class="title"><?php echo($text); ?></div>
            </div>
            <div class="parallax__layer parallax__layer--back" style="background-image: url(<?php echo wp_get_attachment_url($image); ?>);"> </div>
        </div>
        <div id="group2" class="parallax__group">
            <div class="parallax__layer parallax__layer--fore">
                <div class="title"><?php echo($secondtext); ?></div>
            </div>
            <div class="parallax__layer parallax__layer--base" style="background-image: url(<?php echo wp_get_attachment_url($secondimage); ?>);"> </div>
        </div>
        <div class="front-page-footer">
            <div class="left">
                <h1>Left</h1> </div>
            <div class="right">
                <h1>Right</h1> </div>
        </div>
    </div>