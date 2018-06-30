<?php
	$iduser=$_SESSION['iduser'];
	$query=mysql_query("SELECT * FROM user WHERE id_user='$iduser'");
	$rus=mysql_fetch_array($query);
?>