<h2><?php echo $title; ?></h2>

<?php
	foreach($users as $user){
?>
		<a href="<?php echo site_url('users/' .  $user['username']); ?>"><?php echo $user['username']; ?></a><br>
<?php
	}
?>
