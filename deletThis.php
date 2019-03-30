<?php
require("connect.php");
unlink("notes/".$_POST["toDelete"].".txt");

$query = 'DELETE FROM note WHERE ref = "' . $_POST["toDelete"] . '"';
$result = mysqli_query($mysqli,$query);
 
echo "<script type='text/javascript'>window.location = 'http://localhost/notes.php';</script>";
?>