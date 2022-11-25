<?php
    //Infos globales du SGBD
    $bdd = "roose";
    $host = "lakartxela.iutbayonne.univ-pau.fr";
    $user = "roose";
    $pass = "roose";

    $link = mysqli_connect($host,$user,$pass,$bdd);             //Ouverture 
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
    mysqli_close($link);                                //Fermeture BDD

    header("Content-type: image/jpeg");
    $img = ImageCreate(500, 500);
    $rouge = ImageColorAllocate($img, 255, 0, 0);   
    $vert = ImageColorAllocate($img, 0, 255, 0);   
    $bleu = ImageColorAllocate($img, 0, 0, 255);

    imageFill ($img, 250, 250, $rouge);                     //Mise en rouge du fond
    // imagefilledpolygon($img, array(100,10,50,60,150,60), 3, $bleu) ;
    // imageFilledRectangle($img, 200, 200,0, 0, $vert);
         
    while ($tuple=mysqli_fetch_assoc($bourse)) 
    {
        echo $tuple["ville"]."  ".$tuple["indice"]."<br>";
    }
    imagejpeg($img);
    ImageDestroy($img); 

    


    
?>