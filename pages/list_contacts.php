<?php 
//check if user is searching 
if(isset($_GET['q']) && $_GET['q'] !='') {
	extract($_GET);
	$where = "WHERE contact_lastname LIKE '%$q%' OR contact_firstname LIKE '%$q%'";
	echo "<h4>Contacts containing $q!";
	echo '<a href=\'./?p=list_contacts\'><button type=\'button\' class=\'btn btn-success pull-right\'>Go Back!</button></a>';
	echo "</h4>";
} else {
	$where='';
}

?>

<h2>Contacts!</h2>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Group</th>
			<th>Edit / Delete</th>
		</tr>
	</thead>
	<tbody>
<?php
//connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//query DB
$sql ="SELECT * FROM contacts LEFT JOIN groups ON contacts.group_id=groups.group_id $where ORDER BY contact_lastname,contact_firstname";
$results = $conn->query($sql);
//loop over results
while(($contact = $results->fetch_assoc()) != null) {
	extract($contact);
	?>
	<tr>
		<td><?php echo $contact_firstname?> <?php echo $contact_lastname?></td>
		<td><a href="maito:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></td>
		<td><?php echo format_phone($contact_phone)?></td>
		<td><span class="label label-success"><?php echo "<a href=\"?p=group&id=$group_id\">$group_name</a>" ?></span></td>
		<?php echo 	"<td><a href=\"?p=form_edit_contact&id=$contact_id\" class=\"btn btn-small\" ><i class='icon-wrench icon-green'></i></a>";
			echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$contact_id\"/>";
			echo	'  ';
			echo	'<input type="submit" value="Delete" class="btn btn-small" />';
			echo	"</form>";
			echo	"</td>"; ?>
	</tr>
<?php }
//close DB
$conn->close();
?>

	</tbody>
</table>