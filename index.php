
<?php
get_header(); ?>

<div class="nav-container">
  <?php
  get_sidebar();
  ?>
<button id="scrollTopButton" onclick="scrollToTop(1000);">top</button>
</div>



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

<?php
  if ( have_posts() ) {

    // Load posts loop.
    while ( have_posts() ) {
      the_post();
      get_template_part( 'template-parts/content/page' );
    }

    // Previous/next page navigation.
  //  twentynineteen_the_posts_navigation();

  } else {

    // If no content, include the "No posts found" template.
    get_template_part( 'template-parts/content/content', 'none' );

  }
  ?>

<!--<main>

  //include('random_article_template.php');



 </main>-->
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Name of Widgetized Area") ) : ?>
 <?php endif;?>
 <?php get_sidebar( 'content-bottom' ); ?>
</div>

<?php
get_footer();
?>
