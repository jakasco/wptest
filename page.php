<?php
get_header(); ?>

<div class="content-row">

	<?php
	get_sidebar();
	?>

	<main>
		<div class="postaus">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : ?>
					<?php the_post(); ?>
					<h2 class="postausTitle"> <?php the_title(); ?></h2>
					<div class="contentOfPostaus">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</main>
	<?php get_sidebar('content-bottom'); ?>
</div>

<?php get_sidebar(); ?>
<?php
get_footer();
?>