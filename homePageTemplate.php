<?php /* Template Name: Home Page */ ?>

<?php get_header(); ?>
<div id="primary" class="content-area">
  <h1>Home page</h1>

                <main id="main" class="site-main" role="main">

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
                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
