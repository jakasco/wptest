﻿
<?php
get_header(); ?>
<div class="content-row">
	<?php
	get_sidebar();
	?>
	<main>
		<h2><?php echo get_queried_object()->name; ?></h2>
		<p> <?php echo get_queried_object()->description; ?></p>
		<h3 class="sininen">Kategorian tuotteet</h3>
		<?php
		$id = get_queried_object()->term_id;
		$artikkelit = get_posts(array('category' => $id, 'numberposts' => 999));
		foreach ($artikkelit as $artikkeli) :
		?>
			<article>
				<a href="<?php echo get_permalink($artikkeli->ID); ?>">
					<?php
					$thumbnail = get_the_post_thumbnail($artikkeli->ID, 'thumbnail');
					if ($thumbnail == null) {
					?> <img src="http://placekitten.com/150/200" alt="">
					<?php
					} else {
						echo $thumbnail;
					}
					?>
					<h4><?php echo $artikkeli->post_title; ?></h4>
					<p>
						<?php

						$excerpt = substr(category_description($artikkeli->post_excerpt), 0, 100);

						if ($excerpt == "") {
							echo "Ei kategoria kuvausta";
						} else {
							echo $excerpt;
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