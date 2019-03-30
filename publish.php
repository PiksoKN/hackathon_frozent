<?php
require("connect.php");

$titl = str_replace(' ', '', strip_tags($_POST["noteTitle"]));

// Check if file exists
$i = 0;
while(file_exists("notes/" . $titl . $i . ".txt")){
    $i += 1;
}

// Open file and write whole text
$file = fopen("notes/" . $titl . $i . ".txt", "w");
fwrite($file, $_POST["noteText"]);
fclose($file);

$query = 'INSERT INTO note(title,user_user_id,ref) VALUES ("' . strip_tags($_POST["noteTitle"]) . '",1,"' . ($titl.$i) . '")';
$result = mysqli_query($mysqli,$query);
 
// Redirect to all notes
echo "<script type='text/javascript'>window.location = 'http://localhost/notes.php';</script>";
?>