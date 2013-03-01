<h2>Groups!</h2>
<table class="table">
	<thead>
		<tr>
			<th>Group Name</th>
			<th>Members</th>
		</tr>
	</thead>
	<tbody>
<?php 
//connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//query DB
$sql ="SELECT groups.*, COUNT(contact_id) AS num_contacts FROM groups LEFT JOIN contacts ON contacts.group_id=groups.group_id GROUP BY groups.group_id ORDER BY num_contacts DESC";
$results = $conn->query($sql);
//loop over results
while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	?>
	<tr>
		<td>
			<?php echo 	"<a href=\"?p=group&id=$group_id\">$group_name</a>"; ?>
		</td>
		<td>
			<span class="badge pull-center badge-success"><?php echo $num_contacts ?></span>
		</td>
		<td>
			<?php echo 	"<td><a href=\"?p=form_edit_group&id=$group_id\" class=\"btn btn-small\" ><i class='icon-wrench icon-green'></i></a>";
			echo '  ';
			echo 	'<form style="display:inline;" method="post" action="./actions/delete_group.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$group_id\" />";
			echo '<input type="submit" value="Delete" class="btn btn-small" />';
			echo	"</form>"; ?>
		</td>
	</tr>
<?php }
//close DB
$conn->close();
?>

	</tbody>
</table>
