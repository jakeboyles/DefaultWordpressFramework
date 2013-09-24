<!DOCTYPE HTML>
<html class="no-js">
<head>
	<?php get_header('head'); ?>
</head>

<body <?php body_class('index'); ?>>

<?php get_header('body'); ?> <!-- googan and image preloader -->

<div id="page-container">

	<?php get_header(); ?>

		<div class="site-width">

			<div class="content">

				<div class="content-left cf">

					<?php
					switch (true) {

						case is_front_page():
						  echo '<style type="text/css">.content .content-left{width:960px;} .content-right{display:none;} .bottomList{display:none;}</style>';
							get_template_part('includes/page', 'home');
							break;

       					case is_page(): /* any other wordpress pages */
							get_template_part('includes/entry', 'page');
							break;

						case is_home(); /* checks for custom posts */
							get_template_part('includes/entry', 'news');
							break;

						case is_category();
							get_template_part('includes/entry', 'category');
							break;


						case is_single(); /* checks for custom posts */
							get_template_part('includes/entry', 'page');
							break;


						case is_search();
							get_template_part('includes/entry', 'searchPage');
							break;

            case is_404():
              get_template_part('includes/entry', '404');
              break;

						default: /* not sure conditions it would fall through to here; I think this page is for blog posts */

							get_template_part('includes/entry');
					}

					?>

			</div> <!-- /content-left -->

			<div class="content-right">

				<?php

				switch (true) {

       			case is_page(): /* any other wordpress pages */
						get_sidebar('news'); 
				break;


				case is_search();
						get_sidebar('news'); 
				break;


				default: /* not sure conditions it would fall through to here; I think this page is for blog posts */

				get_sidebar();

				} ?>

			</div> <!-- /content-right -->
		</div> <!-- /content -->
		</div> <!-- /site-width -->

		<?php get_footer(); ?>

</div> <!-- /page-container -->

<?php //get_footer('body'); ?>

<?php wp_footer(); ?> <!-- often in footerphp so dont double up with it there -->

</body>
</html>
