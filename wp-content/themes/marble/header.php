<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- <link rel="stylesheet" href="<?= get_template_directory_uri();?>/css/normalize.css" rel="stylesheet"> -->

	<!-- polices -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:400,700|Roboto+Slab:400,700" rel="stylesheet">

	<!-- mes s yles -->
    <!-- <link rel="stylesheet" href="<?= get_template_directory_uri();?>/css/styles.css"> -->
    <?php wp_head(); ?> <!-- for a dynamic title, must be at the very end of the head -->

</head>
<body <?php body_class(); ?>>

	<header class="main-header">
		<div class="wrapper">
			<h1 class="logo">Marble</h1>

				<?php wp_nav_menu([
					'theme_location' => 'primary',
					'container' => 'nav'
				]); ?>
				<!-- <nav>
					<ul>
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Journal</a></li>
						<li><a href="#">Service</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">Contact</a></li>
					</ul> 
				</nav> -->
			
			<!-- ./main navigation -->
		</div>
		<!-- ./wrapper -->
	</header>
	<!-- ./main-header -->

	<main>