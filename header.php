<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="main-header is-hidden-mobile">
  <figure class="site-logo">
    <a href="<?php bloginfo('url') ?>">
      <img src="<?php echo THEME_IMG.'/openglam-logo.svg' ?>" alt="">
    </a>
  </figure>
  <nav class="main-navigation">
  <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'main-navigation',
				'depth'           => 2,
        'container'       => '',
				'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
				'menu_class'      => 'navbar-menu',
				'menu_id'         => 'primary-menu',
				'after'           => '</div>'
			)
		);
		?>
		</nav>
  </nav>
</header>
<header class="mobile-header is-hidden-tablet">
	<div class="level">
		<div class="level-left">
			<figure class="site-logo">
				<a href="<?php bloginfo('url') ?>">
					<img src="<?php echo THEME_IMG.'/openglam-logo.svg' ?>" alt="">
				</a>
			</figure>
		</div>
		<div class="level-right">
			<a href="#" class="open-menu">
				<i class="icon bars"></i>
				<i class="icon cross"></i>
			</a>
		</div>
	</div>
	<nav class="mobile-navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'main-navigation',
				'depth'           => 1,
        'container'       => '',
				'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
				'menu_class'      => 'navbar-menu',
				'menu_id'         => 'primary-menu',
				'after'           => '</div>'
			)
		);
		?>
	</nav>
</header>