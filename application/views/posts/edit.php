<h2>Edit post</h2>
<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
	<input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea id="content" class="form-control" name="content" placeholder="Add Content"><?php echo $post['content']; ?></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
