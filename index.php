
<?php
get_header(); ?>

<div class="content-row">

<?php
get_sidebar();
?>

<h1>Otsikko</h1>
<?php if( get_theme_mod( 'cd_button_display', 'show' ) == 'show' ) : ?>
    <a href="" class='button'>Come On In</a>
<?php endif ?>

<div id='photocount'>
    <span id="photocountlabel"><?php echo get_theme_mod( 'cd_photocount', 0 ) ?></span> photos
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
 <?php if (have_posts()):?>
 <?php	while(have_posts()):?>
	 <?php	the_post();?>
	 <h2> <?php the_title(); ?></h2>
	 <?php	the_content();?>
	 <?php endwhile;?>
 <?php endif; ?>

 <h3 class="sininen">Uuutuudet</h3>
 <?php
	$uudet_artikkelit = wp_get_recent_posts(array('numberposts' => '5'));
	//print_r($uudet_artikkelit); //tulostaa sivulle
	foreach( $uudet_artikkelit as $artikkeli ):
 ?>
 <article>
	<a href="<?php echo get_permalink( $artikkeli['ID'] ); ?>">

	<?php
	$thumbnail = get_the_post_thumbnail( $artikkeli['ID'], 'thumbnail');
	if($thumbnail == null){
		?> <img src="http://placekitten.com/150/200" alt="">
	<?php
	}else{
		echo $thumbnail;
	}


	?>



		<h4><?php echo $artikkeli['post_title']; ?></h4>
		<p>
			<?php
			if($artikkeli['post_excerpt'] == ""){
				echo "Ei excerptiä";
			}else{
			echo $artikkeli['post_excerpt'];
			//100 a ekaa merkkiä: echo substr($artikkeli['post_excerpt'], 0, 100);
			}
			?>
		</p>
	</a>
 </article>
 <?php endforeach; ?>
 </main>
</div>

<?php
get_footer();
?>
