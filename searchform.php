<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="search..." class="search-field">
	<button type="submit" id="searchsubmit" value="Search" class="sininen"><i class="fi-magnifying-glass large"></i></button>
</form>