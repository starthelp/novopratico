<?php
/**
* The header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package storefront
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php
		do_action( 'storefront_before_header' ); ?>

		<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
			<div class="col-full">
				<?php
				//***************************************************
				/* traz o storefront nativo do wordpress */
				//;do_action( 'storefront_header' );

				/* não será utiizado o storefront nativo, criado um novo menu */
				//**************************************************
				?>
				<div class="menu">
					<?php
					// se o usuário estiver logado no sistema, apresenta o menu que está logado com o menu administrativo
					if ( is_user_logged_in() )
					{
						wp_nav_menu(array('menu' => 'menu-pratico-logado',
						'fallback_cb' => '&nbsp;',
						'theme_location' => 'menu-principal',
						'container_id' => 'nav'
					));
				}
				else // caso o contrário, aparece o segundo menu quando o usuário não está logado no sistema
				{
					wp_nav_menu(array('menu' => 'menu-pratico',
					'fallback_cb' => '&nbsp;',
					'theme_location' => 'menu-secundario',
					'container_id' => 'nav'
				));
			};
			?>
		</div>
	</div>
</header><!-- #masthead -->

<?php
/**
* Functions hooked in to storefront_before_content
*
* @hooked storefront_header_widget_region - 10
*/
do_action( 'storefront_before_content' ); ?>

<div id="content" class="site-content" tabindex="-1">
	<div class="col-full">

		<?php
		/**
		* Functions hooked in to storefront_content_top
		*
		* @hooked woocommerce_breadcrumb - 10
		*/
		do_action( 'storefront_content_top' );
