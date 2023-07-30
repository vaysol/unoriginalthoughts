<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

function find_tag($single_id, $ids)
{
    for ($i = 0; $i < count($ids); $i++) {
        if ($single_id == $ids[$i]) {
            return true;
        }
    }
}

function remove_tags($string)
{
    $clear = strip_tags($string);

    // Clean up things like &amp;
    $clear = html_entity_decode($clear);

    // Strip out any url-encoded stuff
    $clear = urldecode($clear);
    $clear = strip_tags($clear);
    // Replace non-AlNum characters with space
    $clear = preg_replace('/[^A-Za-z0-9]/', ' ', $clear);

    // Replace Multiple spaces with single space
    $clear = preg_replace('/ +/', ' ', $clear);

    // Trim the string of leading/trailing space
    $clear = trim($clear);

    return $clear;
}


function default_font($string)
{
    $overview = str_replace("font-family:Arial,Helvetica,sans-serif", "font-family: 'Open Sans', sans-serif; line-height: 1.5;word-spacing: 1px;", $string);
    $overview = str_replace('color:#000000', 'color:#212529', $overview);
    return $overview;
}

function uploadFile($image, $path)
{
    $imageName = $image->getName();
    $newName = substr($imageName, 0, strrpos($imageName, '.'));

    $ext = $image->getClientExtension();

    if ($image->isValid() && !$image->hasMoved()) {
        switch ($ext) {
            case 'png':
                $originalImage = imagecreatefrompng($image);
                break;
            case 'jpeg':
                $originalImage = imagecreatefromjpeg($image);
                break;
            case 'jpg':
                $originalImage = imagecreatefromjpeg($image);
                break;
            case 'webp':
                $originalImage = imagecreatefromwebp($image);
                break;
            default:
                # code...
                break;
        }

        $width = imagesx($originalImage);
        $height = imagesy($originalImage);

        $rgb_image = imagecreatetruecolor($width, $height);
        imagecopy($rgb_image, $originalImage, 0, 0, 0, 0, $width, $height);

        imagewebp($rgb_image, $path . $newName . '.webp');
        imagepng($rgb_image, $path . $newName . '.png');

        return $path . $newName;
    }
}

function uploadFileForHome($image, $path)
{
    $imageName = $image->getName();
    $newName = substr($imageName, 0, strrpos($imageName, '.'));

    $ext = $image->getClientExtension();

    if ($image->isValid() && !$image->hasMoved()) {
        switch ($ext) {
            case 'png':
                $originalImage = imagecreatefrompng($image);
                break;
            case 'jpeg':
                $originalImage = imagecreatefromjpeg($image);
                break;
            case 'jpg':
                $originalImage = imagecreatefromjpeg($image);
                break;
            case 'webp':
                $originalImage = imagecreatefromwebp($image);
                break;
            default:
                # code...
                break;
        }

        imagewebp($originalImage, $path . $newName . '.webp');
        imagepng($originalImage, $path . $newName . '.png');

        return $path . $newName;
    }
}

function webp_image_with_transperent($destnpath, $source )
{
    $info = getimagesize($source);

    
        if ($info['mime'] == 'image/jpg' || $info['mime'] == 'image/jpeg')
        {
            //Creating Raw Image
            $image = imagecreatefromjpeg($source);
            
            //creating png and webp copies 
            createPngWithTransperent($image, $destnpath);
            createWebP($image, $destnpath);
        }
        elseif($info['mime'] == 'image/webp') 
        {
            //Creating Raw Image
            // $w = imagesx( $source );
            // $h = imagesy( $source );
            // $image = imagecreatetruecolor( $w, $h );

            $image = imagecreatefromwebp($source);

            //creating png and webp copies 
            createPngWithTransperent($image, $destnpath);
            createWebP($image, $destnpath);
        } 
        elseif($info['mime'] == 'image/png') 
        {
            //Creating Raw Image
            $image = imagecreatefrompng($source);

            //creating png and webp copies 
            createPngWithTransperent($image, $destnpath);
            createWebP($image, $destnpath);
        } 
        elseif($info['mime'] == 'image/gif') 
        {
            $image = imagecreatefromgif($source);
            createAlpha($image , $destnpath);
        } 
        else 
        {
            return $source;
        }
}


function createPngWithWhite($image,$destnpath)
{
    // Create a new image with a white background
    $new_img = imagecreatetruecolor(imagesx($image), imagesy($image));
    $bg_color = imagecolorallocate($new_img, 255, 255, 255);
    imagefill($new_img, 0, 0, $bg_color);

    // Copy the input image onto the new image with the white background
    imagecopy($new_img, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));

    // Output the new image as a PNG file
      imagepng($new_img ,$destnpath.'.png', 6);


}


function createPngWithTransperent($image,$destnpath)
{
    // Make the background transparent
    imagecolortransparent($image, imagecolorallocatealpha($image, 0, 0, 0, 127));
    imagealphablending($image, false);
    imagesavealpha($image, true);
    
    // Output the new image to a file with compression level 6
    imagepng($image, $destnpath.'.png', 9);

}

function createWebP($image ,$destnpath)
{
    $isDone = imagepalettetotruecolor($image);
     imagewebp($image, $destnpath.'.webp',80);    
 
}

function createAlpha($image)
{
    imagepalettetotruecolor($image);
    imagealphablending($image, true);
    imagesavealpha($image, true);

   
}
 