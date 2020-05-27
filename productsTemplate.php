<?php /* Template Name: Products Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">
                </h1>Tuotteet</h1>

                <?php
$category_query_args = array(
    'tuotteet' => $tuotteet
);
//echo implode(" ",$category_query_args);
$category_query = new WP_Query( $category_query_args );

 if ($category_query->have_posts()):?>

 <?php
            global $post;
            $args = array( 'category' => 'tuotteet' );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ) :  setup_postdata($post); ?>
              <div><h3><?php echo the_title(); ?></h3>
                <li class="testimonial"><?php the_content(); ?></li><br/>
              </div>
            <?php endforeach;

 endif;
             ?>
        </ul>

                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
