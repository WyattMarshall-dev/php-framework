<?php
// Determines if uploaded image is landscape, portrait or square
// Passes image dimensions onto img_upload to resize
function resize_image($im, $image, $file) {
    switch (imagesx($im) <=> imagesy($im)) {
        case '-1':
            $y_crop = imagesx($im);
            $x_crop = ($y_crop / 3) * 2;
            img_upload($x_crop, $y_crop, $image, $file);
            break;
        case '0':
            $y_crop = imagesx($im);
            $x_crop = ($y_crop / 3) * 2;
            img_upload($x_crop, $y_crop, $image, $file);
            break;
        case '1':
            $y_crop = imagesy($im);
            $x_crop = ($y_crop / 3) * 2;
            img_upload($x_crop, $y_crop, $image, $file);
            break;
        default:
            break;
    }

    imagedestroy($im);
}
// Resizes Uploaded Image to 2x3 Aspect Ratio [Standard Movie Poster]
function img_upload($x, $y, $image, $file){
    $im = imagecreatefromjpeg($image);
    $x_center = (imagesx($im) / 2) - ($x / 2);
    $y_center = (imagesy($im) / 2) - ($y / 2);
    $im2 = imagecrop($im, ['x' => $x_center, 'y' => $y_center, 'width' => $x, 'height' => $y]);
    if ($im2 !== FALSE) {
        imagejpeg($im2, "{$_SERVER['DOCUMENT_ROOT']}/uploads/{$file}", 75);
    }
    imagedestroy($im2);
}


?>