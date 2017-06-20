<?php
	$news = education_hub_get_home_news_block_content();
	$events = education_hub_get_home_events_block_content();
?>
<div id="featured-content">
	<div class="container">
		<div class="inner-wrapper featured-content-column-3">
							<article>
				<header class="entry-header"><h2 class="entry-title"><a href="http://demo.wenthemes.com/education-hub/about-university/">About University</a></h2></header>
											<a href="http://demo.wenthemes.com/education-hub/about-university/"><img src="http://demo.wenthemes.com/education-hub/wp-content/uploads/sites/8/2015/11/books-985954_1920-360x253.jpg" alt="About University" width="360" height="253"></a>
										<div class="entry-content">
					<div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut odio tellus. Maecenas consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut odio tellus.</p>
					</div>
				</div>
			</article>
							<article>
				<header class="entry-header"><h2 class="entry-title"><a href="http://demo.wenthemes.com/education-hub/learning-environment/">Learning Environment</a></h2></header>
											<a href="http://demo.wenthemes.com/education-hub/learning-environment/"><img src="http://demo.wenthemes.com/education-hub/wp-content/uploads/sites/8/2015/11/studying-703002_1920-360x241.jpg" alt="Learning Environment" width="360" height="241"></a>
										<div class="entry-content">
					<div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut odio tellus. Maecenas consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut odio tellus.</p>
					</div>
				</div>
			</article>
							<article>
				<header class="entry-header"><h2 class="entry-title"><a href="http://demo.wenthemes.com/education-hub/research-and-collaboration/">Research and Collaboration</a></h2></header>
											<a href="http://demo.wenthemes.com/education-hub/research-and-collaboration/"><img src="http://demo.wenthemes.com/education-hub/wp-content/uploads/sites/8/2015/11/language-school-834138_1920-360x240.jpg" alt="Research and Collaboration" width="360" height="240"></a>
										<div class="entry-content">
					<div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut odio tellus. Maecenas consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut odio tellus.</p>
					</div>
				</div>
			</article>
						</div>
	</div>
</div>	
<?php if ( $news || $events ) : ?>
	<div id="featured-news-events">
		<div class="container">
			<div class="inner-wrapper">
				<?php echo $news; ?>
				<?php echo $events; ?>
			</div> <!-- .inner-wrapper -->
		</div> <!-- .container -->
	</div> <!-- #featured-news-events -->
<?php endif ?>

