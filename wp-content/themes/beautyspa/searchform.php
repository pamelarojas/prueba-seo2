<?php
/**
 * The template part for search form
 *
 *
 * @package WordPress
 * @subpackage beautyspa
 * @since BeautySpa 1.0
 */
?>

<div class="col-md-12 fsearch">
<div class="form-group">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 	
	<label>
	  <input value="<?php echo the_search_query(); ?>" type="text" class="form-control"  name="s" id="search" placeholder="<?php esc_attr_e( "Search Here...", 'beautyspa' ); ?>" />
	<button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
	</label>
	</form> 
</div>
</div>