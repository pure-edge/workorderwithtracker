<?php  if (count($success) > 0) : ?>
	<div class="flash_message">
		<?php foreach ($success as $msg) : ?>
			<div class="alert alert-success" role="alert">
				<?php echo $msg ?>
			</div>
		<?php endforeach ?>
	</div>
<?php  endif ?>