
<?php
get_header(); ?>
<div class="content-row">
<?php
get_sidebar();
?>

<main>
	<h2><?php echo get_queried_object()->name; ?></h2>
	<p> <?php echo get_queried_object()->description; ?></p>
 <h3 class="sininen">kategoriat</h3>
 <?php
	$id = get_queried_object()->term_id;
	$tyyppi = get_queried_object()->taxonomy;
	$alikategoriat = get_term_children( $id, $tyyppi ); //haetaan alikategoriat
	foreach( $alikategoriat as $alikategoria):
		$termi = get_term_by('id',$alikategoria, $tyyppi);
 ?>
 <article>
	<a href="<?php echo get_term_link($alikategoria, $tyyppi ); ?>">
	<?php
	$artikkelit = get_posts( array('category' => $termi->term_id, 'numberposts' => 1, 'orderby' => 'rand'));
	
	$thumbnail = get_the_post_thumbnail( $artikkelit[0]->ID, 'thumbnail');
	
	if($thumbnail == null){
		?> <img src="http://placekitten.com/150/200" alt="">
	<?php	
	}else{
		echo $thumbnail;
	}
	?>

		<h4><?php echo $termi->nimi; ?></h4>
		<p>
			<?php 
			
			$description = substr(category_description( $termi->term_id ), 0, 100); 
			
			if($description == ""){
				echo "Ei kategoria kuvausta";
			}else{
			echo $description;
			}
			?>
		</p>
	</a>
 </article>
 <?php endforeach;?>
 </main>
</div>

<?php
get_footer();
?>