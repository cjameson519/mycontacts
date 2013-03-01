<h2>Edit a Group!</h2>
<?php 
// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);


// Execute SELECT query
$sql = "SELECT * FROM groups WHERE group_id={$_GET['id']}";
$results = $conn->query($sql);

// Store the contact date
$contact = $results->fetch_assoc();
extract($contact);

// Close the connection
$conn->close();

?>
<form action="./actions/edit_group.php" method="post">
	<label>Group Name!</label>
	<input type="text" name="group_name" value="<?php echo $group_name ?>" />
	<br/>

	<input type="hidden" name="group_id" value="<?php echo $_GET['id'];?>"/>
	<input type="submit" value="Edit Group!" />
</form>