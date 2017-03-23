<?php

if(isset($_FILES)) {
    
    $loc = 'scripts/text_file.txt';
    
    if(file_exists('scripts/text_file.txt')) {
        unlink('text_file.txt');
    }
    
    move_uploaded_file($_FILES['file']['tmp_name'], $loc);
    
    echo "<script>alert('uploaded successfully!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}
?>