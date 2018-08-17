/*-----------------------------------------------------------------------------------*/
/* VW Spa Lite Responsive WordPress Theme */
/*-----------------------------------------------------------------------------------*/

Theme Name      :   VW Spa Lite
Theme URI       :   https://www.vwthemes.com/free/wp-salon-spa-wordpress-theme/
Version         :   1.4.3
Tested up to    :   WP 4.9.6
Author          :   VW Themes
Author URI      :   https://www.vwthemes.com/
license         :   GNU General Public License v3.0
License URI     :   http://www.gnu.org/licenses/gpl.html

/*-----------------------------------------------------------------------------------*/
/* About Author - Contact Details */
/*-----------------------------------------------------------------------------------*/

email       	:   support@vwthemes.com

/*-----------------------------------------------------------------------------------*/
/* Features */
/*-----------------------------------------------------------------------------------*/

Manage Slider, services and footer from admin customizer vw setting section.


/*-----------------------------------------------------------------------------------*/
/* Theme Resources */
/*-----------------------------------------------------------------------------------*/

Theme is Built using the following resource bundles.

1 -	CSS bootstrap.css
    -- Copyright 2011-2018 The Bootstrap Authors
    -- https://github.com/twbs/bootstrap/blob/master/LICENSE
    
    JS bootstrap.js
    -- Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
    -- https://github.com/twbs/bootstrap/blob/master/LICENSE

    CSS nivo-slider.css
        Copyright 2012, Dev7studios
        Free to use and abuse under the MIT license.
        http://www.opensource.org/licenses/mit-license.php

    JS nivo-slider.js
        Free to use and abuse under the MIT license.
        http://www.opensource.org/licenses/mit-license.php

    Font Awesome 
    	-- font-awesome.css and fonts folder
		Font Awesome 5.0.0 by @davegandy - http://fontawesome.io - @fontawesome
 		License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)

	Customizer Pro
		Source: https://github.com/justintadlock/trt-customizer-pro

2 - Open Sans font - https://www.google.com/fonts/specimen/Open+Sans
	PT Sans font - https://fonts.google.com/specimen/PT+Sans
	Roboto font - https://fonts.google.com/specimen/Roboto
	License: Distributed under the terms of the Apache License, version 2.0 http://www.apache.org/licenses/LICENSE-2.0.html

3 - Images used from Pixabay.
	Pixabay provides images under CC0 license (https://creativecommons.org/about/cc0)

	Images used from Pexels.
	Pexels provides images under CC0 license (https://www.pexels.com/photo-license/)

	Banner image, Copyright freestocks.org  
	License: CC0 1.0 Universal (CC0 1.0)
	Source: https://www.pexels.com/photo/adult-body-fashion-girl-361754/

	Service image, Copyright andreas160578
	License: CC0 1.0 Universal (CC0 1.0)
	Source: https://pixabay.com/en/alternative-medicine-beauty-chinese-1327808/

	Service image, Copyright louda2455
	License: CC0 1.0 Universal (CC0 1.0)
	Source: https://pixabay.com/en/bath-soap-perfume-bottle-oil-585128/

	Service image, Copyright rhythmuswege
	License: CC0 1.0 Universal (CC0 1.0)
	Source: https://pixabay.com/en/wellness-massage-reiki-285590/

All the icons taken from genericons licensed under GPL License.
http://genericons.com/

VW Spa Lite Free version
==========================================================
VW Spa Lite Free version is compatible with GPL licensed.

For any help you can mail us at support[at]vwthemes.com


Changelog
============

Version 1.0
i) Initial version Release

Version 1.1
i) Corrected POT file
ii) Corrected slide images

Version 1.1.1
i) Modified CSS and HTML structure.
ii) Modified Screenshot.

Version 1.1.2
i) Changes as per wordpress standards
	-- Use the_title_attribute()
	-- Prefix add_panel, add_section, add_setting and add_control handles 
	-- Remove header("Location: http://" . $_SERVER['HTTP_HOST'] . "");
	-- Remove unused comment out code ex. searchform.php line 10
	-- Remove full-width-template tag from style.css or add full width template
	-- Fixed Necho the_title() in vw_restaurant_the_breadcrumb
	-- Remove prefix from third party script and styles except Google font

Version 1.1.3
	-- Incorrect use of home.php
	-- Multiple escaping issues
	-- Removed Custom Headers support.
	-- searchform.php - get_search_query() escaping removed. 
	-- home.php - added wp_reset_postdata();
	-- contact.php - you have untranslatable text strings 
	-- Corected demo content.

Version 1.1.4
	-- Corrected CSS issues
	-- Add handle prefix

Version 1.1.5
	-- Fixed minor issues

Version 1.1.6
	-- Fixed issues
	-- REQUIRED: functions.php L163 - Handle bootstrap-style should be bootstrap.
	-- REQUIRED: functions.php L168, L169 - Handle nivo-slider should be jquery-nivo-slider.
	-- REQUIRED: functions.php L170 - Handle bootstrap-js should be bootstrap.
	-- REQUIRED: template-tags.php L40 - Strings should have translatable content
	-- REQUIRED: index.php - title="<?php _e('READ More...','vw-spa-lite'); ?>" should be title="<?php esc_attr_e('READ More...','vw-spa-lite'); ?>"
	-- REQUIRED: page.php - wp_link_pages() missing after the_content(). Check in other files also.
	-- REQUIRED: You are using <?php get_sidebar('page'); ?> but there is no sidebar-page.php file. Can you please check it?
	-- REQUIRED: vw_spa_lite_jetpack_setup() - Is Jetpack infinite scroll working? Remove it if you dont want to implement.
	-- REQUIRED: Remove editor-style theme tag.
	-- REQUIRED: functions.php L63 - Is f1f1f1 correct color for background?
	-- REQUIRED: antispambot is not secure enough for escaping email. You can use like this. <?php echo esc_html( antispambot( get_theme_mod('vw_spa_lite_cont_email','') ) ); ?>
	-- REQUIRED: Static front page issue - When Your latest posts is set as Front page displays custom section should not be displayed. Only blog listing is expected in that page. Similar for Posts Page. If you want to implement custom section like slider, you can use Front Page. Please check http://www.chipbennett.net/2013/09/14/home-page-and-front-page-and-templates-oh-my/

Version 1.1.7
	-- Changed screenshot
	-- Description changed

Version 1.1.8
	-- Changed the layout of theme.
	-- Removed depreciated functions.
	-- Added the static part from the post.

Version 1.1.9
	-- Added the translation ready in theme.
	-- Added rtl language support in theme.

Version 1.2.0
	-- Added e-commerce in theme.

Version 1.2.1.0
	-- Done the customization changes.
	-- change the styling of theme.

Version 1.3
	-- Tested upto WordPress version 4.9.1.
	-- Resolved the errors.

Version 1.4
	-- Updated fontawesome.
	-- updated font url code.
	-- Added typography. 
	-- Resolved the errors.

Version 1.4.1
	-- Updated Woocommerce in theme.
	-- Added post format tag.

Version 1.4.2
	-- Update: Bootstrap version 4.0.0
	-- Update: language folder pot file.
	-- Update: rtl file.
	-- Added:  Post format, custom header, featured image header tags.

Version 1.4.3
	-- Resolved the errors.
	-- Update: language folder pot file.