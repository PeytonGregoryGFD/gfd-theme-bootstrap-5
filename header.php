
<?php /* * The Theme Header */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<aside><a class="skip-link screen-reader-text" href="#top">Skip to content</a></aside>
    <header id="siteHeader">
        <nav class="navbar navbar-expand-xl py-3 navbar-light bg-white">
            <div class="container">
                <?php echo apply_filters('gfd_sitetitle', ''); ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
					wp_nav_menu( array(
					'menu'              => 'header',
					'theme_location'    => 'header',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse justify-content-md-end',
					'container_id'      => 'navbarSupportedContent',
					'menu_class'        => 'navbar-nav',
                    'menu_id'           => 'header',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
				?>
            </div>
        </nav>
    </header>