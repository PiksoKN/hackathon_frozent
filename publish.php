<?php
$i = 0;
while(file_exists("notes/" . $_POST["title"] . $i . ".txt")){
    $i += 1;
}
$file = fopen("notes/" . $_POST["title"] . $i . ".txt", "w");
fwrite($file, $_POST["noteText"]);
fclose($file);
?>