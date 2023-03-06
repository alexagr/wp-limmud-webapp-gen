<?php

/**
 * copy WebApp photos
 */

function copy_photos()
{
    $app_name = webapp_name();
    if (empty($app_name)) {
        return "ERROR: WebApp Name is empty";
    }

    $file_count = count($_FILES["files"]["name"]);
    if ($file_count == 0) {
        return "ERROR: no file chosen";
    }

    for ($i=0; $i<$file_count; $i++) {
        $file = webapp_path($app_name) . '/speakers/' . basename($_FILES["files"]["name"][$i]);
        
        @mkdir(webapp_path($app_name) . '/speakers');
        move_uploaded_file($_FILES["files"]["tmp_name"][$i], $file);
        
        $source = imagecreatefromjpeg($file);
        
        list($width, $height) = getimagesize($file);
        $size = min($width, $height);
        if (($width != 300) || ($height != 300)) {
            $img = imagecreatetruecolor(300, 300);
            imagecopyresampled($img, $source, 0, 0, 0, 0, 300, 300, $size, $size);
            imageinterlace($img, true);
            imagejpeg($img, $file);
            $size = 300;
        }
        
        @mkdir(webapp_path($app_name) . '/speakers/thumbs');
        $source = imagecreatefromjpeg($file);
        $thumb = imagecreatetruecolor(100, 100);
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, 100, 100, $size, $size);
        imageinterlace($thumb, true);
        imagejpeg($thumb, webapp_path($app_name) . '/speakers/thumbs/' . basename($file));
    }
    return '';
}
