<?php  session_start() ?>
<?php
require('../config/db.php');
require('../lib/functions.php');
//connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//execute query
$sql = "UPDATE groups SET group_name='{$_POST['group_name']}' WHERE group_id='{$_POST['group_id']}'";
$conn->query($sql);
//close connection
$conn->close();
$_SESSION['message'] = array(
		'type' => 'success',
		'text' => 'Nice Job! *feigns pat on the back*'
);
//redirect
header('Location:../?p=list_groups');
?>