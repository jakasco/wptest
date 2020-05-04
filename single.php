
<?php
get_header(); ?>

<div class="content-row">

<?php
get_sidebar();
?>

<main>
<div class="tuote">
 <?php if (have_posts()):?>
 <?php	while(have_posts()):?>
	 <?php	the_post();?>
	 <h2> <?php the_title(); ?></h2>
	 <?php	the_content();?>
	 <?php endwhile;?>
 <?php endif; ?>
 </div>
 
 <h3 class="sininen">Katsotuimmat</h3>
 
 </main>
</div>

<?php
get_footer();
?>