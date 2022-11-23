<!-- Lancer  http://lakartxela.iutbayonne.univ-pau.fr/~ndelahaie -->

<html>
    <body>
        <?php
            $fic = fopen("restau.txt", "r");

            while ( !feof($fic) ) 
            {
                $client = fgets($fic,255); // 255 caractères max. ou bien fin de ligne.
                $attributs = explode(";", $client);
                print("Nom : ".$attributs[0]."<br>Prenom : ".$attributs[1]."<br>Restaurant ".$attributs[2]."<br>Restaurant ".$attributs[2]."<hr>");
            }               
        ?>
    </body>
</html>