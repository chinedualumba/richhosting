<!-- **Searchform** -->
<?php $search_text = empty($_GET['s']) ? __("Type here to search",'dt_themes') : get_search_query(); ?> 
<form class="searchform" method="get" action="<?php echo home_url();?>">
	<input name="submit" type="submit" value="<?php esc_attr_e('go','dt_themes');?>" id="searchsubmit">
	<input id="s" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr( $search_text );?>"/>
</form>