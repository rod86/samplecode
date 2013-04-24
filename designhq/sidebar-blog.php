
<h1>Categories</h1>

<?php 
$page = get_page_by_path('blog');
?>

<h2><a href="<?php echo get_page_link($page->ID); ?>">All</a></h2>

<?php 
$post_categories = get_categories();
	
foreach($post_categories as $cat){
	?>
	<h2><a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->name;?></a></h2>
	<?php 	
}
?>