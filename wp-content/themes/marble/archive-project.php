<?php get_header(); ?>

	<section id="content-section" class="wrapper">
		<h1>ARCHIVE-PROJECT.PHP</h1>
		<!-- Start the Loop. -->
		<?php 

			if( have_posts() ) : //this function will ask the database if there are posts to display regarding to the url
			//http://myblog.ext/contact/ -> dbrequest with the contact ID -> retrieve only the post content of my contact page

				while( have_posts() ): the_post();
				?>
				
				<div class="marble-row hentry">
					<div class="marble-col">
						<?php the_post_thumbnail( 'post-wide-thumbnail' ); ?>
					</div>

					<div class="marble-col">
						<h2 class="hentry-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<p class="hentry-excerpt">
							<?php the_excerpt(); ?>
						</p>
						<p>
							<span class="meta-categories"> 
								<?php the_terms( get_the_ID(), 'type', '', ', ', '' ); ?>
							</span>
						</p>
					</div>
				</div>

				
				
				<?php

					//the_author().'<br>';
					//the_category(', ').'<br>';
					//the_content().'<br>';
					//the_excerpt().'<br>';
					//the_date().'<br>';
					
				endwhile;

			else:
				echo '<p>Content to be displayed when there is nothing to show</p>';
			endif;


		 ?>
		<!-- End of the Loop. -->
		
		<!-- the post pages previous and next links-->
		<footer class="footer-nav-links">
			<p><?php posts_nav_link(' | ', 'previous posts', 'next posts'); ?></p>
		</footer>

	</section>


<?php get_footer(); ?>