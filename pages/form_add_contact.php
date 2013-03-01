<?php 
//require('./lib/functions.php'); 
?>
<h2>Add a Contact!</h2>
<form class="form-horizontal" action="actions/add_contact.php" method="post">
	<div class="control-group">
		<label class="control-label" for="contact_name">First Name!</label>
		<div class="controls">
			<?php echo input('contact_firstname','First name')?>
			<?php echo input('contact_lastname','Last name')?>
		</div>
	</div>
		<div class="control-group">
		<label class="control-label" for="contact_email">Email!</label>
		<div class="controls">
			<?php echo input('contact_email','you@example.com')?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="contact_phone">Phone Number!</label>
		<div class="controls">
			<?php echo input('contact_phone','required')?>
		</div>
	</div>
	<div class="control-group">
	<label class="control-label" for="group_name">Groups!</label>
		<select name="group_id">
			<?php 
				$options = get_options('group',0,'Select a Group!');
				echo dropdown('group_id',$options);
			?>
		</select>
	</div>
<?php //form submission methods, use $_GET or $_POST, $_GET you use when submitting something wont change the server state, $_Post you use if you are changing the Server?>
	<div class="form-actions">
		<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i>Add Contact!</button>
		<a href="./?p=list_contacts"><button type="button" class="btn">Cancel</button></a>
	</div>
</form>