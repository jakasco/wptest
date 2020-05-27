<?php /* Template Name: Products Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">


                  </h1>TUOTTEET </h1>
                  <?php
                  $this_category = get_term_by( 'slug', 'ad');//get_category("tuotteet");
                      //echo $this_category->cat_ID;
                      $parent_term_id =$this_category->cat_ID; // term id of parent term

                  //$termchildren = get_terms('category',array('child_of' => $parent_id));
                  $taxonomies = array(
                      'taxonomy' => 'category'
                  );

                  $args = array(
                     // 'parent'         => $parent_term_id,
                       'child_of'      => $parent_term_id
                  );

                  $terms = get_terms($taxonomies, $args);
                  if (sizeof($terms)>0)
                  {

                  echo ' <div class="categories">  ';
                  echo '<p> Sub Categories of '. get_cat_name( $parent_term_id ) .'</p>';

  $count = 0;
                  foreach ( $terms as $term ) {
echo '<ul>';
              /*       $term_link = sprintf( '<div class="custom-cats"><a href="%1$s" alt="%2$s">%3$s</a></div>',
                     esc_url(
                        get_category_link( $term->term_id ) ),
                          esc_attr( sprintf( 'View all posts in %s', 'textdomain' ), $term->name ),
                          esc_html( $term->name ));

                      echo sprintf( $term_link );
                    }*/


                  $count++;
                  if ($count <= 3) { //näytä 3 alakategoriaa
                    echo    '<h3>count of posts : '. $term->count . " / "  . $term->name . '</h3>';

                    global $post2;

                    $args4 = array( 'numberposts' => 10, 'category_name' => $term->slug );
                    $posts2 = get_posts( $args4 );


                    foreach( $posts2 as $post ): setup_postdata($post);
                    $title = the_title();
echo "<li>count: " . $args4['category_name'] . "</li>";
echo '</ul>'
?>

<?php

                    endforeach;
                //       echo $args2['category_name'];
                    } //if count



}//foreach

                  echo '</div><!-- categories div end-->';
                      }
                   ?>

                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
