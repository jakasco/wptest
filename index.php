
<?php
get_header(); ?>





<div class="content-row">

<!--<div class="nav-container">-->
  <?php
//  get_sidebar();
  ?> <!--
<button id="scrollTopButton" onclick="scrollToTop(1000);">top</button>
</div> -->
<?php //testasu
/*
if( get_theme_mod( 'cd_button_display', 'show' ) == 'show' ) : ?>
    <a href="" class='button'>Come On In</a>

<?php endif*/ ?>

<div id='photocount'>
    <span id="photocountlabel"><?php // echo get_theme_mod( 'cd_photocount', 0 ) ?></span>
</div>

<script>
/*
wp.customize( 'cd_photocount', function( value ) {
	value.bind( function( newval ) {
    console.log("newval: ",newval);
		$( '#photocount span' ).html( newval );
	} );
} );
*/


</script>


<main>
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
                        <a target="_blank" rel="noopener noreferrer" href="<?php echo get_permalink();?>">
                              <?php the_title(); ?>
                            </a>
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




 </main>
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area") ) : ?>
 <?php endif;?>
</div>

<?php
get_footer();
?>
