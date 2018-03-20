<?php get_header(); ?>

		

		<!-- <section class="jumbotron">
			<div class="wrapper">
				<h2>We are digital &amp; branding agency based in London.</h2>
				<h3>We love to turn great ideas into beautiful products.</h3>
				<a href="#" class="button">See portfolio</a>
			</div>
		</section> -->
		<!-- ./jumbotron -->


		<section id="content-section" class="wrapper">
			<h1>THE TITLE</h1>
			 <!-- Start the Loop. -->
			<?php if (have_posts()) :
					while (have_posts()) : the_post(); 
			?>

			

			<h2>
				<a href="<?php the_permalink(); ?>">
					<?php the_title();?>
				</a>
			</h2>

			<div class="marble-row">
				<div class="marble-col">
					<?php
						if ( has_post_thumbnail() ) { 
							the_post_thumbnail('custom-size');
						}
					?>
				</div>
				<div class="marble-col">
					<?php 
						the_title() . '<br/>';
						the_excerpt() . '<br/>';
					?>
					<span><?php the_author() ?></span>
					<span><?php the_date() ?></span>
					<span><?php the_category(',') ?></span>
				</div>
			</div>
				
			<?php endwhile; 
			else :
				echo 'Content to be displayed when htere is nothing to show';
			?>


			<!-- The very first "if" tested to see if there were any Posts to -->
			<!-- display.  This "else" part tells what do if there weren't any. -->
			<p><?= "Sorry, no posts matched your criteria." ?></p>


			<!-- REALLY stop The Loop. -->
			<?php endif; ?>

			<!-- tje post previous and next links -->
			<footer class="footer-nav-links">
				<p><?php posts_nav_link('|', 'previous post', 'next post'); ?></p>
			</footer>


			<!-- <div class="container">
				<div class="col">
					<i class="icon lamp"></i>
					<h4>Pellentesque</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div> -->
				<!-- ./col1 -->
				<!-- <div class="col">
					<i class="icon clock"></i>
					<h4>Consectetur</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div> -->
				<!-- ./col2 -->
				<!-- <div class="col">
					<i class="icon flask"></i>
					<h4>Tristiquet</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div> -->
				<!-- ./col3 -->
				<!-- <div class="col">
					<i class="icon ticket"></i>
					<h4>Fermentum</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div> -->
				<!-- ./col4 -->
			<!-- </div> -->

			<!-- <hr /> -->

		</section>

		<!-- <section id="section-latest-work" class="wrapper">
			<h3>Our latest works</h3>
			<div class="container">
				<article class="col">
					<img src="<?= get_template_directory_uri(); ?>/img/image1.jpg" alt="Business Card">
					<h4>Nobis Business Card</h4>
					<h5>Business Cards, Graphics</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>

				<article class="col">
					<img src="<?= get_template_directory_uri(); ?>/img/image2.jpg" alt="New fun project">
					<h4>New fun project</h4>
					<h5>Webdesign, Application</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>

				<article class="col">
					<img src="<?= get_template_directory_uri(); ?>/img/image3.jpg" alt="Passionaries Branding Cover">
					<h4>Passionaries Branding Cover</h4>
					<h5>Branding, Graphic Design</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>
			</div>
		</section> -->

<?php get_footer(); ?>	
