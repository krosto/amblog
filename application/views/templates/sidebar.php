<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/testTwits.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/functions.js"></script>

		<div class="col-sm-4">
		<aside>
			<header>
			<h4>Twitter feed</h4>
			</header>
			<article>
			<div id="twitter_feed_container"></div>
			</article>
		</aside>
		</div>
<script>
	var twitter_feed = get_twitter_data("<?php echo $user['twitter']; ?>"); 
	populate_feed(twitter_feed);
<?php 
	if($is_my_profile){
		echo "show_twit_controls();";
		echo "show_hidden_twits();";
	}
	else{
		echo "hide_twits();";
	}
?>
console.debug($('#twitter_feed_container').html());

</script>

	</div>
