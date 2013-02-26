<h2>Add a Group!</h2>
<form class="form-horizontal" action="actions/add_contact.php" method="post">
	<div class="control-group">
		<label class="control-label" for="group_name">Group Name!</label>
		<div class="controls">
			<?php echo input('group_name','Group name')?>
		</div>
	</div>	
<?php //form submission methods, use $_GET or $_POST, $_GET you use when submitting something wont change the server state, $_Post you use if you are changing the Server?>
	<div class="form-actions">
		<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i>Submit</button>
		<button type="button" class="btn">Cancel</button>
	</div>
</form>
