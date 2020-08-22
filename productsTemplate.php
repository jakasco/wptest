<?php /* Template Name: Products Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

  <main id="main" class="site-main" role="main">

    <div id="otaYhteyttaOtsikko" style="">
      <div style="display: table-cell; vertical-align: middle;">
        <div>
          Tuotteet:
        </div>
      </div>
    </div>

    <?php
    //Valitaan vain postaukset tuotteet kategoriasta
    $this_category = get_term_by('slug', 'tuotteet'); 
    $parent_term_id = $this_category->cat_ID; 
    $taxonomies = array(
      'taxonomy' => 'category'
    );

    //Valitaan child-kategoriat tuotteista
    $args = array(
      'child_of'      => $parent_term_id
    );

    $terms = get_terms($taxonomies, $args);
    if (sizeof($terms) > 0) {
    ?>
      <div class="categories">
        <?php
        $countInt = 0;
        foreach ($terms as $term) {
          $countInt++;
          if ($countInt <= 4 && $countInt > 1) { //näytä 3 alakategoriaa
        ?>

            <div class="tuotteetSivunGrid">
              <?php
              global $post2;

              $args4 = array('numberposts' => 10, 'category_name' => $term->slug);
              $posts2 = get_posts($args4);
              echo    '<h3 id="tuoteryhmanNimi">' . $term->name . '</h3>';
              echo '<h5 style="padding-left: 15%;">Tuotteita yhteensä: ' . $term->count . " </h5>";
              foreach ($posts2 as $post) : //setup_postdata($post);
                //    $title = the_title();
              ?>

                <ul style="background-color: #cecece;">

                  <li style='padding-top: 10%; padding-bottom: 5px;border-bottom: solid 0.5px;'>
                    <div id="tuoteNimi"> <?php echo the_title() ?></div>

                    <?php
                    if (has_post_thumbnail($post->ID)) { ?>
                      <?php $image = wp_get_attachment_image_src(
                        get_post_thumbnail_id($post->ID),
                        'single-post-thumbnail'
                      ); ?>

                      <div id="custom-bg">
                        <img class="tuotteetImg" src='<?php echo $image[0]; ?>' width="100%" height="100%">;
                      </div>

                    <?php } else {
                    ?>

                   <!--   <div id="custom-bg">
                        MUUTA KUVAN URL
                        <img class="tuotteetImg" src='http://localhost/wp/wp-content/uploads/2019/01/IMG_0058-1.jpg' width="100%" height="100%">
                      </div>  -->
                    <?php
                    };

                    echo "<div style=''>";
                    $excerpt = strip_tags($post->post_content);
                    if (strlen($excerpt) > 100) {
                      $excerpt = substr($excerpt, 0, 100);
                      $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                      $excerpt .= '...';
                    }
                    ?>

                    <p class="excerpt"><?php echo $excerpt ?></p>

                  <?php

                  echo  "<div class='exp'>"; //. the_excerpt();
                  echo "<a class='lueLisaaTuote' href='" . get_permalink() . "'> Lue lisää... </a>";
                  echo "</div>";
                  echo "</div>";
                  "</li>";
                  echo '</ul>';
                endforeach;
                  ?>

            <?php

          } //if count
          echo "</div>";
        } //foreach
        echo '</div><!-- categories div end-->';
      }
            ?>

  </main><!-- .site-main -->

  <?php get_sidebar('content-bottom'); ?>
  
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>