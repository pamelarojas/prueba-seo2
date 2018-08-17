<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package VW Spa Lite
 */

get_header(); ?>

<section id="post-section">
    <div class="innerlightbox">
        <div class="container">
            <?php
                $left_right = get_theme_mod( 'vw_spa_lite_theme_options','Right Sidebar');
                if($left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
                    <div id="our-services" class="services col-md-8 col-sm-8">
                        <h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'vw-spa-lite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content',get_post_format() ); 
                              
                            endwhile;
                            
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                    'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php }else if($left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div id="our-services" class="services col-md-8 col-sm-8">
                        <h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'vw-spa-lite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content',get_post_format() ); 
                              
                            endwhile;

                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                    'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
                </div>
            <?php }else if($left_right == 'One Column'){ ?>
                <div id="our-services" class="services">
                    <h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'vw-spa-lite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content',get_post_format() ); 
                          
                        endwhile;

                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php }else if($left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                    <div id="our-services" class="services col-md-6 col-sm-6">
                        <h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'vw-spa-lite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content',get_post_format() ); 
                              
                            endwhile;

                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                    'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
                </div>
            <?php }else if($left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                    <div id="our-services" class="services col-md-3 col-sm-3">
                        <h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'vw-spa-lite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content',get_post_format() ); 
                              
                            endwhile;

                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                    'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div id="sidebar"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div id="sidebar"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
                    </div>
                </div>
            <?php }else if($left_right == 'Grid Layout'){ ?>
                <div class="row">
                    <div id="our-services" class="services col-md-9 col-sm-9">
                        <h1 class="entry-title"><?php printf( esc_html('Results For: %s', 'vw-spa-lite' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <div class="row">
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                  
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/grid-layout' ); 
                                  
                                endwhile;

                                else :

                                    get_template_part( 'no-results' ); 

                                endif; 
                            ?>
                        </div>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                    'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3"><?php get_sidebar(); ?></div>
                </div>
            <?php }?>
        </div>
    </div>
</section>

<?php get_footer(); ?>