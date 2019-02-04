<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
$the_photo='https://images.unsplash.com/photo-1543363950-d1d51b4eca60?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'; 
$im=ImageCreateFromJPEG($the_photo);  
$total_R=0; $total_G=0; $total_B=0; $width=ImageSX($im); $height=ImageSY($im); 

for ($x=0; $x<$width; $x++) { 
    for ($y=0; $y<$height; $y++) { 
        $rgb=ImageColorAt($im,$x,$y); 
        $total_R+=($rgb>>16) & 0xFF; 
        $total_G+=($rgb>>8) & 0xFF; 
        $total_B+=$rgb & 0xFF; 
    } 
} 

ImageDestroy($im); 
$avg_R=round($total_R/$width/$height); $avg_G=round($total_G/$width/$height); $avg_B=round($total_B/$width/$height); $total_RGB=$avg_R.','.$avg_G.','.$avg_B;
?>
<body style="background-color: rgb(<?php echo $total_RGB ?>);">
    <img src="<?php echo $the_photo ?>" alt="">
</body>
</html>
