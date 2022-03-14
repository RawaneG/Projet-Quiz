<?php
function upload($photo,$name)
{
    $folder = ROOT."public/uploads/".$name; 
    move_uploaded_file($photo['tmp_name'], $folder);
}
?>