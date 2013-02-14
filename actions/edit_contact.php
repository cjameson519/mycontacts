<?php
require('../config/db.php');
require('../lib/functions.php');
//connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//execute query
$sql = "UPDATE contacts SET contact_firstname='{$_POST['contact_firstname']}', contact_lastname='{$_POST['contact_lastname']}', contact_email='{$_POST['contact_email']}', contact_phone='{$_POST['contact_phone']}' WHERE contact_id='{$_POST['contact_id']}'";
$conn->query($sql);
//close connection
$conn->close();
//redirect
header('Location:../?p=list_contacts');
?>