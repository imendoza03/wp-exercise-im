<?php 
    /**
     * Template name: Page with sidebar
     */
?>

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
			<div class="marble-row">
				<div class="marble-primary-col">
				Page with sidebar
			 		<!-- Start the Loop. -->
					<?php if (have_posts()) :
							while (have_posts()) : the_post(); 
					?>

					<h2 class="page-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title();?>
						</a>
					</h2>

					<h2 class="page-content">
						<?php the_content();?>
					</h2>
			
					<?php endwhile; 
					else :
						echo 'Content to be displayed when htere is nothing to show';
					?>


					<!-- The very first "if" tested to see if there were any Posts to -->
					<!-- display.  This "else" part tells what do if there weren't any. -->
					<p><?= "Sorry, no posts matched your criteria." ?></p>


					<!-- REALLY stop The Loop. -->
					<?php endif; ?>
				</div>
			</div>
			
			<div class="marble-secondary-col">
				<!-- create a new div that will display the user name and email only if the current user is connected-->
				<?php 

					$current_user = wp_get_current_user(); 
				
					if($current_user->ID !== 0) {
						echo 'Username: ' . $current_user->display_name . '<br />';
						echo 'User email: ' . $current_user->user_email . '<br />';
					}
				
				?>
			
				<?php get_sidebar(); ?>	

				<p>&nbsp;</p>
				<h3>WPDB requests</h3>
				<?php
					global $wpdb;

					echo  $wpdb->posts;

					// echo $wpdb->prefix;

					//two ways to call  for a table with prefix

					// $query = "SELEC * FROM {$wpdb->prefix}posts";
					// $query = "SELEC * FROM $wpdb->prefix";

					// $results = $wpdb->get_results("SELEC * FROM $wpdb->posts");

					// foreach($results as $post):
					// 	echo $post->post_title;
					// 	echo '<br/>';
					// endforeach;

					/**
					 * get_raw()
					 * get a single row result of an SQL request
					 */

					//  $result = $wpdb->get_row("SELECT post_title, post_date FROM $wpdb->posts WHERE ID = 10");
					//  echo $results->post_title;

					$id = $_GET['id'];
					$result = $wpdb->get_row($wpdb->prepare("SELECT post_title, post_date FROM $wpdb->posts WHERE ID = %d", $id));
					echo '<p>' . $result . '</p>'; 
					
				?>	
			</div>
			


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
