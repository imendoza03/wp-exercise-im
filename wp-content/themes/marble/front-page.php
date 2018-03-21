<?php get_header(); ?>

		<section class="jumbotron">
			<div class="wrapper">
				<h2>We are digital &amp; branding agency based in London.</h2>
				<h3>We love to turn great ideas into beautiful products.</h3>
				<a href="#" class="button">See portfolio</a>
			</div>
		</section>
		<!-- ./jumbotron -->


		<section id="section-icons" class="wrapper">
			<div class="container">
				<!-- use of the default loop -->
				<?php
					$args = array(
						'posts_per_page' => 4,
						'post_type' => 'feature',
						// 'order' => 'ASC'
					);

					$query = new WP_Query( $args );
				?>
				<!-- start of the custom loop -->
				<?php 
					if($query->have_posts()): while($query->have_posts()) : $query->the_post();
						?>
						<!-- display the post content in a html template -->
						<article class="col">
						<?php
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail('project-custom-size');
							}
						?>
						<i class="icon <?php echo get_post_meta(get_the_ID(), 'icon_class', true); ?>"></i>
						<!--<?php echo get_post_meta(get_the_ID(), 'icon', true); ?> -->
						<h4><?php the_title(); ?></h4>
						<p><?php the_excerpt(); ?></p>
					</article>
						<?php
						endwhile;
					else:
						echo '<p> post here</p>';
					endif;

					wp_reset_postdata();
				?>
				<!-- <div class="col">
					<i class="icon lamp"></i>
					<h4>Pellentesque</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				
				<div class="col">
					<i class="icon clock"></i>
					<h4>Consectetur</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				
				<div class="col">
					<i class="icon flask"></i>
					<h4>Tristiquet</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				
				<div class="col">
					<i class="icon ticket"></i>
					<h4>Fermentum</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div> -->
				
			</div>

			<hr />

		</section>

		<section id="section-latest-work" class="wrapper">
			<h3>Our latest works</h3>
			<div class="container">
				<!-- use of the default loop -->
				<?php
					$args = array(
						'posts_per_page' => 3,
						'post_type' => 'project',
					);

					$query = new WP_Query( $args );
				?>
				<!-- start of the custom loop -->
				<?php 
					if($query->have_posts()): while($query->have_posts()) : $query->the_post();
						?>
						<!-- display the post content in a html template -->
						<article class="col">
						<?php
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail('project-custom-size');
							}
						?>
						<h4><a href="<?php permalink_link()?>"><?php the_title(); ?></a></h4>
						<h5><?php the_terms( get_the_ID(), 'type', '', ', ', ''); ?></h5>
						<p><?php the_excerpt(); ?></p>
					</article>
						<?php
						endwhile;
					else:
						echo '<p> post here</p>';
					endif;
				?>
				<!-- will render the content of the page named homepage -->
				<!-- create a custom loop query -->
			</div>
			<!-- <div class="container">
				<article class="col">
					<img src="<?= get_template_directory_uri();?>/img/image1.jpg" alt="Business Card">
					<h4>Nobis Business Card</h4>
					<h5>Business Cards, Graphics</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>

				<article class="col">
					<img src="<?= get_template_directory_uri();?>/img/image2.jpg" alt="New fun project">
					<h4>New fun project</h4>
					<h5>Webdesign, Application</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>

				<article class="col">
					<img src="<?= get_template_directory_uri();?>/img/image3.jpg" alt="Passionaries Branding Cover">
					<h4>Passionaries Branding Cover</h4>
					<h5>Branding, Graphic Design</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</article>
			</div> -->
		</section>
		
		<section id="section-latest-work" class="wrapper">
			<h3>Our latest news</h3>
			<div class="container">
				<!-- use of the default loop -->
				<?php
					$args = array(
						'posts_per_page' => 3,
						'post_type' => 'post',
					);

					$query = new WP_Query( $args );
				?>
				<!-- start of the custom loop -->
				<?php 
					if($query->have_posts()): while($query->have_posts()) : $query->the_post();
						?>
						<!-- display the post content in a html template -->
						<article class="col">
						<!-- <img src="<?= get_template_directory_uri();?>/img/image1.jpg" alt="Business Card"> -->
						<h4><a href="<?php permalink_link()?>"><?php the_title(); ?></a></h4>
						<h5><?php the_category(); ?></h5>
						<p><?php the_excerpt(); ?></p>
					</article>
						<?php
						endwhile;
					else:
						echo '<p> post here</p>';
					endif;
				?>
				<!-- will render the content of the page named homepage -->
				<!-- create a custom loop query -->
				
				
				end of the custom loop
			</div>
		</section>

<?php get_footer(); ?>	
