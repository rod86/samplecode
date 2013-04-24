<div id="search">
	<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" class="text" name="s" value="<?php the_search_query(); ?>" />
		<input type="submit" id="searchsubmit" class="submit" value="" />
	</form>
</div>

