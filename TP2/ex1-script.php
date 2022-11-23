<html>
    <body>
        <?php
            if ( isset( $_GET['valider'] ) ) 
            {
                echo "Dans le formulaire précédent vous avez saisi ces informations :<br>";
                //Si le bouton est clique
                $dernierEnregistrement = $_GET["nom"]." | ".$_GET["age"]." | ".$_GET["mail"]." | ".$_GET["don"]."\n";  
                echo "Dernier enregistrement : ".$dernierEnregistrement."<br>";
                $bdd = fopen("ex1-resultats.txt", "a");
                if (!$bdd)
                {
                    echo "Fichier non ouvrable";
                }
                fputs($bdd, $dernierEnregistrement);                 
                fclose($bdd);
            }
            if ( isset( $_GET['resultats'] ) ) 
            {
                $bdd = fopen("ex1-resultats.txt", "r");
                while (!feof($bdd))
                {
                    $ligne = explode(" | ",fgets($bdd, 255));
                    $message = "Merci beaucoup ".$ligne[0].", vous nous avez fait un don de ".$ligne[3]."€ a l'age de ".$ligne[1]." ans seulement !<br>";
                    mail($ligne[2], "TP2_PHP_NOREPLY", $message);
                    echo "Mail envoyé à ".$ligne[2]." : ".$message."<br>";
                }
            }
        ?>
    </body>
</html>