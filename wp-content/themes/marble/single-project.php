<?php get_header(); ?>

	<section id="content-section" class="wrapper">
		
		<h1>SINGLE-PROJECT.PHP</h1>
		<!-- Start the Loop. -->
		<?php 

			if( have_posts() ) : 

				while( have_posts() ): the_post();
				?>
				
				<div class="marble-row hentry">
					<div class="marble-col">
						
						<h2 class="hentry-title">
							<?php the_title(); ?>
						</h2>
						<div class="hentry-content">
							<?php the_content(); ?>
						</div>

					</div>

					<div class="marble-col">

						<?php the_post_thumbnail( 'large' ); ?>
						
						<!-- Displays the list of our custom taxonomies named 'type'  -->
						<p>
							<span class="meta-categories"> 
								<?php the_terms( get_the_ID(), 'type', '', ', ', '' ); ?>
							</span>
						</p>
						<!-- Displays the list of our custom taxonomies named 'color'  -->
						<ul>
							<?php the_terms( get_the_ID(), 'color', '<li>', '</li><li>', '</li>' ); ?>
						</ul>

						<!-- Get the post custom metas defined in the admin under custom fields values  -->
						<p><?php echo get_post_meta( get_the_ID(), 'client', true ); ?></p>
						<p><?php echo get_post_meta( get_the_ID(), 'creation_year', true ); ?></p>

						<p>Advanced custom fields :</p>
						<p>Project start date: <?php the_field('project_star_date'); ?>
						<p>Project end date: <?php the_field('project_end_date'); ?>
						<p>Project image path: <?php the_field('image_of_the_project'); ?>
					</div>
				</div>

				
				
				<?php
					
				endwhile;

			else:
				echo '<p>Content to be displayed when there is nothing to show</p>';
			endif;


		 ?>
		<!-- End of the Loop. -->
		
		<!-- the post previous and next links-->
		<footer  class="footer-nav-links">
			<p><?php previous_post_link(); ?> - <?php next_post_link(); ?></p>
		</footer>
	</section>


<?php get_footer(); ?>