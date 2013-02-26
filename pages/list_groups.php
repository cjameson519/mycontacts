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
$sql ="SELECT * FROM groups ORDER BY group_id";
$results = $conn->query($sql);
//loop over results
while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	?>
	<tr>
			<?php echo 	"<td><a href=\"?p=group&id=$group_id\">$group_name</a>"?>
			<?php echo 	'<form style="display:inline;" method="post" action="./actions/delete.php">';
			echo	"<input type=\"hidden\" name=\"id\" value=\"$group_id\"/>";
			echo	"</form>"; 
			echo	"</td>"; ?>
	</tr>
<?php }
//close DB
$conn->close();
?>

	</tbody>
</table>
