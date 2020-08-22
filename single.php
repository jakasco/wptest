<?php
get_header(); ?>

<div class="content-row">

    <?php
    get_sidebar();
    ?>

    <main>

        <div class="postaus">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    
                    <h2 class="postausTitle"> <?php the_title(); ?></h2>

                    <?php
                    //postauksen kuva
                    if (has_post_thumbnail()) {
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                    }
                    ?>

                    <div class="imageOfPost">
                        <img width="100%" height="100%" src="<?php echo $large_image_url[0]; ?>">
                    </div>

                    <div class="contentOfPostaus">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <h2>Kommentit:</h2>

        <?php
        if (comments_open()) {
            comments_template();
        }
        ?>

    </main>
    <!-- laita widget alempana -->
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area")) : ?>
    <?php endif; ?>
    <?php get_sidebar('content-bottom'); ?>
</div>

<?php get_sidebar(); ?>
<?php
get_footer();
?>