<h1>Contacts!</h1>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Edit / Delete</th>
		</tr>
	</thead>
	<tbody>
<?php 
//connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//query DB
$sql ='SELECT * FROM contacts ORDER BY contact_lastname, contact_firstname';
$results = $conn->query($sql);
//loop over results
while(($contact = $results->fetch_assoc()) != null) {
	extract($contact);
	?>
	<tr>
		<td><?php echo $contact_firstname?> <?php echo $contact_lastname?></td>
		<td><a href="maito:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></td>
		<td><?php echo format_phone($contact_phone)?></td>
		<?php echo 	"<td><a href=\"?p=form_edit_contact&id=$contact_id\"><i class='icon-wrench icon-white'></i></a>";
			echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$contact_id\"/>";
			echo	'  ';
			echo	'<input type="submit" value="Delete" />';
			echo	"</form>";
			echo	"</td>"; ?>
	</tr>
<?php }
//close DB
$conn->close();
?>

	</tbody>
</table>