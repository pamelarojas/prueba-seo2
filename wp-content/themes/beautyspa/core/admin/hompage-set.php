<?php if (!function_exists('beautyspa_infohome_page')) {
	function beautyspa_infohome_page() {
	$page2=add_theme_page(__('Welcome to Beautyspa', 'beautyspa'), __('How To Set Homepage', 'beautyspa'), 'edit_theme_options', 'beautyspahome', 'beautyspa_display_theme_infohome_page');
	
	add_action('admin_print_styles-'.$page2, 'beautyspa_admin_infohome');
	}	
}
add_action('admin_menu', 'beautyspa_infohome_page');

function beautyspa_admin_infohome(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('beautyspa-admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome.css');

	//JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/core/admin/bootstrap/js/bootstrap.js');
	wp_enqueue_script('beautyspa-script-menu', get_template_directory_uri().'/js/script.js');
} 
if (!function_exists('beautyspa_display_theme_infohome_page')) {
	function beautyspa_display_theme_infohome_page() {
		$theme_data = wp_get_theme(); ?>		
<div class="wrapper">
<!-- Header -->
<header>
<div id="snow"></div>
<div class="container-fluid p_header">
	<div class="container">
		<div class="row p_head">
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/logo.png" class="img-responsive" alt="logo"/>
			</div>
		<div class="col-md-4"></div>	
		</div>
	</div>
</div>
<div class="container-fluid home-page">
	<h1> <?php esc_html_e('How to setup Homepage','beautyspa'); ?></h1>
	<div class="container">
		<div class="col-md-6">
			<h4><?php esc_html_e('1. Firstly make your static page(home page).','beautyspa'); ?></h4>
			<h4><?php esc_html_e('2. Go to Customizer -> Static Front Page Option -> see the given image -','beautyspa'); ?></h4>
			<h4><?php esc_html_e('3. Save & Publish.','beautyspa');?></h4>
		</div>
	<div class="col-md-6">
			<div class="img-thumbnail">
				<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/home-page.png" class="img-responsive" alt="home-page"/>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid import-page">
	<h1><?php esc_html_e('How to Use the XML File to Import the Demo Site Content','beautyspa'); ?></h1>
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-6">
				<h4><?php esc_html_e('1. Log-in to your WordPress backend and click on Tools -> Import in the left menu. You will see a list of systems that can import posts into WordPress, such as Blogger, Blogroll etc','beautyspa'); ?></h4>
				<h4><?php esc_html_e('2. Choose WordPress from the list. Then run WordPress importer.','beautyspa'); ?></h4>	
				<h4><?php esc_html_e('3. Upload the demo content .xml using the form provided on that page.','beautyspa'); ?></h4>
				<h4><?php esc_html_e('4. Upload the .xml file and import the data and save the changes.','beautyspa'); ?></h4>
				<h4><?php esc_html_e('You can download the beautyspa demo using the below button.','beautyspa'); ?></h4>
				<div class="col-md-12 button-home">
				
			</div>
			</div>
			<div class="col-md-6">
				<div class="img-thumbnail">
					<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/import-data.jpg" class="img-responsive" alt="import-data"/>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid import-page">
	<h1><?php esc_html_e('How to Use the data File to Import the Demo Site Customizer Content','beautyspa'); ?></h1>
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-6">
				<h4><?php esc_html_e('1. Install Customizer Export/Import Plugin from','beautyspa'); ?> <a href="https://wordpress.org/plugins/customizer-export-import/"><?php esc_html_e('https://wordpress.org/plugins/customizer-export-import/','beautyspa'); ?> </a></h4>
				<h4><?php esc_html_e('2. Activate the Plugin','beautyspa'); ?></h4>	
				<h4><?php esc_html_e('3. Go to Customizer -> Export/Import option -> see the given image','beautyspa'); ?></h4>
				<h4><?php esc_html_e('You can download the beautyspa Customizer data using the below button.','beautyspa'); ?></h4>
				<div class="col-md-12 button-home">
				<a class="home-button" href="https://weblizar.com/dummydata/freetheme/beautyspa/beautyspa-data.zip" download><?php esc_html_e('Download Data','beautyspa'); ?> </a>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/import.jpg" class="img-responsive" alt="import-data"/>
			</div>
		</div>
	</div>
</div>
<!-- Header -->
</div>
<?php
	}
}
?>