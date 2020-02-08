<h2>Create post</h2>
<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
	<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title">
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea id="content" class="form-control" name="content" placeholder="Add Content"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
