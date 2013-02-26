<?php 
//fetch name of group
extract($_GET);
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//query DB
$sql ="SELECT group_name FROM groups WHERE group_id=$id";
$results = $conn->query($sql);
$group = $results->fetch_assoc();
?>
<h1><?php echo $group['group_name'] ?>!</h1>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody>
<?php 
//query DB
$sql ="SELECT * FROM contacts WHERE group_id=$id ORDER BY contact_lastname, contact_firstname";
$results = $conn->query($sql);
//loop over results
while(($contact = $results->fetch_assoc()) != null) {
	extract($contact);
	?>
	<tr>
		<td><?php echo $contact_firstname?> <?php echo $contact_lastname?></td>
		<td><a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></td>
		<td><?php echo format_phone($contact_phone)?></td>
	</tr>
<?php }
//close DB
$conn->close();
?>

	</tbody>
</table>