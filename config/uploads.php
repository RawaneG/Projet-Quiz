<?php
function upload($photo)
{
    $folder = ROOT."public/uploads/".$photo['name']; 
    move_uploaded_file($photo['tmp_name'], $folder);
}
?>