<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'thegithubblog_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'thegithubblog_header' ); ?>

	<div class="bg-gray-800 py-3 text-xs">
		<div class="container mx-auto">
			<a href="#" class="text-white">Back to GitHub.com</a>
		</div>
	</div>

	<header>

		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center py-6">
				<div class="flex justify-between items-center">
					<div>
						<div class="text-lg">
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="flex items-center font-mono">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/images/logo.svg" class="w-8 mr-4">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>
						</div>
					</div>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
                            <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g  stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                                    <g id="icon-shape">
                                        <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </svg>
						</a>
					</div>
				</div>

				<?php
					wp_nav_menu(
						array(
							'container_id'    => 'primary-menu',
							'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
							'menu_class'      => 'lg:flex lg:-mx-4',
							'theme_location'  => 'primary',
							'li_class_0'      => 'lg:mx-4 lg:relative group hover:text-blue-700',
							'li_class_1'	  => 'text-gray-800 hover:text-blue-700',
							'submenu_class'   => 'lg:hidden group-hover:block lg:absolute lg:left-1/2 lg:top-8 lg:w-48 lg:max-w-3xl lg:rounded transform -translate-x-1/2 bg-white shadow-behind p-6 leading-loose font-mono block',
							'fallback_cb'     => false,
						)
					);
					?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'thegithubblog_content_start' ); ?>

		<main>
