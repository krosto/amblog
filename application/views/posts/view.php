<h2><?php echo $post['title']; ?></h2>
Created on: <?php echo $post['created_at']; ?> by <a href="<?php echo site_url('users/' . $user['username']); ?>"><?php echo $user['username']; ?></a><br>

<?php echo $post['content']; ?>
<?php 
		if($is_my_profile){
?>
		<br><br>
		<a class="btn btn-primary" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit Entry</a>
<?php
		}
?>
