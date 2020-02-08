	<div class="row">
		<div class="col-sm-4 col-md-offset-4">
		<footer>
<?php
	if(($page - 1) >= 0){
?>	
			<a href="<?php echo base_url() . $pagination_base_url . "/" . ($page - 1); ?>">&lt;</a>
<?php
	}
	for($i = 0; $i < floor($total_rows / $per_page); $i++){
		if($page == $i){
?>
			<span><?php echo ($i + 1); ?></span>
<?php
		}
		else{
?>
			<a href="<?php echo base_url() . $pagination_base_url . "/" . $i; ?>"><?php echo ($i + 1); ?></a>
<?php
		}
	}

?>
<?php
	if(($page + 1) < floor($total_rows / $per_page)){
?>	
		<a href="<?php echo base_url() . $pagination_base_url . "/" . ($page + 1); ?>">&gt;</a>
<?php
	}
?>
		</footer>
		</div>
	</div>
