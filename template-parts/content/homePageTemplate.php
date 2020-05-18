<?php /* Template Name: Home Page */ ?>

<?php get_header(); ?>
<div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post();
                                                // Include the page content template.
                                                get_template_part( 'template-parts/content', 'home page' );
                                                // If comments are open or we have at least one comment, load up the comment template.
                                                if ( comments_open() || get_comments_number() ) {
                                                                comments_template();
                                                }
                                                ?>
                                                <!-- Gridi posteista -->
                                                 <div class="mainContainer">
                                                  <div class="grid-container">

                                                    <?php if (have_posts()):?>
                                                    <?php $count = 0; ?>
                                                    <?php	while(have_posts()):
                                                      the_post();
                                                        $count ++;
                                                        if($count <= 9) //saadaan 3x3 ruudukko
                                                                { //  echo 'Number of post is '.($count++);
                                                                 ?>
                                                                        <div class="grid-item">
                                                                          <?php the_title(); ?>
                                                                                <div class="exp">
                                                                                  <?php  the_content();  ?>
                                                                                </div>
                                                                         </div>
                                                            <?php } //if
                                                            else{
                                                            //
                                                            }
                                                            endwhile;
                                                         endif; ?>
                                                  </div>
                                                </div>
                                                <!-- Gridi posteista loppuu -->
                                                <?php
                                                // End of the loop.
                                endwhile;
                                ?>
                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>
