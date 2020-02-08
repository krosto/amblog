<h2><?php echo $title; ?></h2>
<?php 
	foreach($posts as $post){
?>
		<article>
			<header>
				<h3><?php echo $post['post']['title']; ?></h3>
				Created on: <?php echo $post['post']['created_at']; ?> by <a href="<?php echo site_url('users/' . $post['username']); ?>"><?php echo $post['username']; ?></a><br>
			</header>
			<?php echo $post['post']['content']; ?>
			<br>
			<a href="<?php echo site_url('posts/view/' . $post['post']['slug']); ?>">Read more</a>
		</article>
		<br><br>
<?php
	}
?>
