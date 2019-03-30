<?php
require("connect.php");

// Check if file exists
$i = 0;
while(file_exists("notes/" . $_POST["title"] . $i . ".txt")){
    $i += 1;
}

// Open file and write whole text
$file = fopen("notes/" . $_POST["title"] . $i . ".txt", "w");
fwrite($file, $_POST["noteText"]);
fclose($file);

$query = 'INSERT INTO note(title,user_user_id,ref) VALUES ("' . $_POST["title"] . '",1,"' . ($_POST["title"].$i) . '")';
$result = mysqli_query($mysqli,$query);

// Redirect to all notes
echo "<script type='text/javascript'>window.location = 'http://localhost/notes.php';</script>";
?>