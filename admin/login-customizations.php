<?php
	//----------------------------------------------------------------------------
	// Login customizations
	//
	add_filter('login_headerurl', 'sund_wp_login_url');
	if (!function_exists('sund_wp_login_url')) {
		function sund_wp_login_url($url) {
			return get_bloginfo('url');
		}
	}

	add_filter('login_headertitle', 'sund_wp_login_title');
	if (!function_exists('sund_wp_login_title')) {
		function sund_wp_login_title() {
			return get_bloginfo('name') . ' : ' . get_bloginfo('description');
		}
	}

	add_action('login_head', 'sund_login_logo');
	if (!function_exists('sund_login_logo')) {
		function sund_login_logo() {
			?>
		<style type="text/css">
			body.login {
			}

			.login #nav, .login #backtoblog {
				text-align: center;
			}
			.login #nav a, .login #backtoblog a {
				color: #000 !important;   /* Microtrace Blue looked awful cuz antialiasing */
				font-weight: normal;
				font-size: 12px;
				text-shadow: none;
			}

			#login {
				padding: 40px 0 !important;
			}

			.login h1 a {
				background-image: url(<?=get_bloginfo('stylesheet_directory')?>/images/wp-login-combo-image2.png) !important;
				background-size: 300px 143px !important;
				width: 300px !important;
				height: 143px !important;
				margin: 0 auto 20px auto;
			}
		</style>
		<?php
		}
	}
?>