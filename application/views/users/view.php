<h2><?php echo $title; ?></h2>
<hr>
<?php 
	if($is_my_profile){
?>
<a class="btn btn-primary" href="<?php echo base_url(); ?>posts/create">Create Entry</a>
<hr>
<?php
	}
?>
	<div class="row">
		<div class="col-sm-8">
<?php
	foreach($posts as $post){
?>
		<article>
			<header>
			<h3><?php echo $post['title']; ?></h3>
			Created on: <?php echo $post['created_at']; ?><br>
			</header>
			<?php echo $post['content']; ?>
<?php 
		if($is_my_profile){
?>
		<br><br>
		<a class="btn btn-primary" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit Entry</a>
<?php
		}
?>
			<hr>
		</article>
<?php
	}
?>
		</div>
	

