<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM mydb WHERE Sno= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>