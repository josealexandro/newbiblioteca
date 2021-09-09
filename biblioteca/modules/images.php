<?php
function convertImage($inputImage) {
   $ext = pathinfo($inputImage, PATHINFO_EXTENSION);
   
   switch ($ext) {
      case "jpeg":
      case "jpg":
         $outputImage=imagecreatefromjpeg($inputImage);
         break;
      case "png":
         $outputImage=imagecreatefrompng($inputImage);
         break;
      case "gif":
         $outputImage=imagecreatefromgif($inputImage);
         break;
      case "bmp":
         $outputImage=imagecreatefrombmp($inputImage);
         break;
      default:
         return false;
   }
   return $outputImage;
}

function resizeImage($inputImage) {
   $inputImage = convertImage($inputImage);
   $outputImage = imagecreatetruecolor(320, 240);
   imagecopyresampled($outputImage, $inputImage, 0, 0, 0, 0, 320, 240, WIDTH, HEIGHT);

   return $outputImage;
}
?>