<?php
get_header(); ?>

<div class="content-row">
  <script>
    const grid = document.querySelector(".grid-container");

    function test(variable) {
      console.log("count: ", variable);
      if (variable >= 9) {
        const main = document.querySelector(".mainContainer");
        grid.className = "grid-container";
        grid.style.backgroundColor = "blue";
        main.appendChild(grid);
      }

    }
  </script>

  <main id="main" class="site-main" role="main">

    <div id="otaYhteyttaOtsikko" style="">
      <div style="display: table-cell; vertical-align: middle;">
        <div>
          Blogi Postaukset:
        </div>
      </div>
    </div>

    <div class="mainContainer">
      <div class="grid-container">
        <?php
        $args = array(
          'post_type' => 'post',
          'orderby'    => 'ID',
          'post_status' => 'publish',
          'order'    => 'DESC',
          'posts_per_page' => -1 // this will retrive all the post that is published
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) : $count = 0; ?>

          <?php while ($result->have_posts()) : $result->the_post(); ?>
            <script>
              function ifElseReturn(string, stringUusi, eka, ehto, stringUusi) {
                if (eka == ehto) {
                  string = stringUusi;
                  return stringUusi;
                } else {
                  return string;
                }
              }

              //luodaan HTML-lähdekoodi anneteuista parametreistä
              function createGridItem(link, title, imagelink, count) {

                let imgHTML = "";
                let showMore = "";

                if (imagelink == "") {
                  alert("imagelink error");
                  imgHTML = `<p>Ei esikatselua...</p>`;
                } else {
                  imgHTML = `<img class="tuotteetImg" src="` + imagelink + `" width="100%" height="100%">`;
                }

                let sourceCode = `<div class="grid-item">
              <a target="_blank" rel="noopener noreferrer" class="titleLinkki"
               href="` + link + `">` + title + `
               </a>
               <div class="blogi-thumbnail-div">
               ` +
                 imgHTML + //lisätään kuva, jos ei ole, niin teksti ei esikatselua
                  `
              </div>
              <div class="exp">
              <a class="lueLisaa" target="_blank" rel="noopener noreferrer" "` + link + `">
              Lue lisää...
              </a>
              </div>
              </div>
              </div>` +
                  showMore;

                return sourceCode;
              }
              //

              <?php
              global $post;
              $attch_id = get_post_thumbnail_id($post->ID);
              $url = wp_get_attachment_image_src($attch_id);
              echo $url;
              ?>

              <?php $id = get_the_ID(); ?>

              let linkki<?php echo $count ?> = "<?php echo get_permalink() ?>";
              let title<?php echo $count ?> = "<?php echo the_title() ?>";
              let boolean<?php echo $count ?> = true;

              let imagelink<?php echo $count ?> = "<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()->ID), 'single-post-thumbnail')[0]; ?>";

              <?php $thumnail = wp_get_attachment_image_src(get_post_thumbnail_id($id->ID), 'single-post-thumbnail');

              $first_value = reset($thumnail);
              echo $first_value;
              ?>
              imagelink<?php echo $count ?> = <?php $first_value; ?>;
              //console.log(linkki<?php // echo $count 
                                  ?> +","+","+title<?php // echo $count 
                                                                        ?> +","+imagelink<?php  // echo $count 
                                                                                                              ?>);
              console.log("ERROR ", "<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()->ID), 'single-post-thumbnail')[0]; ?>");
              console.log("Esikuva katselut löytyy: " + <?php echo $count ?>);
              let html<?php echo $count ?> = createGridItem(
                linkki<?php echo $count ?>,
                title<?php echo $count ?>,
                imagelink<?php echo $count ?>,
                <?php echo $count ?>
              );


              if (imagelink<?php echo $count ?> !== "") {
                let newElem<?php echo $count ?> = document.createElement("div");
                newElem<?php echo $count ?>.innerHTML = html<?php echo $count ?>;
                newElem<?php echo $count ?>.className = "grid-container";
                document.querySelector(".grid-container").appendChild(newElem<?php echo $count ?>);
              } else {
                alert("Error");
              }
            </script>
            <?php
            $count++;
            ?>
          <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata(); ?>
      </div>

  </main><!-- .site-main -->

  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area")) : ?>
  <?php endif; ?>
</div>

<?php
get_footer();
?>