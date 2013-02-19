<?php  session_start() ?>
<?php
require('../config/db.php');
require('../lib/functions.php');
//connect
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$sql = "DELETE FROM contacts WHERE contact_id={$_POST['id']}";
$conn->query($sql);
//close
$conn->close();

$_SESSION['message'] = array(
		'type' => 'danger',
		'text' => 'Why! Why! You Animal!'
);
//redirect
header('Location:../?p=list_contacts');