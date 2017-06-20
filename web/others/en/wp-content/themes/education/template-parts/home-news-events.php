<?php
	$news = education_hub_get_home_news_block_content();
	$events = education_hub_get_home_events_block_content();
?>
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
