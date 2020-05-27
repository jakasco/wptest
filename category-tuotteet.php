<?php
get_header(); ?>
<div class="content-row">
<?php
get_sidebar();
?>

<main>
</h1>TUOTTEET </h1>
	<?php
	    global $post;
	    $args = array( 'numberposts' => 10, 'category_name' => 'ad' );
	    $posts = get_posts( $args );
	    foreach( $posts as $post ): setup_postdata($post);
	?>

	<div >
		<h3>  <?php the_title(); ?> </h3>
	</div>

	<?php endforeach; ?>

 </main>
</div>

<?php
get_footer();
?>
