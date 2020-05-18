<?php get_header(); ?>
<div id="primary" class="content-area">
</h1> 1 PAGE.PHP </h1>
                <main id="main" class="site-main" role="main">
                </h1> 2 PAGE.PHP </h1>
                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post();
                                                // Include the page content template.
                                                get_template_part( 'template-parts', 'content' );
                                endwhile;
                                ?>
                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
