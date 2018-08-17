<?php
//about theme info
add_action( 'admin_menu', 'vw_spa_lite_gettingstarted' );
function vw_spa_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Spa Theme', 'vw-spa-lite'), esc_html__('About VW Spa Theme', 'vw-spa-lite'), 'edit_theme_options', 'vw_spa_lite_guide', 'vw_spa_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_spa_lite_admin_theme_style() {
   wp_enqueue_style( 'vw-spa-lite-font', vw_spa_lite_admin_font_url(), array() );
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/getting-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_spa_lite_admin_theme_style');

// Theme Font URL
function vw_spa_lite_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_spa_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-spa-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Spa Theme', 'vw-spa-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-spa-lite'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Spa at 10% Discount','vw-spa-lite'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-spa-lite'); ?> ( <span><?php esc_html_e('vwten2018','vw-spa-lite'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_SPA_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-spa-lite' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'lite_theme')"><?php esc_html_e( 'Getting Started', 'vw-spa-lite' ); ?></button>		  
		  <button class="tablinks" onclick="openCity(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'vw-spa-lite' ); ?></button>
		  <button class="tablinks" onclick="openCity(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-spa-lite' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="lite_theme" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vw-spa-lite' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('VW Spa Lite is a free multipurpose WordPress theme for people that are in the business of spa salons & beauty. This free beauty theme is made for people in business of spa, health care, beauty salons, girly, hair, health, hospitality, massage, medical, parlor, physiotherapy, wellness, yoga, health blog and various types of business websites. This is specially built for spa websites. This theme is responsive and compatible with the latest version of WordPress. VW Spa Lite Theme is cross browser compatible and performs well with any browser. The theme is well checked and improved for speed and faster page load time. Because of its secure and clean code, it gives a user-friendly customization experience. This translation ready responsive theme is well suited with well-known plugins like Contact form 7 and WooCommerce. Using customizer, it becomes very easy to manage the settings. It is developed keeping in mind the visitors engagement, therefore the Spa and Salon will help you to produce professional looking excellent websites. Furthermore, its vast personalization options make it a highly intuitive platform to develop beautiful websites. Comprising of about section, service section, testimonial section as well as the breadcrumbs, header phone number display and social media integration, this theme is unique in its own. Take advantage of this chance and claim a theme now. Our free Spa lite theme is made to set up your webpage. We offer premium themes as well that can do a lot more than just setting up your website. Upgrading to premium will see you getting an upgrade in all aspects; your website will be revamped in a totally new fashion that will be way more appealing to viewers than before. So upgrade to premium and enjoy the benefits of seamless customer support and exclusive features.','vw-spa-lite'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-spa-lite' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-spa-lite' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-spa-lite' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-spa-lite'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-spa-lite'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-spa-lite'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-spa-lite'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-spa-lite' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-spa-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-spa-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-spa-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-spa-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_amaze_service_section') ); ?>" target="_blank"><?php esc_html_e('Amazing Service Section','vw-spa-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-spa-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-spa-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-admin-links"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_social_icon') ); ?>" target="_blank"><?php esc_html_e('Add Social Icon','vw-spa-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('Blog Layout','vw-spa-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_spa_lite_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-spa-lite'); ?></a>
							</div>
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-spa-lite'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-spa-lite'); ?></p>
                <ul>
                	<li><?php esc_html_e('1. Create a Page to set template:  Go to ','vw-spa-lite'); ?>
                  	<b><?php esc_html_e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','vw-spa-lite'); ?></b>.
                  	<p><?php esc_html_e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','vw-spa-lite'); ?></p></li>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/home-page-template.png" alt="" />
                  	<p></p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-spa-lite'); ?></span><?php esc_html_e(' Go to ','vw-spa-lite'); ?>
				  	<b><?php esc_html_e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','vw-spa-lite'); ?></b></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, you can see all the demo content on front page. ','vw-spa-lite'); ?></p>
                </ul>
		  	</div>
		</div>	

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-spa-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('VW Spa WordPress theme is made for the luxurious wellness business. Its epic design makes it a suitable Spa WordPress theme for anyone from the wellness industry. Its a theme built on the foundation of immaculate and clean coding standards with well-structured and various intricate sections. We have carefully designed this theme with the spa & sauna business in mind. It is made to look professional, & vibrant with a cool design that can appropriately represent your business. Showcasing your business to the outside world is a task that requires being done correctly with the aid of right set of tools.','vw-spa-lite'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_SPA_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-spa-lite'); ?></a>
					<a href="<?php echo esc_url( VW_SPA_LITE_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-spa-lite'); ?></a>
					<a href="<?php echo esc_url( VW_SPA_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-spa-lite'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/vw-spa-theme.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-spa-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-spa-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-spa-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-spa-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-spa-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-spa-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-spa-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-spa-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-spa-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-spa-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-spa-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-spa-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'vw-spa-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-spa-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-spa-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-spa-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'vw-spa-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-spa-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'vw-spa-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_SPA_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-spa-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-spa-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-spa-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-spa-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-spa-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Post-purchase Queries', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-spa-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-media-text"></span><?php esc_html_e('Theme Demo Content', 'vw-spa-lite'); ?></h4>
				<p> <?php esc_html_e('We are providing the demo content file within the theme folder.  You will require an importer plugin to import the demo content.', 'vw-spa-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SPA_LITE_DEMO_DATA ); ?>" target="_blank"><?php esc_html_e('Demo Content', 'vw-spa-lite'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>