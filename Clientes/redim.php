<?php
    # ruta de la imagen a redimensionar
    $imagen = $uploadfiletemporal;
    # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe
    $imagen_final = $imagen;
    $ancho_nuevo = 500; //90 el width
    $alto_nuevo = 400; //55 height

redim ($imagen,$imagen_final,$ancho_nuevo,$alto_nuevo); 

function redim($ruta1,$ruta2,$ancho,$alto)
    {

    $tamaño = getimagesize($ruta1);
 
    if ($tamaño[0] > 600) {

    # se obtene la dimension y tipo de imagen
    $datos=getimagesize ($ruta1);
    
    $ancho_orig = $datos[0]; # Anchura de la imagen original
    $alto_orig = $datos[1];    # Altura de la imagen original
    $tipo = $datos[2]; 
    
    if ($tipo==1){ # GIF
        if (function_exists("imagecreatefromgif")) {
            $img = imagecreatefromgif($ruta1); }
        else
            return false;
    }
    else if ($tipo==2){ # JPG
        if (function_exists("imagecreatefromjpeg")) {
            $img = imagecreatefromjpeg($ruta1); }
        else
            return false;
    }
    else if ($tipo==3){ # PNG
        if (function_exists("imagecreatefrompng")) {
            $img = imagecreatefrompng($ruta1); }
        else
            return false;
    }
    else { 
            return false;
    }
    
    # Se calculan las nuevas dimensiones de la imagen
    if ($ancho_orig > $alto_nuevo)
        {
        $ancho_dest=$ancho;
        $alto_dest=($ancho_dest/$ancho_orig)*$alto_orig;
        }

    // imagecreatetruecolor, solo estan en G.D. 2.0.1 con PHP 4.0.6+
    $img2=@imagecreatetruecolor($ancho_dest,$alto_dest) or $img2=imagecreate($ancho_dest,$alto_dest);

    // Redimensionar
    // imagecopyresampled, solo estan en G.D. 2.0.1 con PHP 4.0.6+
    @imagecopyresampled($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig) or imagecopyresized($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig);

    // Crear fichero nuevo, según extensión.
    if ($tipo==1) // GIF
        if (function_exists("imagegif")) {
            imagegif($img2, $ruta2); }
        else
            return false;

    if ($tipo==2) // JPG
        if (function_exists("imagejpeg")) {
            imagejpeg($img2, $ruta2); }
        else
            return false;

    if ($tipo==3)  // PNG
        if (function_exists("imagepng")) {
            imagepng($img2, $ruta2); }
        else
            return false;

    return true;
    }

}

?>