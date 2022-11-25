<?php
    //Infos globales du SGBD
    $bdd = "roose";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "roose";
    $pass = "roose";
    define("dim_fen", 500);
    define("larg_bar", 30);
    define("LONG_WRITING", 100);
    define("spacing", 8);

    $link = mysqli_connect($host,$user,$pass,$bdd); //or die ("Impossible de se connecter à la base de données");             //Ouverture 
    if (mysqli_connect_errno())
    {
        echo "Connection impossible a la BDD <br>";
        exit();
    }

    $bourse = mysqli_query($link, 'SELECT * FROM bourse ORDER BY ville');
    if (mysqli_connect_errno())
    {
        echo "Requete incorrecte <br>";
        exit();
    }

header("Content-type: image/jpeg");
    $image=imagecreate(dim_fen,dim_fen);

    $rouge = ImageColorAllocate($image,255,0,0);   
    $vert = ImageColorAllocate($image, 0, 255, 0);   
    $bleu = ImageColorAllocate($image, 0, 0, 255);
    $jaune = ImageColorAllocate($image, 236, 122, 17);
    $bordeaux = ImageColorAllocate($image, 121, 19, 48);
    $blanc = ImageColorAllocate($image, 255, 255, 255);

    imagefill($image,500,500,$rouge);                     //Mise en rouge du fond

    
    $xBarStart = spacing;
    $indiceMax = mysqli_fetch_assoc(mysqli_query($link, 'SELECT MAX(indice) FROM bourse'));
    $coef = (dim_fen-LONG_WRITING) / $indiceMax["MAX(indice)"];

    while ($tuple=mysqli_fetch_assoc($bourse)) 
    {
        switch ($tuple["ville"]) {
            case 'NY':
                $color = $vert;
                break;
            case 'Paris':
                $color = $bleu;
                break;
            case 'Tokyo':
                $color = $jaune;
                break;
            case 'Bordeaux':
                $color = $bordeaux;
                break;
            
            default:
                $color = $blanc;
                break;
        }
        $xBarEnd = $xBarStart+larg_bar;
        
        if ($xBarEnd < dim_fen)
        {
            $hBar =  dim_fen-$tuple["indice"]*$coef;
            imageFilledRectangle($image, $xBarStart,$hBar, $xBarEnd, dim_fen, $color);
            $milieu = ($xBarStart+$xBarEnd)/2;
            ImageStringUp($image, 5, $milieu, $hBar, " ".$tuple["ville"]."-".$tuple["indice"], $blanc);
        }
        //  echo $tuple["ville"]."  ".$tuple["indice"]."<br>";
        $xBarStart = $xBarEnd + spacing;
        

    }
imagejpeg($image);
    imagedestroy($image);
    mysqli_close($link);            //Fermeture BDD

    


    
?>