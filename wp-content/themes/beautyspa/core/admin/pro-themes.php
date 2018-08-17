<?php /* if (!function_exists('beauty_info_page')) {
	function beauty_info_page() {
	$page1=add_theme_page(__('Welcome to BeautySpa', 'beautyspa'), __('Pro Themes & Plugin', 'beautyspa'), 'edit_theme_options', 'beautyspapro', 'beauty_display_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'beauty_admin_info');
	}	
}
add_action('admin_menu', 'beauty_info_page');

function beauty_admin_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/css/bootstrap.min.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome.min.css');

	//JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.js');
	wp_enqueue_script('script-menu', get_template_directory_uri().'/core/admin/js/script.js');
} 
if (!function_exists('beauty_display_theme_info_page')) {
	function beauty_display_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
		
<div class="wrapper">
<!-- Header -->
<header>
<div class="container-fluid p_header">
	<div class="container">
		<div class="row p_head">
		<div class="col-md-4"></div>
			<div class="col-md-4">

<div class="p-header-bg">
	<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-responsive" alt=""/>
</div>
<div class="col-md-4"></div>	
		</div>
		</div>
		</div>
		</div>
<nav class="navbar navbar-default menu">
		<div class="container-fluid">
			<div class="container">
				<div class="row spa-menu-head">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="theme-menu active" id="theme"><button class="btn tp">Themes</button></li>
							<li class="theme-menu" id="plugin"><button class="btn tp">Plugins</button></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
<!-- Header -->
<!-- Themes & Plugin -->
<div class="container-fluid space p_front theme active">
	<div class="container">	
		<div class="row p_head theme">
			<div class="col-xs-12 col-md-8 col-sm-6">
				<h1 class="section-title">WordPress Themes</h1>
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/BeautySpa.jpg" class="img-responsive" alt=""/>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">BeautySpa- Beauty Salon Theme</a></h2>
						<p><strong>Tags: </strong>Customize Front Page, Multilingual, Complete Documentation, Theme Option Panel, Unlimited Color Skins, Multiple Background Patterns, Multiple Theme Templates, 5 Portfolio Layout, 3 Page Layout and many more.</p>
					<div>
						<p><strong>Description: </strong>
						BeautySpa is versatile  health care business WordPress theme suitable for spa, spa salon, sauna, massage , medical business, massage center, beauty center, eCommerce and beauty salon websites.</p>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>39</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/beautyspa-premium/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/beautyspa-premium/">Buy Now</a>
				</div>			
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/personal.jpg" class="img-responsive" alt=""/>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Personal Premium Theme </a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Personal Premium is a powerful and flexible, customizable and extensively developed, wonderfully lightweight and mobile friendly, easy to use and intuitively structured. Personal Premium is a highly customizable and SEO friendly responsive WordPress theme you have access to unlimited color variations, multiple different layout options, shortcode modules, and much more. </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>17</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/personal-premium/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/personal-premium">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/explora.jpg" class="img-responsive" alt=""/>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Explora- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Explora Premium is a multi-purpose responsive theme coded & designed with a lot of care and love. You can use it
						for your business, portfolio, blogging or any type of site. </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>25</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/explora-premium/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/explora-premium/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Guardian.jpg" class="img-responsive" alt=""/>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Guardian- Corporate Business Theme</a></h2>
						<p><strong>Tags: </strong>Multiple Background Patterns, Rich color changer, Boxed/wide layout styles, Additional Page, WPML & Woo Commerce.</p>
						<div>
						<p><strong>Description: </strong>
						Guardian Premium Theme is a super professional one page WordPress theme for modern businesses. Ideal for creative agencies, startups, small businesses, and freelancers and best of all it is so easy to use that you can have your website up in minutes.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>39</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/guardian-premium-theme/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/guardian-premium-theme/">Buy Now</a>
				</div>
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Enigma.jpg" class="img-responsive" alt=""/>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Enigma- Modern & Clean Designed Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant.</p>
						<div>
						<p><strong>Description: </strong>
						Enigma is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page also present.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>39</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/enigma-premium/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/enigma-premium/">Buy Now</a>
				</div>			
			</div>
		</div>
	</div>
</div>
<!----Plugin----->
<div class="container-fluid space p_front plugin hidden">
	<div class="container">
		<div class="row p_head theme">
			<div class="col-xs-12 col-md-8 col-sm-6">
				<h1 class="section-title">WordPress Plugins</h1>
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/facebook-feed.jpg" class="img-responsive" alt="Coming-Soon-Page"/>
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Facebook Feed Pro</a></h2>
						<p><strong>Features: </strong>
						<ul>
						<li>Profile, Page & Group Feeds</li>
						<li>Unlimited Feeds Per Page/Post</li>
						<li>Light-Box Layouts</li>
						<li>Tons of Feed Shortcodes</li>
						<li>Feed Widgets</li>
						<li>Auto-Update Feeds......etc many more.</li>
						</ul>
						</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number"><span>$19</span></span>
				</div>
				<div class="btn-group-vertical">
					<a target="_blank" class="btn btn-primary btn-lg" href="https://weblizar.com/plugins/facebook-feed-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/facebook-feed-pro/">Buy Now</a> 
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Pinterest-Feed.jpg" class="img-responsive" alt="Coming-Soon-Page"/>
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Pinterest Feed Pro</a></h2>
						<p><strong>Features: </strong>
						<ul>
						<li>Pinterest Feed Shortcode</li>
						<li>Responsive Pinterest Plugin</li>
						<li>Pinterest Feed Widget</li>
						<li>Pinterest Profile</li>
						<li>Pinterest Pin Slider</li>
						<li>Setting Panel</li>
						</ul>
						</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number"><span>$18</span></span>
				</div>
				<div class="btn-group-vertical">
					<a target="_blank" class="btn btn-primary btn-lg" href="https://weblizar.com/plugins/pinterest-feed-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/pinterest-feed-pro/">Buy Now</a> 
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Search-Engine-Optimizer-new.jpg" class="img-responsive" alt="Coming-Soon-Page"/>
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">SEO Image Optimizer Pro </a></h2>
						<p><strong>Features: </strong>
						<ul>
						<li>WooCommerce Product Images SEO</li>
						<li>Auto Fill Title & Alt Tag</li>
						<li>Custom Title & Alt Tag</li>
						<li>Featured Images SEO</li>
						<li>Magical Reset</li>
						<li>Delimiter Removal</li>
						<li>Image Compression</li>
						<li>Site Speed Up</li>
						</ul>
						</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number"><span>$11</span></span>
				</div>
				<div class="btn-group-vertical">
					<a target="_blank" class="btn btn-primary btn-lg" href="https://weblizar.com/seo-image-optimizer-pro">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/seo-image-optimizer-pro/">Buy Now</a> 
				</div>			
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/newsletter.png" class="img-responsive" alt="Coming-Soon-Page"/>
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Newsletter Subscription Form Pro </a></h2>
						<p><strong>Features: </strong>
						<ul>
						<li>Multiple Pro Template</li>
						<li>News Letter Subscription</li>
						<li>Download Subscriber List</li>
						<li>Auto & Manual Notification</li>
						<li>Major Browser Compatible</li>
						<li>Multi Site and Multilingual</li>
						<li>Customized Form</li>
						<li>Forms shotcode</li>
						</ul>
						</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number"><span>$7</span></span>
				</div>
				<div class="btn-group-vertical">
					<a target="_blank" class="btn btn-primary btn-lg" href="https://weblizar.com/newsletter-subscription-form-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/newsletter-subscription-form-pro/">Buy Now</a> 
				</div>			
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Comingsoon.jpg" class="img-responsive" alt="Coming-Soon-Page"/>
					
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Coming Soon Page & Maintenance Mode Pro </a></h2>
						<p><strong>Features: </strong>
						<ul>
						<li>Coming Soon Mode</li>
						<li>Under Construction Mode</li>
						<li>Pro Templates</li>
						<li>News Letter Subscriptions</li>
						<li>Automatic Website Launch</li>
						<li>News Letter Subscriber Forms</li>
						<li>Auto & Manual Notification</li>
						<li>Google Analytic Tracking</li>
						</ul>
						</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number"><span>$24</span></span>
				</div>
				<div class="btn-group-vertical">
					<a target="_blank" class="btn btn-primary btn-lg" href="https://weblizar.com/plugins/coming-soon-page-maintenance-mode-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/coming-soon-page-maintenance-mode-pro/">Buy Now</a> 
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/responsive-pro.jpg" class="img-responsive" alt=""/>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Responsive Portfolio Pro- Perfect Responsive Portfolio Plugin</a></h2>
						<p><strong>Features: </strong>
						<ul>
						<li>Image Hover Animation</li>
						<li>Number of Hover Color</li>
						<li>Number of Font Style</li>
						<li>Number of Lightbox Styles</li>
						<li>Drag and Drop image Position</li>
						<li>Multiple Image uploader and so on..<li>
						</ul>
						</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>19</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/plugins/responsive-portfolio-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/responsive-portfolio-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
	</div>
</div>
	<div id="theme-author">
		<p><?php printf(__('%1s is proudly brought to you by %2s. If you like this WordPress theme, %3s.', 'beautyspa'),
			$theme_data->Name,
			'<a target="_blank" href="https://weblizar.com/" title="weblizar">Weblizar</a>',
			'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/beautyspa" title="beautyspa Review">' . __('rate it', 'beautyspa') . '</a>'); ?>
		</p>
	</div>
</div>
<?php
	}
}
*/
?>