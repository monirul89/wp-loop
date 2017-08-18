
<!--------------------------------Start of Blog post loop------------------------------------------->
<?php if (have_posts()) : ?>     
    <?php while (have_posts()):the_post() ?>

        <div class="col-sm-12">
            <?php get_template_part('template-parts/content', get_post_format()); ?>
        </div>

    <?php endwhile; ?>
<?php else: ?>

    <?php get_template_part('template-parts/content', 'none'); ?>

<?php endif; ?>

<!---------------------------------------End of Blog post loop--------------------------------------->


<!---------------------------------------Start of Blog post pagination-------------------------------->
<?php
the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => __('Previous page', 'morderna'),
    'next_text' => __('Next page', 'morderna'),
));
?>
<!---------------------------------------End of Blog post pagination--------------------------------->


<!---------------------------------------Start of page post pagination------------------------------->

<?php
while (have_posts()) : the_post();
    // Include the page content template.
    get_template_part('template-parts/content', 'page');

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
        //comments_template();
    }

// End of the loop.
endwhile;?>
<!---------------------------------------End of page post pagination--------------------------------->


<!---------------------------------------Custom post Query------------------------------------------->

<?php
    $args = array(
        'post_type' => 'slide',
        'posts_per_page' => 10
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        ?>

        <li>
            <?php the_post_thumbnail('morderna-slider'); ?>
            <div class="flex-caption">
                <h3><?php the_title(); ?></h3> 
                <p><?php the_excerpt(); ?></p> 
                <a href="<?php echo '#'; ?>" class="btn btn-theme">Learn More</a>
            </div>
        </li>

    <?php endwhile; ?>
<!---------------------------------------End of Custom post Query------------------------------------------->